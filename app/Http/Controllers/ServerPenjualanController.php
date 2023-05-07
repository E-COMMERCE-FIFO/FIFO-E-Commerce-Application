<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;

class ServerPenjualanController extends Controller
{
    //

    public function index () {
        $number = 1;
        $penjualan = Penjualan::join('users', 'users.id', '=', 'penjualan.user_id')->select('users.nama_lengkap', 'penjualan.tanggal_penjualan')->get();
        return view('server-side.penjualan.index', compact('penjualan', 'number'));
    }
}
