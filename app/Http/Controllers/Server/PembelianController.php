<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\DetailPembelian;
use App\Models\Pembelian;
use App\Models\Supplier;
use App\Models\Penjualan;
use App\Http\Requests\StorePembelianRequest;
use App\Http\Requests\UpdatePembelianRequest;
use App\Models\LaporanPembelian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;



class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numb = 1;
        $pembelian = Pembelian::join('users', 'pembelian.user_id', '=', 'users.id')
        ->select('pembelian.*', 'users.nama_lengkap')
        ->orderBy('pembelian.tgl_pembelian', 'asc')
        ->get();
        return view('server-side.pembelian.index', compact('numb', 'pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembelianId = Pembelian::IdPembelian();
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('server-side.pembelian.create', compact('barang', 'supplier', 'pembelianId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePembelianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePembelianRequest $request)
    {
        $data = $request->all();
        $isUntung = true;
        if (count($data['id_barang']) > 0) {
            foreach ($data['id_barang'] as $inx => $value) {
                $hargaJual = $data['harga_jual'][$inx];
                $hargaBeli = $data['harga_beli'][$inx];
                if ($hargaJual < $hargaBeli) {
                    $isUntung = false;
                    break;
                }
            }
            if ($isUntung) {
                Pembelian::create([
                    'id' => $data['id_pembelian'],
                    'tgl_pembelian' => $data['tgl_pembelian'],
                    'user_id' => $data['user_id']
                ]);
                if (count($data['id_barang']) > 0) {
                    foreach ($data['id_barang'] as $key => $value) {
                        $multipleData = array(
                            'id_pembelian' => $data['id_pembelian'],
                            'id_barang' => $data['id_barang'][$key],
                            'jumlah_pembelian' => $data['jumlah_pembelian'][$key],
                            'harga_beli' => $data['harga_beli'][$key],
                            'harga_jual' => $data['harga_jual'][$key],
                            'jumlah_harga' => $data['harga_beli'][$key]*$data['jumlah_pembelian'][$key],
                            'id_supplier' => $data['id_supplier'][$key]
                        );
                        $refreshstok = Barang::find($data['id_barang'][$key])->stok + $data['jumlah_pembelian'][$key];
                        DetailPembelian::create($multipleData);
                        LaporanPembelian::create($multipleData);
                        Barang::find($data['id_barang'][$key])->update(['stok' => $refreshstok]);
                    }
                }

                return Redirect::route('pembelian-activity.index')->with('message', 'Pembelian baru berhasil ditambahkan.');
            } else {
                return Redirect::route('pembelian-activity.create')->with('error', 'Harga jual harus mendapatkan untung dari total harga beli.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        $numb = 1;
        $detail = DetailPembelian::join('pembelian', 'detail_pembelian.id_pembelian', '=', 'pembelian.id')->join('users', 'pembelian.user_id', '=', 'users.id')->join('barang', 'detail_pembelian.id_barang', '=', 'barang.id')->join('supplier', 'detail_pembelian.id_supplier', '=', 'supplier.id')->select('*')->where('id_pembelian', $pembelian->id)->get();
        return view('server-side.pembelian.detail', compact('pembelian', 'numb', 'detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePembelianRequest  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePembelianRequest $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function laporanPembelian(Request $request)
    {
        $numb = 1;
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $getDataLaporan = DetailPembelian::join('pembelian', 'detail_pembelian.id_pembelian', '=', 'pembelian.id')->join('users', 'pembelian.user_id', '=', 'users.id')->join('barang', 'detail_pembelian.id_barang', '=', 'barang.id')->join('supplier', 'detail_pembelian.id_supplier', '=', 'supplier.id')->select('*')->whereBetween('tgl_pembelian', [$tanggalAwal, $tanggalAkhir])->get();

        return view('server-side.laporan.laporan-pembelian', compact(['numb', 'getDataLaporan']));
    }
    public function laporanPenjualan(Request $request)
    {
        $numb = 1;
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $getDataLaporan = Penjualan::join('users', 'penjualan.user_id', '=', 'users.id')
        ->join('barang', 'penjualan.id_barang', '=', 'barang.id')
        ->select('*')
        ->whereBetween('tanggal_penjualan', [$tanggalAwal, $tanggalAkhir])
        ->where('status', 'sukses')
        ->get();

        return view('server-side.laporan.laporan-penjualan', compact(['numb', 'getDataLaporan']));
    }
}
