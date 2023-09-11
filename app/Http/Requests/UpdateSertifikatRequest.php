<?php

namespace App\Http\Requests;
use App\Models\Sertifikat;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSertifikatRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'pengalaman' => 'nullable|integer|max:255', // Mengubah validasi menjadi integer
            'penjelasan_pengalaman' => 'nullable|string|max:255',
            'sertifikasi' => 'array', // Menambahkan validasi array
            'sertifikasi.*' => 'nullable|string|max:255', // Validasi setiap elemen array
            'link' => 'array', // Menambahkan validasi array
            'link*' => 'nullable|string|max:255', // Validasi setiap elemen array

        ];
    }

    public function update(UpdateSertifikatRequest $request, $id)
    {
        // Validasi data berdasarkan rules dalam UpdateSertifikatRequest

        $sertifikat = Sertifikat::findOrFail($id);

        // Update data berdasarkan input dari $request
        $sertifikat->pengalaman = $request->input('pengalaman');
        $sertifikat->penjelasan_pengalaman = $request->input('penjelasan_pengalaman');

        // Proses nama_sertifikasi dan link_kegiatan yang bersifat array
        if ($request->has('sertifikasi')) {
            $sertifikat->nama_sertifikasi = $request->input('sertifikasi');
        }

        if ($request->has('link')) {
            $sertifikat->link_kegiatan = $request->input('link');
        }

        $sertifikat->save();

        return redirect()->back()->with('success', 'Sertifikat berhasil diperbarui.');
    }
}