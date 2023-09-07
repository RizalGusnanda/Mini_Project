<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReservasiController extends Controller
{
    public function index($paket_id)
    {
        $user = auth()->user();

        // Ambil id_paket dari sesi jika ada
        $selected_paket_id = Session::get('selected_paket');

        // Dapatkan data paket yang sesuai berdasarkan id_paket
        $selectedPakets = Paket::findOrFail($paket_id);

        // Dapatkan data profil dari user sesuai dengan id_user
        $tutorProfile = Profile::where('user_id', $selectedPakets->user_id)->first();

        return view('layoutUser.riwayatPage', compact('user', 'selectedPakets', 'tutorProfile'));
    }



}
