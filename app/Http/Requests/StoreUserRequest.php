<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'name' => 'required|string|max:50',
            'password' => 'required',
            'user_type' => ['required', Rule::in(['user_pengajar', 'user'])],
        ];
        
    }

    // public function messages()
    // {
    //     return [
    //         'email.required' => 'Kolom email harus diisi.',
    //         'email.email' => 'Format email tidak valid.',
    //         'email.unique' => 'Email sudah digunakan oleh pengguna lain.',
    //         'name.required' => 'Kolom nama harus diisi.',
    //         'name.string' => 'Format nama tidak valid.',
    //         'name.max' => 'Kolom nama tidak boleh lebih dari :max karakter.',

    //         'password.required' => 'Kolom password harus diisi.',
    //         'password.min' => 'Password harus memiliki setidaknya 8 karakter.',

    //         'user_type.required' => 'Pilih jenis pengguna (user_pengajar atau user).',
    //         'user_type.in' => 'Jenis pengguna yang dipilih tidak valid.',
    //     ];
    // }
    
}
