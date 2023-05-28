<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\DetailPembelian;
use App\Models\Pembelian;
use App\Models\Supplier;
use App\Http\Requests\StorePembelianRequest;
use App\Http\Requests\UpdatePembelianRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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
        if (count($data['id_barang']) > 0) {
            foreach ($data['id_barang'] as $inx => $value) {
                $perhitungan = $data['harga_jual'][$inx] * $data['jumlah_pembelian'][$inx];
                echo "<h2>$perhitungan</h2>";
                if ($perhitungan < $data['harga_beli'][$inx]) {
                    return Redirect::route('pembelian-activity.create')->with('error', 'Harga jual harus mendapatkan untung dari total harga beli.');
                } else {
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
                                'id_supplier' => $data['id_supplier'][$key]
                            );
                            $refreshstok = Barang::find($data['id_barang'][$key])->stok + $data['jumlah_pembelian'][$key];
                            DetailPembelian::create($multipleData);
                            Barang::find($data['id_barang'][$key])->update(['stok' => $refreshstok]);
                        }
                    }

                    return Redirect::route('pembelian-activity.index')->with('message', 'Pembelian baru berhasil ditambahkan.');
                }
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
}
