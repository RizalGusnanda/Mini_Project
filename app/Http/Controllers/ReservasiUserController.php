<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

class ReservasiUserController extends Controller
{



    public function index()
    {
        $pembayarans = Pembayaran::with(['user', 'paket', 'paket.user', 'paket.user.profile.spesialisasi'])
            ->where('status', 'paid')
            ->where('user_id', Auth::id())
            ->get();

        return view('layoutUser.riwayatPage', ['pembayarans' => $pembayarans]);
    }

}
