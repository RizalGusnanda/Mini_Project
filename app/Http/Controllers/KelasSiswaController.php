<?php

namespace App\Http\Controllers;
use App\Models\Modul;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasSiswaController extends Controller
{

    public function showKelas()
    {
        $moduls = Modul::all(); // Mengambil semua modul dari tabel

        return view('layoutUser.kelasSiswa', compact('moduls'));
    }
}
