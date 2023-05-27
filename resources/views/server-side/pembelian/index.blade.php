@extends('server-side.layouts.main-server')
@section('title', 'Data Pembelian')
@section('main-content')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Pembelian</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item">Transaksi</li>
          <li class="breadcrumb-item active">Data Pembelian</li>
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
                  <h5 class="card-title">Data Pembelian</h5>
                  <a href="{{ route('pembelian-activity.create') }}">
                    <button class="btn btn-success btn-sm">Tambah Pembelian</button>
                  </a>
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
                    <th scope="col">Tanggal Pembelian</th>
                    <th scope="col">Penanggung Jawab</th>
                    <th scope="col">Pengaturan</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($pembelian->reverse() as $item)
                    <tr>
                      <th scope="row">{{ $numb++ }}</th>
                      <td>{{ $item->tgl_pembelian }}</td>
                      <td>{{ $item->nama_lengkap }}</td>
                      <td>
                        <a href="{{ route('pembelian-activity.show', $item->id) }}" class="badge bg-info text-white">lihat detail</a>
                      </td>
                    </tr>
                  @empty
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-octagon me-1"></i> Belum ada data pembelian!
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