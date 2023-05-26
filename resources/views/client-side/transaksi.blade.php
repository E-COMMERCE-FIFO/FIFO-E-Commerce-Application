@extends('client-side.layouts.main-client')
@section('title', 'Transaksi')
@section('main-content')

<div class="container">
    <form action="/penjualan/store"  method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
<div class="card w-50 m-5 mx-auto">
    <div class="card-body">
    <h5 class="card-title text-center">Detail Transaksi</h5>
   
    <p class="card-subtitle mb-2 text-muted">*Jumlah produk</p>
    <input type="text" class="form-control mb-3" name="qty" value="{{ $qty }}" readonly/>
    <p class="card-subtitle mb-2 text-muted">*Total Bayar</p>
    <input type="text" class="form-control mb-3" name="jumlah_bayar" value="{{ $jumlah_bayar }}" readonly/>
    <h6 class="card-subtitle mb-2 text-muted">Rekening : 031092012912</h6>
    <h6 class="card-subtitle mb-2 text-muted">A/N : PT. Sinar Jaya</h6>
    <p class="card-text m-0">*Silahkan transfer sesuai dengan nominal yang tertera. Setelah melakukan pembayaran, silahkan upload bukti pembayaran.</p>
    <p class="card-text"></p>
    <input type="hidden" class="form-control mb-3" name="user_id" value="{{ $user_id }}" readonly/>
    <input type="hidden" class="form-control mb-3" name="id_barang" value="{{ $id_barang }}" readonly/>
    <input type="hidden" class="form-control mb-3" name="tanggal_penjualan" value="{{ $tanggal_penjualan }}" readonly/>
    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control mb-3"/>
    <input type="submit" value="Beli Sekarang" class="btn btn-primary">
    </div>
    </div>
</form>
</div>

@endsection