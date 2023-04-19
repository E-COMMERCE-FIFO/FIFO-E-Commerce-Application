@extends('server-side.layouts.main-server')
@section('title', 'Form Tambah Pembelian')
@section('main-content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Form Tambah Pembelian</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Transaksi</li>
        <li class="breadcrumb-item active">Data Pembelian</li>
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
                      <form class="row g-3" action="{{ route('pembelian-activity.store') }}" method="post" autocomplete="off">
                        @csrf
                          <input type="hidden" value="{{ $pembelianId }}" name="id">
                          <div class="col-12">
                              <label for="inputNanme4" class="form-label"
                                  >*Tanggal Pembelian</label
                              >
                              <input
                                  type="date"
                                  class="form-control"
                                  id="inputNanme4"
                                  name="tgl_pembelian"
                                  value="{{ date('Y-m-d') }}"
                              />
                              @error('tgl_pembelian')
                                <strong class="fw-bold d-block text-danger mt-2">
                                  <small>&nbsp;* {{ $message }}</small>
                                </strong>
                              @enderror
                          </div>
                          <div class="col-12">
                              <label for="inputEmail4" class="form-label"
                                  >*Penanggung Jawab</label
                              >
                              <select name="user_id" id="inputEmail4" class="form-select" readonly>
                                <option value="1" selected>Admin Roket Mini Moto</option>
                              </select>
                              @error('user_id')
                                <strong class="fw-bold d-block text-danger mt-2">
                                  <small>&nbsp;* {{ $message }}</small>
                                </strong>
                              @enderror
                          </div>
                          <div>
                              <button type="submit" class="btn btn-primary">
                                  Submit
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