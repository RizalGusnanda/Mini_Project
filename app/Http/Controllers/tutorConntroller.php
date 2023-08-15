<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;

class tutorConntroller extends Controller
{


    public function tutorShow()
    {
        // Mendapatkan data profil dengan user_id selain 1 (superAdmin)
        $otherTutors = Profile::where('user_id', '!=', 1)
                            ->with('user','kecamatan')
                            ->get();

        return view('layoutUser.tutorPage', ['otherTutors' => $otherTutors]);
    }

    public function showTutor($id)
    {
        // Mengambil data profil tutor berdasarkan $id
        $tutorProfile = Profile::where('user_id', $id)
                        ->with('user','kecamatan','profile')
                        ->first();

        return view('layoutUser.tutorDetail', ['tutorProfile' => $tutorProfile]);
    }
}
