<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPembelian extends Model
{
    use HasFactory;
    protected $table = 'laporan_pembelian';
    protected $primaryKey = 'id_laporan_pembelian';
    protected $fillable = ['id_pembelian', 'id_barang', 'sisa_stok', 'jumlah_pembelian', 'harga_beli', 'harga_jual', 'jumlah_harga', 'id_supplier'];
}
