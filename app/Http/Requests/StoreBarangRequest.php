<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBarangRequest extends FormRequest
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
            'nama_barang' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'stok' => 'required|numeric|min:0'
        ];
    }

    public function messages()
    {
        return [
            'nama_barang.required' => 'Nama barang harus diisi!',
            'nama_barang.regex' => 'Nama barang harus sesuai!',
            'stok.required' => 'Stok harus diisi!',
            'stok.numeric' => 'Stok harus berupa angka!',
            'stok.min' => 'Stok harus bernilai angka positif!'
        ];
    }
}
