<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKategoriRequest extends FormRequest
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
            'kategori' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
        ];
    }

    public function messages()
    {
        return [
            'kategori.required' => 'Nama kategori harus diisi!',
        ];
    }
}
