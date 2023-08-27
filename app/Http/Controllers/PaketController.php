<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKelasPaketRequest;
use App\Models\Paket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;// Sesuaikan dengan model yang Anda gunakan

class PaketController extends Controller
{
    public function showPaketPage()
    {
        $pakets = Paket::paginate(3);  // Ambil data paket dari database

        return view('layoutUser.paketPage', ['pakets' => $pakets]);

    }



}

