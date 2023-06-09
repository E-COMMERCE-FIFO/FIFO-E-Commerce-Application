@extends('server-side.layouts.main-server')
@section('title', 'Laporan Barang Masuk')
@section('main-content')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Laporan Barang Masuk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item">Cetak Laporan</li>
          <li class="breadcrumb-item active">Barang Masuk</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">

        <div class="col-md-12">
          <div class="card">
            <div class="card-body p-4">
              <form action="{{ route('laporan.barang-masuk') }}" method="GET">
                <div class="row">
                  <div class="col-md-4">
                    <label for="tanggal_awal" class="mb-2"><strong>*Tanggal awal</strong></label>
                  </div>
                  <div class="col-md-4">
                    <label for="tanggal_akhir" class="mb-2"><strong>*Tanggal akhir</strong></label>
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                    <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal">
                  </div>
                  <div class="col-md-4">
                    <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir">
                  </div>
                  <div class="col-md-4">
                    <button class="btn btn-primary" type="submit">Filter</button>
                    <button class="btn btn-success" type="button" onclick="ExportToExcel('xlsx')">Export Excel</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="card-title">Data Laporan Barang Masuk</h5>
                </div>
              </div>
              <!-- Table with stripped rows -->
              <table class="table datatable" id="tbl_exporttable_to_xls">
                <thead>
                  <tr>
                    <th scope="col">#No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Penanggung Jawab</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Supplier</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getDataLaporan as $datas)
                    <tr>
                      <td>{{ $numb++ }}</td>
                      <td>{{ $datas->tgl_pembelian }}</td>
                      <td>{{ $datas->nama_lengkap }}</td>
                      <td>{{ $datas->nama_barang }}</td>
                      <td>{{ $datas->jumlah_pembelian }}</td>
                      <td>{{ $datas->harga_beli }}</td>
                      <td>{{ $datas->harga_jual }}</td>
                      <td>{{ $datas->jumlah_harga }}</td>
                      <td>{{ $datas->nama_supplier }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

<script src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script>
  function ExportToExcel(type, fn, dl) {
      var elt = document.getElementById('tbl_exporttable_to_xls');
      var wb = XLSX.utils.table_to_book(elt, {
        sheet: "sheet1",
        dateNF: 'dd-mm-yyyy'
      });
      return dl ?
      XLSX.write(wb, {
        bookType: type,
        bookSST: true,
        type: 'base64'
      }) :
      XLSX.writeFile(wb, fn || ('Data Laporan Barang Masuk.' + (type || 'xlsx')));
  }
</script>
@endsection