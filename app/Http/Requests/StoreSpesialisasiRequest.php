<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpesialisasiRequest extends FormRequest
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
            'nama_spesialisasi' => 'required|unique:spesalisasis,nama_spesialisasi',
        ];
    }
    public function messages()
    {
        return [
            'nama_spesialisasi.required' => 'Data Spesialisasi cannot be empty',
            'nama_spesialisasi.unique' => 'Data Spesialisasi already exists',
            // 'nama_spesialisasi.regex' => 'Data Spesialisasi cannot be characters @!_?',
        ];
    }
}
