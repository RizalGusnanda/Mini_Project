<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;


class tutorConntroller extends Controller
{

    public function tutorShow(Request $request)
    {
        $search1 = $request->input('search1');
        $search2 = $request->input('search2');

        // Mendapatkan semua tutor (jika tidak ada pencarian)
        $otherTutors = Profile::where('user_id', '!=', 1)
                        ->with('user', 'kecamatan', 'spesialisasi')
                        ->get();

                        if ($search1 && $search2) {
                            $tutors = Profile::whereHas('spesialisasi', function ($query) use ($search1) {
                                            $query->where('nama_spesialisasi', 'like', '%' . $search1 . '%');
                                        })
                                        ->where('alamat', 'like', '%' . $search2 . '%')
                                        ->with('spesialisasi')
                                        ->get();
                        } else {
                            $tutors = $otherTutors;
                        }
        return view('layoutUser.tutorPage', ['otherTutors' => $otherTutors, 'searchResults' => $tutors]);
    }
}
