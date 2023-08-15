<?php

namespace App\Http\Controllers;

use  App\Http\Requests\UpdateProfileRrequest;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Profile;
use App\Models\Spesalisasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class profileUserController extends Controller
{
    public function index()
    {
        $kelurahans = Kelurahan::all();
        return view('layoutUser.layout.tutorProfilePage', compact('kelurahans'));
    }

    public function profile()
    {
        $userId = Auth::id();
        $profile = Profile::where('user_id', $userId)->first();
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        $spesalisasis = Spesalisasi::all();

        return view('layoutUser.profileTutorPage')->with([
            'kecamatans' => $kecamatans,
            'kelurahans' => $kelurahans,
            'profile' => $profile,
            'spesalisasis' => $spesalisasis,
        ]);
    }

    public function getKecamatan()
    {
        $kecamatan['Kecamatan'] = Kecamatan::get();
        return response()->json($kecamatan);
    }

    public function getKelurahans(Request $request)
    {
        $kelurahans = Kelurahan::all()->where('id_kecamatan', $request->kecamatan_id);
        return response()->json(['kelurahans' => $kelurahans]);
    }

    public function loadFilter(Request $request)
    {
        $kelurahans = Kelurahan::all()->where('id_kecamatan', $request->id);
        return response()->json(['kelurahans' => $kelurahans]);
    }

    public function loadFilterSpesialisasi(Request $request)
    {
        $spesalisasis = Spesalisasi::all();
        return response()->json(['spesalisasis' => $spesalisasis]);
    }

    public function getAllSpesialisasi()
    {
        $spesalisasis = Spesalisasi::all();
        return response()->json(['spesalisasis' => $spesalisasis]);
    }

    public function show()
    {
        return view('layoutUser.layout.tutorProfilePage');
    }

    public function edit()
    {
        return view('layoutUser.layout.tutorProfilePage');
    }

    public function updateSpesialisasi(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        if ($profile) {
            $profile->id_spesalisasis = $request->input('id_spesialisasis');
            $profile->save();

            return response()->json(['message' => 'Spesialisasi berhasil diperbarui']);
        }

        return response()->json(['message' => 'Profil tidak ditemukan'], 400);
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
        $profile->pendidikan = $request->input('pendidikan');
        $profile->jurusan = $request->input('jurusan');
        $profile->instansi = $request->input('instansi');
        $profile->norek = $request->input('norek');
        $profile->bank = $request->input('bank');

        // Mengambil data id_kecamatans, id_kelurahans, dan id_spesalisasis dari database
        $kecamatan = Kecamatan::find($request->input('id_kecamatans'));
        $kelurahan = Kelurahan::find($request->input('id_kelurahans'));
        $spesalisasis = Spesalisasi::find($request->input('id_spesalisasis'));

        // Hubungkan data yang diambil dengan model Profile
        if ($kecamatan) {
            $profile->kecamatan()->associate($kecamatan);
        }

        if ($kelurahan) {
            $profile->kelurahan()->associate($kelurahan);
        }

        if ($spesalisasis) {
            $profile->spesialisasi()->associate($spesalisasis); // Menggunakan "spesialisasi" bukan "spesialisasis"
        }
        // Set profile to null if not provided
        if (!$request->filled('jenis_kelamin')) {
            $profile->jenis_kelamin = null;
        }

        if (!$request->filled('telepon')) {
            $profile->telepon = null;
        }
        if (!$request->filled('pendidikan')) {
            $profile->pendidikan = null;
        }
        if (!$request->filled('jurusan')) {
            $profile->jurusan = null;
        }
        if (!$request->filled('instansi')) {
            $profile->instansi = null;
        }
        if (!$request->filled('norek')) {
            $profile->norek = null;
        }
        if (!$request->filled('bank')) {
            $profile->bank  = null;
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
