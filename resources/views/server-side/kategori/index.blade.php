@extends('server-side.layouts.main-server')
@section('title', 'Data Kategori')
@section('main-content')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Kategori</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item">Kategori</li>
          <li class="breadcrumb-item active">Data Kategori</li>
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
                  <h5 class="card-title">Data Kategori</h5>
                  <a href="{{ route('kategori-activity.create') }}">
                    <button class="btn btn-success btn-sm">Tambah Kategori</button>
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
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Pengaturan</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- @forelse ($kategori as $item)
                    <tr>
                      <th scope="row">{{ $numb++ }}</th>
                      <td>{{ $item->kategori }}</td>
                      <td>{{ $item->nama_Kategori }}</td>
                      <td>{{ $item->stok }}</td>
                      <td>
                        <form action="{{ route('kategori-activity.destroy', $item->id) }}" method="post">
                          @csrf
                          @method('delete')
                          <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus Kategori ini?')">hapus</button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-octagon me-1"></i> Belum ada data Kategori!
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endforelse --}}
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