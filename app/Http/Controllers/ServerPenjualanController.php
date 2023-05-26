<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;

class ServerPenjualanController extends Controller
{
    //

    public function index () {
        $number = 1;
        $penjualan = Penjualan::join('users', 'users.id', '=', 'penjualan.user_id')->select('users.nama_lengkap', 'penjualan.tanggal_penjualan','penjualan.id')->get();
        return view('server-side.penjualan.index', compact('penjualan', 'number'));
    }

    public function show ($id) {
        $data = Penjualan::join('users', 'penjualan.user_id', '=', 'users.id')->join('barang', 'penjualan.id_barang', '=', 'barang.id')
        ->select('penjualan.*', 'users.nama_lengkap', 'barang.nama_barang')->where('penjualan.id', $id)->first();
        return view('server-side.penjualan.show', compact('data'));
    }
}
