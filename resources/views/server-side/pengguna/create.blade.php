@extends('server-side.layouts.main-server')
@section('title', 'Form Tambah Admin')
@section('main-content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Form Tambah Admin</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Pengguna</li>
        <li class="breadcrumb-item active">Tambah Admin</li>
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
                      <form class="row g-3" action="{{ route('pengguna-activity.store') }}" method="post" autocomplete="off">
                        @csrf
                          <div class="col-md-12">
                              <label for="namaLengkap" class="form-label"
                                  >*Nama Lengkap</label
                              >
                              <input
                                  type="text"
                                  class="form-control"
                                  id="namaLengkap"
                                  name="nama_lengkap"
                              />
                              @error('nama_lengkap')
                                <strong class="fw-bold d-block text-danger mt-2">
                                  <small>&nbsp;* {{ $message }}</small>
                                </strong>
                              @enderror
                          </div>
                          <div class="col-md-6">
                              <label for="inputEmail" class="form-label"
                                  >*Email</label
                              >
                              <input
                                  type="email"
                                  class="form-control"
                                  id="inputEmail"
                                  name="email"
                              />
                              @error('email')
                                <strong class="fw-bold d-block text-danger mt-2">
                                  <small>&nbsp;* {{ $message }}</small>
                                </strong>
                              @enderror
                          </div>
                          <div class="col-md-6">
                              <label for="inputNope" class="form-label"
                                  >*Nomor Handphone</label
                              >
                              <input
                                  type="text"
                                  class="form-control"
                                  id="inputNope"
                                  name="no_telp"
                              />
                              @error('no_telp')
                                <strong class="fw-bold d-block text-danger mt-2">
                                  <small>&nbsp;* {{ $message }}</small>
                                </strong>
                              @enderror
                          </div>
                          <div class="col-md-6">
                              <label for="inputPass" class="form-label"
                                  >*Password</label
                              >
                              <input
                                  type="password"
                                  class="form-control"
                                  id="inputPass"
                                  name="password"
                              />
                              @error('password')
                                <strong class="fw-bold d-block text-danger mt-2">
                                  <small>&nbsp;* {{ $message }}</small>
                                </strong>
                              @enderror
                          </div>
                          <div class="col-md-6">
                              <label for="inputPassCfm" class="form-label"
                                  >*Konfirmasi Password</label
                              >
                              <input
                                  type="password"
                                  class="form-control"
                                  id="inputPassCfm"
                                  name="password_confirmation"
                              />
                              @error('password_confirmation')
                                <strong class="fw-bold d-block text-danger mt-2">
                                  <small>&nbsp;* {{ $message }}</small>
                                </strong>
                              @enderror
                          </div>
                          <input type="hidden" name="role" value="Administrator">
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