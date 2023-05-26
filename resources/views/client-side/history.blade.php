@extends('client-side.layouts.main-client')
@section('title', 'Beranda')
@section('main-content')

<div class="container">
    <h4 class="text-center mb-4 mt-4">Riwayat Pembelian {{ Auth::user()->nama_lengkap }}</h4>
    <div class="card mb-3 mt-3">
<table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Produk</th>
        <th scope="col">Jumlah Beli</th>
        <th scope="col">Total Bayar</th>
        <th scope="col">Status</th>

      </tr>
    </thead>
    <tbody>
       @foreach ($history as $item)
       <tr>
        <th scope="row">{{ $numb++ }}</th>
        <td>{{ $item->nama_barang }}</td>
        <td>{{ $item->qty }}</td>
        <td>{{ $item->jumlah_bayar }}</td>
        <td>{{ $item->status }}</td>
      </tr>
       @endforeach 
      
    </tbody>
  </table>
</div>
</div>
@endsection