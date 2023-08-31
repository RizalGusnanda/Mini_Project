<?php

namespace App\Http\Controllers;
use  App\Http\Requests\UpdateProfileRrequest;

use App\Models\Kelurahan;
use App\Models\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProfileAdminController extends Controller
{

    public function show(){
        return view('profileAdmin.index');
    }

    public function edit()
    {
        return view('profileAdmin.index');
    }



            public function update(UpdateProfileRrequest $request)
        {
            $user = Auth::user();

            // Update User data
            $user->name = $request->input('username');
            $user->email = $request->input('email');
            $user->save();

            // Update or Create Profile data
            $profile = $user->profile;

            if (!$profile) {
                $profile = new Profile();
                $profile->user_id = $user->id;
            }

            $profile->jenis_kelamin = $request->input('jenis_kelamin');
            $profile->telepon = $request->input('telepon');
            $profile->alamat = $request->input('alamat');





            // Set profile to null if not provided
            if (!$request->filled('jenis_kelamin')) {
                $profile->jenis_kelamin = null;
            }

            if (!$request->filled('telepon')) {
                $profile->telepon = null;
            }




            if ($request->hasFile('image')) {
                // Hapus gambar sebelumnya (jika ada)
                if ($profile->profile) {
                    Storage::disk('public')->delete($profile->profile);
                }

                // Simpan gambar baru
                $imagePath = $request->file('image')->store('profile_images', 'public');
                $profile->profile = $imagePath; // Ganti profile_image menjadi profile_picture
            }

            $profile->save();

            return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
        }
}
