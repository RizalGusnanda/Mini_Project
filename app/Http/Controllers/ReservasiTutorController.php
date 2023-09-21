<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Pembayaran;



class ReservasiTutorController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $pembayarans = Pembayaran::with(['user', 'user.profile', 'paket'])
            ->whereHas('paket', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->where('status', 'paid')
            ->get();

        return view('layoutUser.riwayatTutor', ['pembayarans' => $pembayarans]);
    }

}
