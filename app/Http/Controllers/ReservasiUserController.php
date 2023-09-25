<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

class ReservasiUserController extends Controller
{
    public function index()
    {
        $paketUserId = Paket::select('pakets.user_id',)
            ->leftJoin(
                'pembayarans',
                'pembayarans.paket_id',
                'pakets.id'
            )->first();

            $pembayarans = Pembayaran::select(
                'pembayarans.*',
                'moduls.id as modul_fk_id',
            )
                ->leftJoin('pakets as pakets1', 'pakets1.id', 'pembayarans.paket_id')
                ->leftJoin('moduls', 'moduls.user_id', 'pakets1.user_id')
                ->where('status', 'paid')
                ->where('pembayarans.user_id', Auth::id())
                ->with(['user', 'user.profile', 'paket', 'paket.user', 'paket.user.profile'])
                ->groupBy('pembayarans.id') // Mengelompokkan hasil berdasarkan ID pembayaran unik
                ->get();
        // dd($pembayarans);
        return view('layoutUser.riwayatPage', ['pembayarans' => $pembayarans]);
    }
}