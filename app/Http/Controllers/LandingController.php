<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Profile;

class LandingController extends Controller
{
    public function showLanding()
    {
        $pakets = Paket::all();

        $otherTutors = Profile::where('user_id', '!=', 1)
                        ->with('user', 'kecamatan')
                        ->get();

        return view('layoutUser.landingpage', [
            'pakets' => $pakets,
            'otherTutors' => $otherTutors
        ]);
    }





}
