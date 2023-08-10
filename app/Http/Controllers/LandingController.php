<?php

namespace App\Http\Controllers;

use App\Models\Paket; 

class LandingController extends Controller
{
    public function showPaketLanding()
    {
        $pakets = Paket::all(); // Ambil data paket dari database

        return view('layoutUser.landingpage', ['pakets' => $pakets]);
    }
}


