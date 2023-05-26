@extends('server-side.layouts.main-server')
@section('title', 'Form Tambah Kategori')
@section('main-content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Form Tambah Kategori</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Kategori</li>
        <li class="breadcrumb-item active">Tambah Kategori</li>
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
                      <form class="row g-3" action="{{ route('kategori-activity.store') }}" enctype="multipart/form-data" method="post" autocomplete="off">
                        @csrf
                          <div class="col-12">
                              <label for="inputKtg" class="form-label"
                                  >*Nama Kategori</label
                              >
                              <input
                                  type="text"
                                  class="form-control"
                                  id="inputKtg"
                                  name="kategori"
                              />
                              @error('kategori')
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