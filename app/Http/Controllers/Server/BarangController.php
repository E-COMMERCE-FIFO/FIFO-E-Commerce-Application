<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Kategori;
use App\Models\StokPembelian;
use Illuminate\Support\Facades\Redirect;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::join('kategori', 'barang.id_kategori', '=', 'kategori.id')->select('*')->get();
        $numb = 1;
        return view('server-side.barang.index', compact(['barang', 'numb']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('server-side.barang.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangRequest $request)
    {
        $data = $request->all();
        $fotoBarang = $data['foto_barang'];
        $fotoBarang->storeAs('public/barang', $fotoBarang->hashName());
        $data['foto_barang'] = $data['foto_barang']->hashName();
        Barang::create($data);
        return Redirect::route('barang-activity.index')->with('message', 'Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('server-side.barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        $data = $request->all();
        Barang::find($barang->id)->update($data);
        return Redirect::route('barang-activity.index')->with('message', 'Data berhasil di-update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        Barang::find($barang->id)->delete();
        return Redirect::route('barang-activity.index')->with('message', 'Data berhasil dihapus.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function persediaanBarang()
    {
        $numb = 1;
        $barang = StokPembelian::all();
        $barang1 = StokPembelian::join('detail_pembelian', 'detail_pembelian.id_detail_pembelian', '=', 'stok_pembelian.id_detail_pembelian')->join('barang', 'barang.id', '=', 'detail_pembelian.id_barang')->join('pembelian', 'pembelian.id', '=', 'detail_pembelian.id_pembelian')->get();
        return view('server-side.barang.persediaan-barang', compact('numb', 'barang1'));
    }
}
