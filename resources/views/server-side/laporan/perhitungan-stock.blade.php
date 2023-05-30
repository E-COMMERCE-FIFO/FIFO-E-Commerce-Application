@extends('server-side.layouts.main-server')
@section('title', 'Laporan Perhitungan Stok')
@section('main-content')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Laporan Perhitungan Stok</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item">Cetak Laporan</li>
          <li class="breadcrumb-item active">Perhitungan Stok</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">

        <div class="col-md-12">
          <div class="card">
            <div class="card-body p-4">
              <form action="{{ route('laporan.perhitungan-stock') }}" method="GET">
                <div class="row">
                  <div class="col-md-12">
                    <label for="item" class="mb-2"><strong>*Pilih Item (Barang)</strong></label>
                  </div>
                  <div class="col-md-9">
                    <select name="item" id="item" class="form-select">
                      <option value="">- pilih -</option>
                      @foreach ($dataBarang as $itemBarang)
                        <option value="{{ $itemBarang->id }}">{{ $itemBarang->nama_barang }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3">
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
                  <h5 class="card-title">Data Laporan Perhitungan Stok</h5>
                </div>
              </div>
              <!-- Table with stripped rows -->
              <table class="table datatable" id="tbl_exporttable_to_xls">
                <thead>
                  <tr>
                    <th scope="col">#No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Stok Sebelum</th>
                    <th scope="col">Jumlah Penambahan</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Harga Jual</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getDataLaporan as $datas)
                    <tr>
                      <td>{{ $numb++ }}</td>
                      <td>{{ $datas->tgl_pembelian }}</td>
                      <td>{{ $datas->nama_barang }}</td>
                      <td>{{ $datas->sisa_stok }}</td>
                      <td>{{ $datas->jumlah_pembelian }}</td>
                      <td>{{ $datas->harga_beli }}</td>
                      <td>{{ $datas->harga_jual }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>

        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Catatan Perhitungan Stok</h5>
              <ul>
                @if ($getDataHitung)
                  <li>
                    <h5>Nama Barang : <strong>{{ $getDataHitung->nama_barang }}</strong></h5>
                  </li>
                  <li>
                    <h5>Total Barang Masuk : <strong>{{ $getDataPenambahanStok }}</strong></h5>
                  </li>
                  <li>
                    <h5>Total Barang Keluar : <strong>{{ $getDataPenjualan }}</strong></h5>
                  </li>
                  <li>
                    <h5>Persediaan Akhir : <strong>
                      {{
                        ($getDataHitung->harga_beli * $getDataPenambahanStok) +
                        ($getDataHitung->harga_beli * $getDataSisaStok) -
                        ($getDataPenjualan * $getDataHitung->harga_jual)
                      }}
                    </strong></h5>
                  </li>
                  <li>
                    <h5>Biaya Persediaan : <strong>
                      {{
                        ($getDataHitung->harga_beli * $getDataPenambahanStok) +
                        ($getDataHitung->harga_beli * $getDataSisaStok) -
                        (
                          ($getDataHitung->harga_beli * $getDataPenambahanStok) +
                          ($getDataHitung->harga_beli * $getDataSisaStok) -
                          ($getDataPenjualan * $getDataHitung->harga_jual)
                        )
                      }}
                    </strong></h5>
                  </li>
                @else
                  <li>Tidak ada perhitungan!</li>
                @endif
              </ul>
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
      XLSX.writeFile(wb, fn || ('Data Laporan Perhitungan Stok.' + (type || 'xlsx')));
  }
</script>
@endsection