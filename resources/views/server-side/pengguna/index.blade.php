@extends('server-side.layouts.main-server')
@section('title', 'Data Pengguna')
@section('main-content')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Pengguna</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item">Pengguna</li>
          <li class="breadcrumb-item active">Data Pengguna</li>
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
                  <h5 class="card-title">Data Pengguna</h5>
                  <a href="{{ route('pengguna-activity.create') }}">
                    <button class="btn btn-success btn-sm">Tambah Pengguna</button>
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
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nomor HP</th>
                    <th scope="col">Role</th>
                    <th scope="col">Pengaturan</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($pengguna as $item)
                    <tr>
                      <th scope="row">{{ $numb++ }}</th>
                      <td>{{ $item->nama_lengkap }}</td>
                      <td>{{ $item->email }}</td>
                      <td>{{ $item->no_telp }}</td>
                      <td>{{ $item->role }}</td>
                      <td>
                        <form action="{{ route('pengguna-activity.destroy', $item->id) }}" method="post">
                          @csrf
                          @method('delete')
                          <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">hapus</button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-octagon me-1"></i> Belum ada data Pengguna!
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