@extends('server-side.layouts.main-server')
@section('title', 'Data Supplier')
@section('main-content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Supplier</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item">Supplier</li>
          <li class="breadcrumb-item active">Data Supplier</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="col-md-12 d-flex justify-content-between align-items-center">
                <h5 class="card-title">Data Supplier</h5>
                <a href="{{ url('createsupplier') }}">
                  <button class="btn btn-success btn-sm">Tambah Supplier</button>
                </a>
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
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Telp</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $no =1;
                    @endphp
                  @forelse ($supplier as $item)
                    <tr>
                      <th scope="row">{{  $no++ }}</th>
                      <td>{{ $item->nama_supplier }}</td>
                      <td>{{ $item->alamat }}</td>
                      <td>{{ $item->no_telp }}</td>
                     <td>
                        <a href="{{ url ($item->id.'/edit') }}" class="badge bg-warning">Edit</a>
                        <form action="{{ $item ->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Yakin')">Delete</button>
                        </form>
                     </td>
                    </tr>
                  @empty
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-octagon me-1"></i> Belum ada data barang!
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