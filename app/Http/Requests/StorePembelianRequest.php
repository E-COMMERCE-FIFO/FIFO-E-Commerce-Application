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
            'tgl_pembelian' => 'required',
            'id_barang' => 'required',
            'jumlah_pembelian.*' => 'required|numeric|min:0',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'id_supplier' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tgl_pembelian.required' => 'Tanggal pembelian harus diisi!',
            'id_barang.required' => 'Barang pembelian harus diisi!',
            'jumlah_pembelian.required' => 'Jumlah pembelian harus diisi!',
            'harga_beli.required' => 'Harga beli harus diisi!',
            'harga_jual.required' => 'Harga jual harus diisi!',
            'id_supplier.required' => 'Supplier harus diisi!',
            // 'jumlah_pembelian.*.numeric' => 'Jumlah pembelian harus berupa angka!',
            // 'jumlah_pembelian.*.min' => 'Jumlah pembelian minimal 0!',
        ];
    }
}
