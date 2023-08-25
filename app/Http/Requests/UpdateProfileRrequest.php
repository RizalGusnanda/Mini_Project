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
        'id_kecamatans' => 'nullable|exists:kecamatans,id',
        'id_kelurahans' => 'nullable|exists:kelurahans,id',
        'id_spesalisasis' => 'nullable|exists:spesalisasis,id',
        'telepon' => ['nullable', 'regex:/^08\d{9,11}$/', 'max:255'],
        'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
        'profile' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'alamat' => 'nullable|string|max:255',
        'pendidikan' => 'nullable|string|max:255',
        'jurusan' => 'nullable|string|max:255',
        'instansi' => 'nullable|string|max:255',
        'norek' => 'nullable|string|max:255',
        'bank' => 'nullable|in:BRI,BCA,BNI',
        'sertifikasi.*' => 'nullable|string|max:255',
        'link.*' => 'nullable|string|max:255',
    ];
}

}
