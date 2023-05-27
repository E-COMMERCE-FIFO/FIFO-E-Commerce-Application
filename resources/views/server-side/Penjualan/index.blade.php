@extends('server-side.layouts.main-server')
@section('title', 'Data Barang')
@section('main-content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Penjualan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item">Penjualan</li>
          <li class="breadcrumb-item active">Data Penjualan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Penjualan</h5>
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
                    <th scope="col">Tanggal</th>
                    <th scope="col">Pembeli</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($penjualan->reverse() as $item)
                    <tr>
                      <th scope="row">{{  $number++ }}</th>
                        <td>{{ $item->tanggal_penjualan }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>
                          <a href="{{ url ($item->id.'/detail') }}" class="badge bg-info text-white">Detail</a>
                        </td>
                    </tr>
                  @empty
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-octagon me-1"></i> Belum ada data Penjualan!
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