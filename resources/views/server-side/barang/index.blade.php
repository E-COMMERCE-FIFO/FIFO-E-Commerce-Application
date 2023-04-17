@extends('server-side.layouts.main-server')
@section('title', 'Data Barang')
@section('main-content')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Barang</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item">Barang</li>
          <li class="breadcrumb-item active">Data Barang</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Barang</h5>
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
                    <th scope="col">Stok</th>
                    <th scope="col">Pengaturan</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($barang as $item)
                    <tr>
                      <th scope="row">{{ $numb++ }}</th>
                      <td>{{ $item->nama_barang }}</td>
                      <td>{{ $item->stok }}</td>
                      <td>
                        <form action="{{ route('barang-activity.destroy', $item->id) }}">
                          @csrf
                          @method('delete')
                          <a href="{{ route('barang-activity.edit', $item->id) }}" class="badge bg-warning text-white">edit</a>
                          <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus barang ini?')">hapus</button>
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