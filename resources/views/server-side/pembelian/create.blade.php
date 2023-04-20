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
                      <h5 class="card-title">Lengkapi data transaksi pembelian di bawah ini!</h5>
                      <!-- Vertical Form -->
                      <form class="row g-3" action="{{ route('pembelian-activity.store') }}" method="post" autocomplete="off">
                        @csrf
                          <input type="hidden" name="id_pembelian" value="{{ $pembelianId }}">
                          <div class="col-md-6">
                              <label for="tglBeli" class="form-label">*Tanggal Pembelian</label>
                              <input
                                  type="date"
                                  class="form-control"
                                  id="tglBeli"
                                  name="tgl_pembelian"
                                  value="{{ date('Y-m-d') }}"
                                  autofocus
                              />
                              @error('tgl_pembelian')
                                <strong class="fw-bold d-block text-danger mt-2">
                                  <small>&nbsp;* {{ $message }}</small>
                                </strong>
                              @enderror
                          </div>
                          <div class="col-md-6">
                            <label for="pjawab" class="form-label">*Penanggung Jawab</label>
                            <input
                                type="text"
                                class="form-control bg-dark bg-opacity-10"
                                id="pjawab"
                                value="Admin Roket Mini Moto"
                                readonly
                            />
                            <input
                                type="hidden"
                                class="form-control"
                                id="pjawab"
                                name="user_id"
                                value="1"
                            />
                            @error('user_id')
                              <strong class="fw-bold d-block text-danger mt-2">
                                <small>&nbsp;* {{ $message }}</small>
                              </strong>
                            @enderror
                          </div>
                          <div class="col-md-6">
                            <label for="id_barang" class="form-label">*Barang</label>
                            <select name="id_barang" id="id_barang" class="form-select">
                              <option value="" id="barangtest">~ pilih barang ~</option>
                              @forelse ($barang as $itemB)
                                <option value="{{ $itemB['id'] }}">{{ $itemB['nama_barang'] }}</option>
                              @empty
                              <option value="">~ belum ada data barang ~</option>
                                <script>
                                  document.getElementById('barangtest').remove();
                                </script>
                              @endforelse
                            </select>
                            @error('id_barang')
                              <strong class="fw-bold d-block text-danger mt-2">
                                <small>&nbsp;* {{ $message }}</small>
                              </strong>
                            @enderror
                          </div>
                          <div class="col-md-6">
                              <label for="jlmBeli" class="form-label">*Jumlah Pembelian</label>
                              <input
                                  type="number"
                                  class="form-control"
                                  id="jlmBeli"
                                  name="jumlah_pembelian"
                              />
                              @error('jumlah_pembelian')
                                <strong class="fw-bold d-block text-danger mt-2">
                                  <small>&nbsp;* {{ $message }}</small>
                                </strong>
                              @enderror
                          </div>
                          <div class="col-md-6">
                              <label for="hargaBeli" class="form-label">*Harga Beli</label>
                              <input
                                  type="number"
                                  class="form-control"
                                  id="hargaBeli"
                                  name="harga_beli"
                              />
                              @error('harga_beli')
                                <strong class="fw-bold d-block text-danger mt-2">
                                  <small>&nbsp;* {{ $message }}</small>
                                </strong>
                              @enderror
                          </div>
                          <div class="col-md-6">
                              <label for="hargaJual" class="form-label">*Harga Jual</label>
                              <input
                                  type="number"
                                  class="form-control"
                                  id="hargaJual"
                                  name="harga_jual"
                              />
                              @error('harga_jual')
                                <strong class="fw-bold d-block text-danger mt-2">
                                  <small>&nbsp;* {{ $message }}</small>
                                </strong>
                              @enderror
                          </div>
                          <div class="col-md-12">
                            <label for="id_supplier" class="form-label">*Supplier</label>
                            <select name="id_supplier" id="id_supplier" class="form-select">
                              <option value="" id="suppliertest">~ pilih supplier ~</option>
                              @forelse ($supplier as $itemS)
                                <option value="{{ $itemS['id'] }}">{{ $itemS['nama_supplier'] }}</option>
                              @empty
                              <option value="">~ belum ada data supplier ~</option>
                                <script>
                                  document.getElementById('suppliertest').remove();
                                </script>
                              @endforelse
                            </select>
                            @error('id_supplier')
                              <strong class="fw-bold d-block text-danger mt-2">
                                <small>&nbsp;* {{ $message }}</small>
                              </strong>
                            @enderror
                          </div>
                          <div class="col-md-10 mt-4">
                              <button type="submit" class="btn btn-success w-100">
                                  Simpan Data Pembelian
                              </button>
                          </div>
                          <div class="col-md-2 mt-4">
                              <button id="addBarang" type="button" class="btn btn-primary w-100">
                                  Tambah Barang
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