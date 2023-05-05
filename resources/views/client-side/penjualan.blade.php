@extends('client-side.layouts.main-client')
@section('title', 'Transaksi')
@section('main-content')

<div class="container">
    <form class="mt-5 mb-3" action="/penjualan/store" method="post" autocomplete="off">
        @csrf
        <div class="card col-md-12 mx-auto mb-5 shadow p-3 bg-white-rounded">
            <div class="row">
                <div class=" col-md-6">
                    <img src="{{ $barang->foto_barang }}" alt="" width="100%" >
                </div>
                <div class="col-md-6">
                    <h3 class="text-center"> {{ $barang->nama_barang }} </h3>
                    <label for="pembeli" class="form-label">*Nama</label>
                    <input type="text" class="form-control mb-3" value="{{ Auth::user()->nama_lengkap }}" readonly/>
                    <input type="hidden" class="form-control" id="pembeli" name="user_id" value="{{ Auth::user()->id }}"/>
                    <input type="hidden" class="form-control mb-3" name="tanggal_penjualan" value="{{ date('Y-m-d') }}" />
                    <input type="hidden" class="form-control mb-3" name="id_barang" value="{{ $barang->id }}"/>
                    <label for="pembeli" class="form-label">*Stok Tersisa : {{ $barang->stok }}</label>
                    <div class="input-group mb-3">
                        <button class="btn btn-outline-secondary" type="button" id="btn-minus">-</button>
                        <input type="number" class="form-control" name="qty" value="1" min="1" max="{{ $barang->stok }}" readonly>
                        <button class="btn btn-outline-secondary" type="button" id="btn-plus">+</button>
                    </div>
                    <label for="pembeli" class="form-label">*Total Bayar</label>
                    <input type="number" class="form-control mb-3" name="jumlah_bayar" value="" required/>
                    <div class="col-md-6">
                    <input type="submit" name="submit" value="Beli Sekarang" class="btn btn-primary">
                    </div>     
            </div>
        </div>  
  </form>
</div>


<script>
    document.getElementById("btn-plus").addEventListener("click", () => {
        let inputQty = document.getElementsByName("qty")[0];
        if (parseInt(inputQty.value) < parseInt(inputQty.max)) {
            inputQty.value = parseInt(inputQty.value) + 1;
        }
    });

    document.getElementById("btn-minus").addEventListener("click", () => {
        let inputQty = document.getElementsByName("qty")[0];
        if (inputQty.value > inputQty.min) {
            inputQty.value = parseInt(inputQty.value) - 1;
        }
    });
</script>
@endsection