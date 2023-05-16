<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\DetailPembelian;
use App\Models\Penjualan;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totaladmin = User::where('role', 'Administrator')->count();
        $totalpelanggan = User::where('role', 'Customer')->count();
        $totalsupplier = Supplier::count();
        $totalbarang = Barang::count();
        $totalpembelian = DetailPembelian::count();
        $totalpenjualan = Penjualan::count();
        
        return view('server-side.dashboard', compact([
            'totaladmin',
            'totalpelanggan',
            'totalsupplier',
            'totalbarang',
            'totalpembelian',
            'totalpenjualan'
        ]));
    }

    public function datatables()
    {
        return view('server-side.datatables');
    }

    public function form()
    {
        return view('server-side.form');
    }
}
