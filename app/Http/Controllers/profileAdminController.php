<?php

namespace App\Http\Controllers;
use  App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileAdminController extends Controller
{
    public function edit()
    {
        return view('profileAdmin.index');
    }
    
    public function update(UpdateProfileRequest $request)
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

    // Set profile to null if not provided
    if (!$request->filled('jenis_kelamin')) {
        $profile->jenis_kelamin = null;
    }

    if (!$request->filled('telepon')) {
        $profile->telepon = null;
    }

    // Handle image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('profile_images', 'public');
        $profile->profile_picture = $imagePath; // Ganti profile_image menjadi profile_picture
    }

    $profile->save();

    return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
}
}