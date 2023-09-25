<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Payment\TripayController;
use App\Models\Paket;
use App\Models\Pembayaran;
use DB;
use Illuminate\Http\Request;

class RiwayatPembayaranController extends Controller
{
    public function index(Request $request)
{
    // $user_id = auth()->id();
    
    // $query = Pembayaran::with(['user', 'paket'])->where('user_id', $user_id);

    $pembayaran = DB::table('pembayarans')->select(
        'pembayarans.id',
        'pembayarans.reference',
        'pembayarans.*',
        'users.id',
        'pakets.nama_paket',
        'pakets.id')
        ->leftJoin('users', 'pembayarans.user_id', 'users.id')
        ->leftJoin('pakets', 'pembayarans.paket_id', 'pakets.id')
        ->where('pembayarans.user_id', auth()->id());

    $status = $request->input('status');

    if ($status) {
        if ($status !== 'all') {
            $pembayaran->where('status', $status);
        }
      
    }

    $pembayaranList = $pembayaran->paginate(5);

    return view('layoutUser.riwayatPembayaran', compact('pembayaranList'));
}


}
