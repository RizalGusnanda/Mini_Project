<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\PencairanSaldo;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaldoController extends Controller
{
    public function penarikan()
    {
        $userId = Auth::user()->id;
        $statusPenarikan = PencairanSaldo::select(
            'users.name',
            'pencairan_saldo.status',
            'pencairan_saldo.jumlah',
            'pencairan_saldo.id'
        )
            ->leftJoin('users', 'pencairan_saldo.id_users', 'users.id')
            ->get();
        $statusPenarikanUser = PencairanSaldo::select(
            'users.name',
            'pencairan_saldo.status',
            'pencairan_saldo.jumlah',
            'pencairan_saldo.id'
        )
            ->where('pencairan_saldo.id_users', $userId)
            ->leftJoin('users', 'pencairan_saldo.id_users', 'users.id')
            ->get();
        return view('pembayaran.penarikan')
            ->with([
                'statusPenarikan' => $statusPenarikan,
                'statusPenarikanUser' => $statusPenarikanUser,
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_users' => 'required|exists:users,id',
            'jumlah' => 'required|integer|min:400000',
        ]);

        PencairanSaldo::create([
            'id_users' => $request->id_users,
            'jumlah' => $request->jumlah,
        ]);

        return response()->json(['success' => true]);
    }

    public function editStatus(Request $request, $id)
    {
        // Find the PencairanSaldo record by its ID
        $statusPenarikan = PencairanSaldo::find($id);

        // Check if the user has the role 'user-pengajar'
        $user = User::where('id', $statusPenarikan->id_users)->first();
        if (!$user || !$user->hasRole('user-pengajar')) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'User bukan pengajar atau tidak ditemukan'
                ],
                400
            );
        }

        // Get the total balance of the user from the dompets table
        $uangAwalPengajar = DB::table('dompets')
            ->where('id_users', $statusPenarikan->id_users)
            ->sum('saldo');

        // Set $uangPengajar to the initial balance
        $uangPengajar = $uangAwalPengajar;

        // Check if the balance is sufficient for the requested withdrawal
        if ($uangPengajar >= $statusPenarikan->jumlah) {
            // Update the status of the PencairanSaldo record
            $statusPenarikan->status = $request->status;
            $statusPenarikan->save();

            return response()->json(
                [
                    'success' => true,
                    'tes' => $statusPenarikan->jumlah <= $uangPengajar
                ],
                201
            );
        } else {
            // If the balance is not sufficient, return a failure response
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Pencairan gagal',
                    'tes' => $statusPenarikan->jumlah <= $uangPengajar
                ],
                400
            );
        }
    }



    // public function editStatus(Request $request, $id)
    // {
    //     // try {
    //     $statusPenarikan = PencairanSaldo::find($id);
    //     $uangAwalPengajar = DB::table('dompets')
    //         ->where('id_users', $statusPenarikan->id_users)
    //         ->value('saldo');

    //     $uangPengajar = $uangAwalPengajar;
    //       500000>=4000000
    //     if ($uangPengajar >= $statusPenarikan->jumlah) {
    //         $statusPenarikan->status = $request->status;
    //         $statusPenarikan->save();
    //         return response()->json(
    //             [
    //                 'success' => true,
    //                 'tes' => $statusPenarikan->jumlah <= $uangPengajar
    //                 // 'message' => 'Pencairan melebihi saldo yang tersedia.',
    //                 // 'tes' => $statusPenarikan->jumlah <= $uangPengajar
    //             ],
    //             201
    //         );
    //     } elseif ($statusPenarikan->jumlah <= $uangPengajar) {
    //         return response()->json(
    //             [
    //                 'success' => false,
    //                 'message' => 'Pencairan gagal',
    //                 'tes' => $statusPenarikan->jumlah <= $uangPengajar
    //             ],
    //             400
    //         );
    //     }
    // }


    // return response()->json([
    //     'success' => true,
    // ]);
    // } catch (\Exception $e) {
    //     return response()->json(['success' => false], 500);
    // }
    // }
}
