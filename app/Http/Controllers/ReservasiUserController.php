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
            ->leftJoin('users', 'pakets.user_id', '=', 'users.id')
            ->first();

        $pembayarans = Pembayaran::select(
            'pembayarans.*',
            DB::raw('(SELECT id FROM moduls WHERE moduls.user_id = pakets1.user_id LIMIT 1) as modul_fk_id')
        )
            ->leftJoin('pakets as pakets1', 'pakets1.id', 'pembayarans.paket_id')
            ->where('status', 'paid')
            ->where('pembayarans.user_id', Auth::id())
            ->with(
                ['user', 'user.profile', 'paket', 'paket.user', 'paket.user.profile']
            )
            ->get();

        return view('layoutUser.riwayatPage', ['paket' => $paket, 'pembayarans' => $pembayarans]);
    }
}
