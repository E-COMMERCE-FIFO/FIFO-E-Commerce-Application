@extends('client-side.layouts.main-client')
@section('title', 'Beranda')
@section('main-content')

<div class="container">
    <h4 class="text-center mb-4 mt-4">Riwayat Pembelian {{ Auth::user()->nama_lengkap }}</h4>
    <div class="card mb-3 mt-3">
<table class="table text-center">
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
       @foreach ($history->reverse() as $item)
       <tr>
        <th scope="row">{{ $numb++ }}</th>
        <td>{{ $item->nama_barang }}</td>
        <td>{{ $item->qty }}</td>
        <td>{{ $item->jumlah_bayar }}</td>
        @if($item->status == 'Sukses' )
        <td>
          <p class="badge bg-success">{{ $item->status }}<p>     
        </td>
        @elseif($item->bukti_pembayaran == '')
        <td class="d-flex  justify-content-center align-content-center gap-2">
          <a href="{{ url('/upload/' . $item->id) }}" class="btn btn-danger ">Upload Bukti</a>
          <form action="/delete/{{ $item->id }}"  method="post">
            @method('delete')
            @csrf
          <input type="submit" value="Hapus" class="btn btn-primary">
        </form>
        </td>
        
        @else
        <td>
          <p class="badge bg-primary">{{ $item->status }}<p>   
          
        </td>

        @endif
      </tr>
       @endforeach 
      
    </tbody>
  </table>
</div>
</div>
@endsection