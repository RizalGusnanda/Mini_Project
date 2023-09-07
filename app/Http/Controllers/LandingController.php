<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Paket;
use App\Models\Profile;
use App\Models\Spesalisasi;

class LandingController extends Controller
{
    public function showLanding()
    {
        $pakets = Paket::all();
        $spesialisasiData = Spesalisasi::all();
        $kecamatanData = Kecamatan::all();

        $otherTutors = Profile::where('user_id', '!=', 1)
                        ->with('user', 'kecamatan','spesialisasi')
                        ->get();



        return view('layoutUser.landingpage', [
            'pakets' => $pakets,
            'spesialisasiData' => $spesialisasiData,
            'kecamatanData' => $kecamatanData,
            'otherTutors' => $otherTutors
        ]);
    }
    public function showDashboard()
    {
        $pakets = Paket::all();
        $spesialisasiData = Spesalisasi::all();
        $kecamatanData = Kecamatan::all();

        $otherTutors = Profile::where('user_id', '!=', 1)
                        ->with('user', 'kecamatan','spesialisasi')
                        ->get();



        return view('layoutUser.landingpage', [
            'pakets' => $pakets,
            'spesialisasiData' => $spesialisasiData,
            'kecamatanData' => $kecamatanData,
            'otherTutors' => $otherTutors
        ]);
    }

}