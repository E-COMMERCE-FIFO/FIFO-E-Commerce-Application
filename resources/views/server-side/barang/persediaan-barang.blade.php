@extends('server-side.layouts.main-server')
@section('title', 'Data Persediaan Barang')
@section('main-content')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Persediaan Barang</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item">Barang</li>
          <li class="breadcrumb-item active">Persediaan Barang</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 d-flex justify-content-between align-items-center">
                  <h5 class="card-title">Daftar List Persediaan Barang</h5>
                </div>
              </div>
              @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <i class="bi bi-check-circle me-1"></i> {{ Session::get('message') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Tanggal Masuk</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($barang1 as $item)
                    <tr>
                      <th scope="row">{{ $numb++ }}</th>
                      <td>{{ $item->kode_barang }}</td>
                      <td>{{ $item->nama_barang }}</td>
                      <td>{{ $item->tgl_pembelian }}</td>
                    </tr>
                  @empty
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-octagon me-1"></i> Belum ada data Persediaan barang!
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endforelse
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection