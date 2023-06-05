@extends('server-side.layouts.main-server')
@section('title', 'Form Tambah Supplier')
@section('main-content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Form Tambah Supplier</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Supplier</li>
        <li class="breadcrumb-item active">Tambah Supplier</li>
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
                      <form class="row g-3" action="/add" method="post" autocomplete="off">
                        @csrf
                          <div class="col-12">
                              <label for="inputNanme4" class="form-label"
                                  >*Nama Supplier</label
                              >
                              <input
                                  type="text"
                                  class="form-control"
                                  id="inputNanme4"
                                  name="nama_supplier"
                              />
                              @error('nama_supplier')
                                <strong class="fw-bold d-block text-danger mt-2">
                                  <small>&nbsp;* {{ $message }}</small>
                                </strong>
                              @enderror
                          </div>
                          <div class="col-12">
                            <label for="inputNanme4" class="form-label"
                                >*Alamat</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="inputNanme4"
                                name="alamat"
                            />
                            @error('alamat')
                              <strong class="fw-bold d-block text-danger mt-2">
                                <small>&nbsp;* {{ $message }}</small>
                              </strong>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label"
                                >*No Telepon</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="inputNanme4"
                                name="no_telp"
                            />
                            @error('no_telp')
                              <strong class="fw-bold d-block text-danger mt-2">
                                <small>&nbsp;* {{ $message }}</small>
                              </strong>
                            @enderror
                        </div>
                          <div>
                              <button type="submit"  name="submit" class="btn btn-primary">
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

{{-- <form action="/add" method="POST">
    @csrf
    <input type="text" name = "nama_supplier" placeholder="Nama" autocomplete="off" required><br>
    <input type="text" name = "alamat" placeholder="Alamat" autocomplete="off" required><br>
    <input type="text" name = "no_telp" placeholder="No Telepon" autocomplete="off" required>
    <input type="submit" name="submit" value="Save">
</form> --}}