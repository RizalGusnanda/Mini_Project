<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;

class tutorConntroller extends Controller
{

    public function tutorShow(){
        $tutors = Profile::with('users', 'kecamatans')->get();

        return view('layoutUser.tutorPage', ['tutors' => $tutors]);
    }



}
