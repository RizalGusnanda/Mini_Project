<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Spesalisasi;
use Illuminate\Http\Request;
use App\Models\Profile;

class tutorConntroller extends Controller
{
    public function tutorShow(Request $request)
    {
        $spesialisasiData = Spesalisasi::all();
        $kecamatanData = Kecamatan::all();
        $search1 = $request->input('spesialisasis');
        $search2 = $request->input('id_kecamatans');

        $otherTutors = Profile::where('user_id', '!=', 1)
            ->with('user', 'kecamatan', 'spesialisasi');

        if ($search1) {
            $otherTutors->whereHas('spesialisasi', function ($query) use ($search1) {
                $query->where('id', $search1);
            });
        }

        if ($search2) {
            $otherTutors->whereHas('kecamatan', function ($query) use ($search2) {
                $query->where('id', $search2);
            });
        }

        $searchResults = $otherTutors->get();

        return view('layoutUser.tutorPage', [
            'spesialisasiData' => $spesialisasiData,
            'kecamatanData' => $kecamatanData,
            'searchResults' => $searchResults,
            'otherTutors' => $otherTutors
        ]);
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
