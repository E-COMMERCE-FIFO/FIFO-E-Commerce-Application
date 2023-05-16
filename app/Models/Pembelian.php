<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'tgl_pembelian', 'user_id'];

    // public function user() {
    //     return $this->belongsTo(User::class);
    // }

    public function scopeIdPembelian() {
        return $this->max('id') + 1;
    }
}
