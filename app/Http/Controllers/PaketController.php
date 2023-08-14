<?php

namespace App\Http\Controllers;

use App\Models\Paket; // Sesuaikan dengan model yang Anda gunakan

class PaketController extends Controller
{
    public function showPaketPage()
    {
        $pakets = Paket::all(); // Ambil data paket dari database

        return view('layoutUser.paketPage', ['pakets' => $pakets]);

    }
}

