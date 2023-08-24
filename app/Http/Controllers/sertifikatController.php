<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use  App\Http\Requests\UpdateProfileRrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class sertifikatController extends Controller
{
    public function edit()
    {
        return view('layoutUser.sertifikat-tutor');
    }

    public function updateSertif(UpdateProfileRrequest $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        // Update or Create Profile data
        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }

        // Update the pengalaman field
        $profile->pengalaman = $request->input('pengalaman');
        $profile->penjelasan_pengalaman = $request->input('penjelasan_pengalaman');

        // Save the changes
        $profile->save();

        // Redirect back to the relevant page
        return redirect()->route('sertifikat-layout.edit')->with('success', 'Profil berhasil diperbarui.');
    }


}
