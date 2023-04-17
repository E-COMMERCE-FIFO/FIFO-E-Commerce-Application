@extends('server-side.layouts.main-server')
@section('title', 'Form Tambah Barang')
@section('main-content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Form Edit Barang</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Barang</li>
        <li class="breadcrumb-item active">Data Barang</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Pastikan isi data dengan benar!</h5>
            <!-- Vertical Form -->
            <form class="row g-3" action="{{ route('barang-activity.update', $barang->id) }}" method="post" autocomplete="off">
              @csrf
              @method('PUT')
              <div class="col-12">
                <label for="inputNanme4" class="form-label"
                    >*Nama barang</label
                >
                <input
                    type="text"
                    class="form-control"
                    id="inputNanme4"
                    name="nama_barang"
                    value="{{ old('nama_barang', $barang->nama_barang) }}"
                />
                @error('nama_barang')
                  <strong class="fw-bold d-block text-danger mt-2">
                    <small>&nbsp;* {{ $message }}</small>
                  </strong>
                @enderror
              </div>
              <div class="col-12">
                <label for="inputEmail4" class="form-label"
                    >*Stok</label
                >
                <input
                    type="number"
                    class="form-control"
                    id="inputEmail4"
                    name="stok"
                    value="{{ old('stok', $barang->stok) }}"
                />
                @error('stok')
                  <strong class="fw-bold d-block text-danger mt-2">
                    <small>&nbsp;* {{ $message }}</small>
                  </strong>
                @enderror
              </div>
              <div>
                <button type="submit" class="btn btn-primary">
                  Simpan Perubahan
                </button>
              </div>
            </form>
              <!-- Vertical Form -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- End #main -->
@endsection