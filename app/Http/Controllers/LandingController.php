<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Paket;
use App\Models\Profile;
use App\Models\Spesalisasi;
use App\Models\Testimoni;

class LandingController extends Controller
{
    public function showLanding()
    {
        $pakets = Paket::all();
        $spesialisasiData = Spesalisasi::all();
        $kecamatanData = Kecamatan::all();

        $otherTutors = Profile::where('user_id', '!=', 1)
            ->whereHas('user', function ($query) {
                $query->whereHas('roles', function ($roleQuery) {
                    $roleQuery->where('name', 'user-pengajar');
                });
            })
            ->with('user', 'kecamatan', 'spesialisasi')
            ->get();

        // Membuat array untuk menyimpan rata-rata rating setiap tutor
        $averageRatings = [];

        foreach ($otherTutors as $tutor) {
            // Menghitung rata-rata rating untuk setiap tutor
            $averageRating = Testimoni::where('id_users', $tutor->user->id)->avg('rating');
            $averageRatings[$tutor->user->id] = $averageRating;
        }

        return view('layoutUser.landingpage', [
            'pakets' => $pakets,
            'spesialisasiData' => $spesialisasiData,
            'kecamatanData' => $kecamatanData,
            'otherTutors' => $otherTutors,
            'averageRatings' => $averageRatings
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
