@extends('server-side.layouts.main-server')
@section('title', 'Form Tambah Barang')
@section('main-content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Form Tambah Barang</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Barang</li>
        <li class="breadcrumb-item active">Tambah Barang</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->
  <section class="section">
      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Lengkapi data di bawah ini!</h5>

                      <!-- Vertical Form -->
                      <form class="row g-3" action="{{ route('barang-activity.store') }}" method="post" autocomplete="off">
                        @csrf
                          <div class="col-12">
                              <label for="inputNanme4" class="form-label"
                                  >*Nama barang</label
                              >
                              <input
                                  type="text"
                                  class="form-control"
                                  id="inputNanme4"
                                  name="nama_barang"
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
                              />
                              @error('stok')
                                <strong class="fw-bold d-block text-danger mt-2">
                                  <small>&nbsp;* {{ $message }}</small>
                                </strong>
                              @enderror
                          </div>
                          <div>
                              <button type="submit" class="btn btn-primary">
                                  Submit
                              </button>
                              <button type="reset" class="btn btn-secondary">
                                  Reset
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