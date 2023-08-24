<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class TutorConntroller extends Controller
{
    public function tutorShow(Request $request)
    {
        $search1 = $request->input('search1');
        $search2 = $request->input('search2');

        if ($search1 && $search2) {
            $tutors = Profile::whereHas('spesialisasi', function ($query) use ($search1) {
                            $query->where('nama_spesialisasi', 'like', '%' . $search1 . '%');
                        })
                        ->where('alamat', 'like', '%' . $search2 . '%')
                        ->with('spesialisasi')
                        ->get();
        } else {
            $tutors = $this->getAllTutors();
        }

        return view('layoutUser.tutorPage', ['searchResults' => $tutors]);
    }

    private function getAllTutors()
    {
        return Profile::where('user_id', '!=', 1)
                        ->with('user', 'kecamatan', 'spesialisasi')
                        ->get();
    }

    public function tutorDetail($id) {
        $tutor = Profile::with('user', 'kecamatan', 'spesialisasi')->find($id);
    
        if (!$tutor) {
            return redirect()->route('tutor.show')->with('error', 'Tutor tidak ditemukan.');
        }
    
        return view('layoutUser.detailTutorPage', ['tutor' => $tutor]);
    }
    
}
