<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePembelianRequest extends FormRequest
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
            'tgl_pembelian' => 'required'
        ];
    }

    public function messages() 
    {
        return [
            'tgl_pembelian.required' => 'Tanggal pembelian harus diisi!'
        ];
    }
}
