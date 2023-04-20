<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    use HasFactory;
    protected $table = 'detail_pembelian';
    protected $primaryKey = 'id';
    protected $fillable = ['id_pembelian', 'id_barang', 'harga_beli', 'harga_jual', 'id_supplier'];
}
