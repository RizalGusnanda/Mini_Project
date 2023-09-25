<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Spesalisasi;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Testimoni;

class tutorConntroller extends Controller
{
    public function tutorShow(Request $request)
    {
        $spesialisasiData = Spesalisasi::all();
        $kecamatanData = Kecamatan::all();
        $search1 = $request->input('spesialisasis');
        $search2 = $request->input('id_kecamatans');
        $searchAjar = $request->input('ajar');

        $otherTutors = Profile::where('user_id', '!=', 1)
            ->whereHas('user', function ($query) {
                $query->whereHas('roles', function ($roleQuery) {
                    $roleQuery->where('name', 'user-pengajar');
                });
            })
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

        if ($searchAjar) {
            $otherTutors->where('ajar', $searchAjar);
        }

        $searchResults = $otherTutors->paginate(6);

        return view('layoutUser.tutorPage', [
            'spesialisasiData' => $spesialisasiData,
            'kecamatanData' => $kecamatanData,
            'searchResults' => $searchResults,
            'otherTutors' => $otherTutors,
            'search1' => $search1,
            'search2' => $search2,
            'searchAjar' => $searchAjar,
        ]);
    }



    private function getAllTutors()
    {
        return Profile::where('user_id', '!=', 1)
            ->with('user', 'kecamatan', 'spesialisasi')
            ->get();
    }

    public function tutorDetail($id)
    {
        $tutor = Profile::with('user', 'kecamatan', 'sertifikats')->find($id);
        $testimoni = Testimoni::select(
            'testimonis.*',
            'users.name',
            'profiles.profile'
        )
            ->leftJoin('users', 'users.id', 'testimonis.user_testimoni')
            ->leftJoin('profiles', 'profiles.user_id', 'testimonis.user_testimoni')
            ->where('testimonis.id_users', $tutor->user->id)
            ->paginate(10);

        $averageRating = Testimoni::where('id_users', $tutor->user->id)->avg('rating');

        if (!$tutor) {
            return redirect()->route('tutor.show')->with('error', 'Tutor tidak ditemukan.');
        }

        return view('layoutUser.detailTutorPage', ['tutor' => $tutor, 'testimoni' => $testimoni, 'averageRating' => $averageRating]);
    }
}
