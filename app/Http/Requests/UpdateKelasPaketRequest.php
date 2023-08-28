<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKelasPaketRequest extends FormRequest
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
            'nama_paket' => 'nullable|string|max:255',
            'deskripsi'	 => 'nullable|string|max:255',
            'harga'	 => 'nullable|integer',
            'durasi' => 'nullable|integer',
        ];
    }
}
