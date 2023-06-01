<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokPembelian extends Model
{
    use HasFactory;
    protected $table = 'stok_pembelian';
    protected $primaryKey = 'kode_barang';
    protected $fillable = ['kode_barang', 'id_detail_pembelian', 'status_stok'];

    public function scopeGenerateKodeBarang()
    {
        $selectMaxId = explode('/', $this->max('kode_barang'));
        $generateNewId = (int) substr($selectMaxId[0], 4) + 1;
        return 'BRG.' . sprintf("%05s", $generateNewId) . '@IDB';
    }
}
