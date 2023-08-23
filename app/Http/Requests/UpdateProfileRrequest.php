<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
{
    return [
        'id_kecamatans' => 'required|nullable|exists:kecamatans,id',
        'id_kelurahans' => 'required|nullable|exists:kelurahans,id',
        'id_spesalisasis' => 'required|nullable|exists:spesalisasis,id',
        'telepon' => 'required|nullable|string|max:255',
        'jenis_kelamin' => 'required|nullable|in:Laki-laki,Perempuan',
        'profile' => 'required|nullable|image|mimes:jpeg,png,jpg|max:2048',
        'alamat' => 'required|nullable|string|max:255',
        'pendidikan' => 'required|nullable|string|max:255',
        'jurusan' => 'required|nullable|string|max:255',
        'instansi' => 'required|nullable|string|max:255',
        'norek' => 'required|nullable|string|max:255',
        'bank' => 'required|nullable|in:BRI,BCA,BNI',
        'pengalaman' => 'nullable|string|max:255',
        'penjelasan_pengalaman' => 'nullable|string|max:255',

    ];
}



public function messages(){

    return[
        'id_kecamatans.required' => 'Kolom kecamatan harus diisi.',

        'id_kelurahans.required' => 'Kolom kelurahan harus diisi.',

        'id_spesalisasis.required' => 'Kolom spesialisasi harus diisi.',

        'telepon.required' => 'Kolom telepon harus diisi.',
        'telepon.string' => 'format telepon tidak sesuai.',

        'jenis_kelamin.required' => 'Kolom jenis kelamin harus diisi.',

        'profile.required' => 'image harus diisi.',
        'profile.mimes' => 'Format foto harus : jpeg,png,jpg.',

        'alamat.required' => 'Kolom alamat harus diisi.',
        'alamat.string' => 'format alamat tidak sesuai.',

        'pendidikan.required' => 'Kolom pendidikan harus diisi.',
        'pendidikan.string' => 'format pendidikan tidak sesuai.',

        'jurusan.required' => 'Kolom jurusan harus diisi.',
        'jurusan.string' => 'format jurusan tidak sesuai.',

        'instansi.required' => 'Kolom instansi harus diisi.',
        'instansi.string' => 'format instansi tidak sesuai.',

        'norek.required' => 'Kolom pendidikan harus diisi.',
        'norek.string' => 'format pendidikan tidak sesuai.',

        'bank.required' => 'Kolom pendidikan harus diisi.',
        'bank.string' => 'format pendidikan tidak sesuai.',

    ];
}

}