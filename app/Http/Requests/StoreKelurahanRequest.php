<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKelurahanRequest extends FormRequest
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
            'kelurahan' => 'required|unique:kelurahans,kelurahan|regex:/^[a-zA-Z]+$/u',
            'id_kecamatan' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id_kecamatan.required' => 'Data Kecamatan cannot be empty',
            'kelurahan.required' => 'Data Kelurahan cannot be empty',
            'kelurahan.unique' => 'Data Kelurahan already exists',
            'kelurahan.regex' => 'Data Kelurahan cannot be characters @!_?',
        ];
    }
}
