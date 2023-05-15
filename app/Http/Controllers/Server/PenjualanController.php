<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\Barang;
use App\Models\DetailPembelian;
use App\Http\Requests\StorePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [ 'time' => date('h:i a')];
        $barang = Barang::all();
        return view('client-side.beranda', compact('barang'))->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenjualanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $barang = Barang::find($data['id_barang']);
        $barang->stok = $barang->stok - $data['qty'];
        $barang->save();
    
        $detailPembelian = DetailPembelian::select('harga_jual')->where('id_barang', $data['id_barang'])->first();
        $hargaJual = $detailPembelian->harga_jual;
        $jumlahBayar = $hargaJual *  $data['qty'];

        $fotoBarang = $data['bukti_pembayaran'];
        $namaFile = $data['user_id'] . '_' . $fotoBarang->getClientOriginalName();
        $fotoBarang->storeAs('public/bukti_pembayaran', $namaFile);
        $data['bukti_pembayaran'] = $namaFile;

        
        Penjualan::create($data, $jumlahBayar);
        return redirect('beranda');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [ 'time' => date('h:i a')];
        $barang = Barang::find($id);
        $jual = Barang::join('detail_pembelian', 'detail_pembelian.id_barang', '=', 'barang.id')->select('barang.nama_barang', 'detail_pembelian.harga_jual') ->where('barang.id', $id)->first();
        $user = auth()->user();
        return view('client-side.penjualan', compact('barang','user','jual'))->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenjualanRequest  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenjualanRequest $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
