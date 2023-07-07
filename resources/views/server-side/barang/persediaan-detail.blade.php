@extends('server-side.layouts.main-server')
@section('title', 'Data Persediaan Barang')
@section('main-content')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Barcode Kode Barang</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item">Barang</li>
          <li class="breadcrumb-item active">Persediaan Barang</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 text-center">
                  <h5 class="card-title">BARCODE</h5>
                  <img src="data:image/png;base64,  {!! DNS1D::getBarcodePNG("Harga ".$getdata->harga_jual, 'C39') !!}" alt="Barcode {{ $getdata->kode_barang }}" width="100%" height="120px">
                  <h5>{{ $getdata->kode_barang }} - {{ $getdata->nama_barang }}</h5>
                  <button id="printButton" class="btn btn-primary w-100">Cetak Barcode</button>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <script>
    document.getElementById('printButton').addEventListener('click', function() {
        document.body.style.backgroundColor = 'white';
        document.querySelector('#header').style.visibility = 'hidden';
        document.querySelector('#sidebar').style.display = 'none';
        document.querySelector('.card').setAttribute('class', 'shadow-none');
        document.querySelector('.pagetitle').style.display = 'none';
        document.querySelector('#printButton').style.display = 'none';
        document.querySelector('#footer').style.display = 'none';
        window.print();
        location.reload();
    });
  </script>
@endsection