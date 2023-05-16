<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $fillable = ['foto_barang','nama_barang', 'id_kategori', 'stok'];

    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }

    public function penjualan() {
        return $this->belongsTo(Penjualan::class);
    }
}
