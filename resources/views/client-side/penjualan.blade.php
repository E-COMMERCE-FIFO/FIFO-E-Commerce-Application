@extends('client-side.layouts.main-client')
@section('title', 'Transaksi')
@section('main-content')

<div class="container">
    <form class="mt-5 mb-3" action="/penjualan/store" method="post" autocomplete="off" enctype="multipart/form-data">
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
                    <input type="number" class="form-control mb-3" name="jumlah_bayar" id="jmlBayar" value="{{ $jual->harga_jual }}" readonly/>
                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control mb-3"/>
                    <div class="col-md-6">
                    <input type="submit" value="Beli Sekarang" class="btn btn-primary">
                    </div>     
                </div>
            </div>
        </div>  
    </form>
</div>

<script>
    const btnPlus = document.querySelector("#btn-plus");
    const btnMinus = document.querySelector("#btn-minus");
    const inputQty = document.querySelector("input[name=qty]");
    const inputJmlBayar = document.querySelector('#jmlBayar');

    btnPlus.addEventListener('click', () => {
        const qty = parseInt(inputQty.value);
        const stok = parseInt('{{ $barang->stok }}');

        if (qty < stok) {
            inputQty.value = qty + 1;
            inputJmlBayar.value = (qty + 1) * parseInt('{{ $jual->harga_jual }}');
        }
    });

    btnMinus.addEventListener('click', () => {
        const qty = parseInt(inputQty.value);
        const stok = parseInt('{{ $barang->stok }}');

        if (qty > 1) {
            inputQty.value = qty - 1;
            inputJmlBayar.value = (qty - 1) * parseInt('{{ $jual->harga_jual }}');
        }
    });
</script>

@endsection