@extends('server-side.layouts.main-server')
@section('title', 'Form Detail Pembelian')
@section('main-content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Form Detail Pembelian</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Transaksi</li>
        <li class="breadcrumb-item active">Input Detail Pembelian</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->
  <section class="section">
      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-body" id="card-form-detail">
                      <div class="row mb-3">
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                          <h5 class="card-title">Lengkapi data di bawah ini!</h5>
                          <button id="addNewForm" class="btn btn-primary btn-sm">Tambah Transaksi</button>
                        </div>
                      </div>
                      <!-- Vertical Form -->
                      <form action="{{ url('kirim') }}" method="post" id="formDetailTrx" class="row g-3" autocomplete="off">
                        @csrf
                          <input type="hidden" value="{{ $data['id'] }}" name="id_pembelian">
                          <div class="col-md-6">
                            <label for="penaggung" class="form-label"
                                >*Penanggung Jawab</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="penaggung"
                                value="{{ $pjawab->nama_lengkap }}"
                                readonly
                            />
                          </div>
                          <div class="col-md-6">
                              <label for="id_barang" class="form-label"
                                  >*Barang</label
                              >
                              <select name="id_barang" id="id_barang" class="form-select" autofocus>
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
                          </div>
                          <div class="col-md-6">
                            <label for="hargaBeli" class="form-label"
                                >*Harga Beli</label
                            >
                            <input
                                type="number"
                                class="form-control"
                                id="hargaBeli"
                                name="harga_beli"
                            />
                          </div>
                          <div class="col-md-6">
                            <label for="hargaJual" class="form-label"
                                >*Harga Jual</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="hargaJual"
                                name="harga_jual"
                            />
                          </div>
                          <div class="col-md-12">
                              <label for="supplier" class="form-label"
                                  >*Supplier</label
                              >
                              <select name="id_supplier" id="supplier" class="form-select">
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
                          </div>
                          <div>
                            <button type="submit" class="btn btn-primary" id="btn-submit-detail">
                                Submit
                            </button>
                          </div>
                      </form>
                      <!-- Vertical Form -->
                  </div>
                  <button id="sendDetailTransaksi" class="btn btn-success btn-block">Simpan Pembelian</button>
              </div>
          </div>
      </div>
  </section>
</main>
<!-- End #main -->

<script>
  const cardForm = document.getElementById('card-form-detail');
  const buttonAddForm = document.getElementById('addNewForm');
  const btnSubmitDetail = document.getElementById('btn-submit-detail');
  const btnSubmitTrx = document.getElementById('sendDetailTransaksi');
  const newContainerForm = document.createElement('div');
  newContainerForm.classList.add('mt-5');

  buttonAddForm.addEventListener('click', () => {
    btnSubmitDetail.remove();
    newContainerForm.innerHTML += /* html */ `
      <form id="formDetailTrx" class="row g-3 mb-5" action="{{ url('kirim') }}" method="post" autocomplete="off">
        @csrf
          <input type="hidden" value="{{ $data['id'] }}" name="id_pembelian">
          <div class="col-md-6">
              <label for="id_barang" class="form-label"
                  >*Barang</label
              >
              <select name="id_barang" id="id_barang" class="form-select" autofocus>
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
          </div>
          <div class="col-md-6">
            <label for="hargaBeli" class="form-label"
                >*Harga Beli</label
            >
            <input
                type="number"
                class="form-control"
                id="hargaBeli"
                name="harga_beli"
            />
          </div>
          <div class="col-md-6">
            <label for="hargaJual" class="form-label"
                >*Harga Jual</label
            >
            <input
                type="text"
                class="form-control"
                id="hargaJual"
                name="harga_jual"
            />
          </div>
          <div class="col-md-6">
              <label for="supplier" class="form-label"
                  >*Supplier</label
              >
              <select name="id_supplier" id="supplier" class="form-select">
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
          </div>
      </form>
    `;
    cardForm.appendChild(newContainerForm);
  })

  btnSubmitTrx.addEventListener('click', () => {
    const getFormTrx = document.querySelectorAll('#formDetailTrx');
    for (const item of getFormTrx) {
      item.submit();
    }
  })
</script>
@endsection