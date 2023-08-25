<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Sertifikat;
use App\Http\Requests\UpdateSertifikatRequest;
use Illuminate\Support\Facades\Auth;

class SertifikatTutorController extends Controller
{
    public function edit()
    {
        $sertifikats = Auth::user()->profile->sertifikats ?? [];
        return view('layoutUser.sertifikat-tutor', compact('sertifikats'));
    }


    public function updateSertif(UpdateSertifikatRequest $request)
{
    $user = Auth::user();
    $profile = $user->profile;

    // Perbarui atau Buat data Profil
    if (!$profile) {
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->save();
    }

    // Perbarui bidang pengalaman
    $profile->pengalaman = $request->input('pengalaman');
    $profile->penjelasan_pengalaman = $request->input('penjelasan_pengalaman');
    $profile->save();

    // Ambil kembali daftar sertifikat yang diperbarui setelah menambahkan yang baru
    $sertifikats = [];

    // Handle Sertifikat Baru
    $namaSertifikasi = $request->input('sertifikasi');
    $linkKegiatan = $request->input('link');
        
    if ($namaSertifikasi && is_array($namaSertifikasi)) {
        foreach ($namaSertifikasi as $index => $nama) {
            if (!empty($nama)) {
                $sertifikatId = $request->input('sertifikat_id')[$index] ?? null;

                // Jika ada ID sertifikat, berarti ini adalah pengeditan sertifikat yang sudah ada
                if ($sertifikatId) {
                    $existingSertifikat = Sertifikat::where('id', $sertifikatId)
                        ->where('user_id', Auth::id())
                        ->first();

                    if ($existingSertifikat) {
                        $existingSertifikat->sertifikasi = $nama;
                        $existingSertifikat->link = $linkKegiatan[$index] ?? null;
                        $existingSertifikat->save();
                        $sertifikats[] = $existingSertifikat;
                    }
                } else {
                    // Jika sertifikat belum ada, simpan sertifikat baru
                    $sertifikat = new Sertifikat([
                        'user_id' => Auth::id(),
                        'sertifikasi' => $nama,
                        'link' => $linkKegiatan[$index] ?? null,
                    ]);

                    $profile->sertifikats()->save($sertifikat);
                    $sertifikats[] = $sertifikat;
                }
            }
        }
    }

    // Alihkan kembali ke halaman yang relevan dengan data yang diperbarui
    return view('layoutUser.sertifikat-tutor', compact('sertifikats'))->with('success', 'Sertifikat berhasil diperbarui.');
}

    public function destroySertifikat(Sertifikat $sertifikat)
    {
        try {
            // Hapus sertifikat
            $sertifikat->delete();

            // Mengembalikan respons sukses
            return response()->json(['success' => true]);
        } catch (\Illuminate\Database\QueryException $e) {
            $error_code = $e->errorInfo[1];
            if ($error_code == 1451) {
                // Jika terjadi error foreign key constraint
                return response()->json(['error' => 'Sertifikat digunakan dalam tabel lain']);
            } else {
                // Jika terjadi error lainnya
                return response()->json(['error' => 'Terjadi kesalahan saat menghapus sertifikat']);
            }
        }
    }
}
