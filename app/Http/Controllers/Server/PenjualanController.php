<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\Barang;
use App\Models\DetailPembelian;
use App\Http\Requests\StorePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $kategori = Kategori::all();

        $barangByKategori = [];
        foreach ($kategori as $getKategori) {
            $splitBarang = Barang::join('kategori', 'barang.id_kategori', '=', 'kategori.id')
            ->select('barang.*', 'kategori.kategori')
            ->where('id_kategori', $getKategori->id)->get();
            $barangByKategori[$getKategori->kategori] = $splitBarang;
        }
        
        return view('client-side.beranda', compact(['kategori', 'barangByKategori']))->with($data);
    }

    public function history()
    {
        $data = [ 'time' => date('h:i a')];
        $numb = 1;
        $userId = Auth::id(); 
        $history = penjualan::join('barang', 'barang.id', '=', 'penjualan.id_barang')->select('penjualan.*', 'barang.nama_barang')->where('penjualan.user_id', $userId)
        ->orderBy('penjualan.tanggal_penjualan', 'desc')
        ->get();
        return view('client-side.history', compact('history','numb'))->with($data);
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
        $barang->stok -= $data['qty'];
        $barang->save();

        $jumlahQty = $data['qty'];
        $produkIndex = 0;
        
        while ($jumlahQty > 0) {
            $produk = DetailPembelian::where('id_barang', $data['id_barang'])->skip($produkIndex)->first();
            
            if ($produk) {
                $stokAwal = $produk->jumlah_pembelian;
                $jumlahPembelianBaru = $stokAwal - $jumlahQty;
                
                if ($jumlahPembelianBaru >= 0) {
                    $produk->jumlah_pembelian = $jumlahPembelianBaru;
                    $produk->save();
                    $jumlahQty = 0;
                } else {
                    $produk->jumlah_pembelian = 0;
                    $produk->save();
                    $jumlahQty -= $stokAwal;
                    $produkIndex++;
                }
            } else {
                echo "Tidak ada produk yang tersedia.";
                break;
            }
        }
        
        $detailPembelian = DetailPembelian::select('harga_jual')->where('id_barang', $data['id_barang'])->first();
        $hargaJual = $detailPembelian->harga_jual;
        $jumlahBayar = $hargaJual *  $data['qty'];

        if ($request->hasFile('bukti_pembayaran')) {
            $fotoBarang = $data['bukti_pembayaran'];
            $namaFile = $data['user_id'] . '_' . $fotoBarang->getClientOriginalName();
            $fotoBarang->storeAs('public/bukti_pembayaran', $namaFile);
            $data['bukti_pembayaran'] = $namaFile;
        } else {
            $data['bukti_pembayaran'] = null;
        }     
        $penjualan=Penjualan::create($data, $jumlahBayar);
        $idPenjualan = $penjualan->id;
        return redirect('upload/'. $idPenjualan);
    }

    public function upload($id)
    {
        $data = [ 'time' => date('h:i a')];
        $penjualan = Penjualan::find($id);
        return view('client-side.upload', compact('penjualan')) ->with($data);
    }

    public function uploadBukti(Request $request, $id)
    {
        $data = $request->all();
        $penjualan = Penjualan::find($id);
        if ($request->hasFile('bukti_pembayaran')) {
            $fotoBarang = $data['bukti_pembayaran'];
            $namaFile = $fotoBarang->getClientOriginalName();
            $fotoBarang->storeAs('public/bukti_pembayaran', $namaFile);
            $data['bukti_pembayaran'] = $namaFile;
        } else {
            $data['bukti_pembayaran'] = null;
        }     
        $penjualan->update($data);
        return redirect('history');
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
    public function updateStatus(Request $request, $id)
    {
        $penjualan = Penjualan::find($id);
        $penjualan->status = $request->input('status');
        $penjualan->save();
        return redirect()->back()->with('success');
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
