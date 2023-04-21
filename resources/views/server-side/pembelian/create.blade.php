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
                                  required
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
                                value="{{ Auth::user()->nama_lengkap }}"
                                readonly
                            />
                            <input
                                type="hidden"
                                class="form-control"
                                id="pjawab"
                                name="user_id"
                                value="{{ Auth::user()->id }}"
                            />
                            @error('user_id')
                              <strong class="fw-bold d-block text-danger mt-2">
                                <small>&nbsp;* {{ $message }}</small>
                              </strong>
                            @enderror
                          </div>
                          <div id="first-barang"></div>
                          <div class="col-md-6">
                            <label for="id_barang" class="form-label">*Barang</label>
                            <select name="id_barang[]" id="id_barang" class="form-select" required>
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
                                  name="jumlah_pembelian[]"
                                  required
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
                                  name="harga_beli[]"
                                  required
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
                                  name="harga_jual[]"
                                  required
                              />
                              @error('harga_jual')
                                <strong class="fw-bold d-block text-danger mt-2">
                                  <small>&nbsp;* {{ $message }}</small>
                                </strong>
                              @enderror
                          </div>
                          <div class="col-md-12">
                            <label for="id_supplier" class="form-label">*Supplier</label>
                            <select name="id_supplier[]" id="id_supplier" class="form-select" required>
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
                          <div id="box-add-form"></div>
                          <div class="col-md-10 mt-4">
                              <button type="submit" class="btn btn-success w-100">
                                  Simpan Data Pembelian
                              </button>
                          </div>
                          <div class="col-md-2 mt-4">
                              <button id="add-barang" type="button" class="btn btn-primary w-100">
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
<script>
  let formNumber = 2;
  const addBarangButton = document.getElementById('add-barang');
  const formWrapper = document.getElementById('box-add-form');
  const firstInput = document.getElementById('first-barang');
  const addFirstInput = document.createElement('div');
  const newBoxForm = document.createElement('div');
  addFirstInput.innerHTML = `<h5 class="card-title">Barang 1</h5>`;
  newBoxForm.classList.add('row');

  addBarangButton.addEventListener('click', (event) => {
    firstInput.appendChild(addFirstInput);
    newBoxForm.innerHTML += `
      <div class='col-md-12 mt-3'>
        <h5 class="card-title">Barang ${formNumber++}</h5>
      </div>
      <div class="col-md-6 mb-3">
        <label for="id_barang" class="form-label">*Barang</label>
        <select name="id_barang[]" id="id_barang" class="form-select" required>
          <option value="" id="barangtest">~ pilih barang ~</option>
          @forelse ($barang as $itemB)
            <option value="{{ $itemB['id'] }}">{{ $itemB['nama_barang'] }}</option>
          @empty
            <option value="">~ belum ada data barang ~</option>
          @endforelse
        </select>
        @error('id_barang')
          <strong class="fw-bold d-block text-danger mt-2">
            <small>&nbsp;* {{ $message }}</small>
          </strong>
        @enderror
      </div>
      <div class="col-md-6 mb-3">
          <label for="jlmBeli" class="form-label">*Jumlah Pembelian</label>
          <input
              type="number"
              class="form-control"
              id="jlmBeli"
              name="jumlah_pembelian[]"
              required
          />
          @error('jumlah_pembelian')
            <strong class="fw-bold d-block text-danger mt-2">
              <small>&nbsp;* {{ $message }}</small>
            </strong>
          @enderror
      </div>
      <div class="col-md-6 mb-3">
          <label for="hargaBeli" class="form-label">*Harga Beli</label>
          <input
              type="number"
              class="form-control"
              id="hargaBeli"
              name="harga_beli[]"
              required
          />
          @error('harga_beli')
            <strong class="fw-bold d-block text-danger mt-2">
              <small>&nbsp;* {{ $message }}</small>
            </strong>
          @enderror
      </div>
      <div class="col-md-6 mb-3">
          <label for="hargaJual" class="form-label">*Harga Jual</label>
          <input
              type="number"
              class="form-control"
              id="hargaJual"
              name="harga_jual[]"
              required
          />
          @error('harga_jual')
            <strong class="fw-bold d-block text-danger mt-2">
              <small>&nbsp;* {{ $message }}</small>
            </strong>
          @enderror
      </div>
      <div class="col-md-12 mb-3">
        <label for="id_supplier" class="form-label">*Supplier</label>
        <select name="id_supplier[]" id="id_supplier" class="form-select" required>
          <option value="" id="suppliertest">~ pilih supplier ~</option>
          @forelse ($supplier as $itemS)
            <option value="{{ $itemS['id'] }}">{{ $itemS['nama_supplier'] }}</option>
          @empty
            <option value="">~ belum ada data supplier ~</option>
          @endforelse
        </select>
        @error('id_supplier')
          <strong class="fw-bold d-block text-danger mt-2">
            <small>&nbsp;* {{ $message }}</small>
          </strong>
        @enderror
      </div>
    `;
    formWrapper.appendChild(newBoxForm);
  });
</script>
@endsection