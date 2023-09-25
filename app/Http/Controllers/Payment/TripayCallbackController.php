<?php

namespace App\Http\Controllers\Payment;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Http\Controllers\Controller;
use App\Mail\TripayNotifikasiSuccess;
use App\Models\Dompet;
use App\Models\Paket;
use App\Models\Pembayaran;
use App\Models\User;
use DB;
use Response;
use Mail;
use Spatie\Permission\Contracts\Role;

class TripayCallbackController extends Controller
{

    // Isi dengan private key anda
    protected $privateKey = 'euGfa-JVkvk-xSA1h-XSkER-ZzkmV';

    public function handle(Request $request)
    {
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $this->privateKey);

        if ($signature !== (string) $callbackSignature) {
            return 'Invalid signature';
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return 'Invalid callback event, no action was taken';
        }

        $data = json_decode($json);
        // dd($data);
        $reference = $data->reference;
        $status = strtoupper((string) $data->status);

        /*
        |--------------------------------------------------------------------------
        | Proses callback untuk closed payment
        |--------------------------------------------------------------------------
        */
        if (1 === (int) $data->is_closed_payment) {
            $transaksi = Pembayaran::where('reference', $reference)->first();

            if (!$transaksi) {
                return 'No $transaksi found for this unique ref: ' . $reference;
            }

            $transaksi->update(['status' => $status]);
            return response()->json(['success' => true]);
        }


        /*
        |--------------------------------------------------------------------------
        | Proses callback untuk open payment
        |--------------------------------------------------------------------------
        */
        $transaksi = Pembayaran::where('reference', $reference)
            ->where('status', 'UNPAID')
            ->first();

        if (!$transaksi) {
            return '$transaksi not found or current status is not UNPAID';
        }

        if ((int) $data->total_amount !== (int) $transaksi->total_amount) {
            return 'Invalid amount, Expected: ' . $transaksi->total_amount . ' - Received: ' . $data->total_amount;
        }

        switch ($data->status) {
            case 'PAID':

                $tutor_id = Paket::where('id', $transaksi->paket_id)->value('user_id');
                $superadminUser = User::role('super-admin')->first();
                $adminId = $superadminUser->id;

                $hargaKelas = Paket::where('id', $transaksi->paket_id)->value('harga'); // asumsi harga kelas tersimpan di kolom 'harga'
                $saldoAdmin = $transaksi->total_amount + 0.1 * $hargaKelas - $hargaKelas;
                $saldoTutor = $transaksi->total_amount - $saldoAdmin;

                Dompet::updateOrInsert(
                    [
                        'id_users' => $tutor_id,
                        'paket_id' => $transaksi->paket_id,
                        'pembayaran_id' => $transaksi->id,
                    ],
                    [
                        'saldo' => DB::raw('saldo + ' . $saldoTutor),
                    ]
                );

                Dompet::updateOrInsert(
                    [
                        'id_users' => $adminId,
                        'paket_id' => $transaksi->paket_id,
                        'pembayaran_id' => $transaksi->id,
                    ],
                    [
                        'saldo' => DB::raw('saldo + ' . $saldoAdmin),
                    ]
                );

                $user = User::role('user')->first();
                $userId = $user->email;
           
                Mail::to($userId)->send(new TripayNotifikasiSuccess($data));
                $transaksi->update(['status' => 'PAID']);
                // status email 

                return response()->json(['success' => true]);

            case 'EXPIRED':
                $transaksi->update(['status' => 'UNPAID']);
                return response()->json(['success' => true]);

            case 'FAILED':
                $transaksi->update(['status' => 'UNPAID']);
                return response()->json(['success' => true]);

            default:
                return response()->json(['error' => 'Unrecognized payment status']);
        }
    }
}