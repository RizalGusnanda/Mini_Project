<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use DB;
use Illuminate\Support\Facades\Auth;

class ReservasiUserController extends Controller
{
    public function index()
    {
        $paket = DB::table('pakets')
        ->select(
            'pakets.id as paket_Id',
            'pakets.user_id',
            'pakets.nama_paket',
            'pakets.deskripsi',
            'pakets.harga',
            'pakets.total_harga',
            'pakets.id',
        )
        ->leftJoin('users', 'pakets.user_id' , '=' , 'users.id')
        ->first();

        $pembayarans = Pembayaran::select(
            'pembayarans.*',
            'moduls.id as modul_fk_id',
            // 'moduls.nama_modul',
            // 'moduls.user_id as modul_user_id',
            // 'moduls.deskripsi_modul',
        )
            ->leftJoin('pakets as pakets1', 'pakets1.id', 'pembayarans.paket_id')
            ->leftJoin('moduls', 'moduls.user_id', 'pakets1.user_id')
            ->where('status', 'paid')
            ->where('pembayarans.user_id', Auth::id())
            // ->where('moduls.user_id', $paketUserId)
            ->with(
                ['user', 'user.profile', 'paket', 'paket.user', 'paket.user.profile']
            )
            ->get();
        // dd($pembayarans);
        return view('layoutUser.riwayatPage', ['paket' => $paket, 'pembayarans' => $pembayarans]);
    }
}