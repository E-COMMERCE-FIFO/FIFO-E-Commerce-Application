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
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="card-title">Detail Transaksi Pembelian (Barang Masuk) Tanggal {{ $detail[0]->tgl_pembelian }} <br><br> Penanggung Jawab Transaksi : {{ $detail[0]->nama_lengkap }}</h5>
                </div>
              </div>
              <!-- Table with stripped rows -->
              <table class="table">
                <tr>
                  <th scope="col">#No</th>
                  <th scope="col">Barang</th>
                  <th scope="col">Penambahan Stok</th>
                  <th scope="col">Harga Beli</th>
                  <th scope="col">Harga Jual</th>
                  <th scope="col">Total Harga</th>
                  <th scope="col">Supplier</th>
                </tr>
                @foreach ($detail as $detail)
                  <tr>
                    <td>{{ $numb++ }}</td>
                    <td>{{ $detail->nama_barang }}</td>
                    <td>{{ $detail->jumlah_pembelian }}</td>
                    <td>{{ $detail->harga_beli }}</td>
                    <td>{{ $detail->harga_jual }}</td>
                    <td>{{ $detail->jumlah_harga }}</td>
                    <td>{{ $detail->nama_supplier }}</td>
                  </tr>
                @endforeach
              </table>

              <div class="row">
                <div class="col-md-12">
                  <a href="{{ route('pembelian-activity.index') }}" class="btn btn-danger">Kembali</a>
                </div>
              </div>
              <!-- End Table with stripped rows -->
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection