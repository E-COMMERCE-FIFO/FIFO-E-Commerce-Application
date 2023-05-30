@extends('server-side.layouts.main-server')
@section('title', 'Detail Pembelian')
@section('main-content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Detail Pembelian</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Transaksi</li>
            <li class="breadcrumb-item active">Pembelian</li>
        </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                            <h5 class="card-title">Detail Transaksi</h5>
                            </div>
                        </div>
                            <table class="table">
                            <tr>
                                <th scope="col" class="col-3">Pembeli</th>
                                <td class="col-md-8">{{ $data->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th scope="col" class="col-4"> Barang Dibeli</th>
                                <td class="col-md-8">{{ $data->nama_barang }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Jumlah Barang</th>
                                <td class="col-md-8">{{ $data->qty }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Total Bayar</th>
                                <td class="col-md-8">{{ $data->jumlah_bayar }}</td>
                            </tr> 
                            <tr>
                                <th scope="col">Status Pembelian</th>                    
                                <td class="col-md-8">
                                    <div class="d-flex justify-content-md-between gap-2">
                                        @if($data->status == 'Sukses')
                                        <p class="badge bg-success mt-2">{{ $data->status }}</p>
                                        @elseif($data->status == 'Gagal')
                                        <p class="badge bg-danger mt-2">{{ $data->status }}</p>
                                        <form action="{{  url('keterangan/'. $data->id) }}" class="d-flex gap-2" method="post" id="keteranganForm">
                                        @csrf
                                        @method('PUT')
                                        <input type="textarea" name="keterangan" value="{{ $data->keterangan }}" autocomplete="off">
                                        <button type="submit" class="btn btn-success" id="submitButton"><i class="bi bi-send"></i></button>
                                        </form>
                                        @elseif($data->bukti_pembayaran == '')
                                        <p class="badge bg-danger text-center my-2">Menunggu Pembayaran</p>
                                        @else
                                        <p class="badge bg-primary mt-1">{{ $data->status }}</p>
                                        <form action="{{ url('penjualan/update/'. $data->id) }}" method="post" >
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="nama_lengkap" value="{{ $data->nama_lengkap }}">
                                            <input type="hidden" name="nama_barang" value="{{ $data->nama_barang }}">
                                            <input type="hidden" name="qty" value="{{ $data->qty }}">
                                            <input type="hidden" name="status" value="Sukses">
                                            <button type="submit" class="btn btn-success"><i class="bi bi-check-square-fill"></i></button>
                                        </form>
                                        <form action="{{ url('penjualan/updates/'. $data->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="Gagal">
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-x"></i></button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="mb-4">
                        <h4 class="text-center">Bukti Transfer</h4>
                            <img src="{{ Storage::url('public/bukti_pembayaran/') . $data->bukti_pembayaran }}" alt="" width="100%">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <a href="{{ url('penjualan') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
