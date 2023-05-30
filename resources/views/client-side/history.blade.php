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
        <th scope="col">Keterangan</th>
        <th scope="col">Status</th>   
        <th scope="col">Aksi</th> 
      </tr>
    </thead>
    <tbody>
       @foreach ($history->reverse() as $item)
       <tr>
        <th scope="row">{{ $numb++ }}</th>
        <td>{{ $item->nama_barang }}</td>
        <td>{{ $item->qty }}</td>
        <td>{{ $item->jumlah_bayar }}</td>

        @if ($item->status == 'Gagal' )
        <td>{{ $item->keterangan }}</td>
        @else
        <td>-</td>
        @endif

        @if($item->status == 'Sukses' )
        <td>
          <p class="badge bg-success">{{ $item->status }}<p>     
        </td>
        @elseif($item->status == 'Gagal')
        <td>
          <p class="badge bg-danger">{{ $item->status }}<p>
        </td>
        @elseif($item->bukti_pembayaran == '')
       <td>
        <p class="badge bg-secondary">{{ $item->status }}</p></td>
        @else
        <td>
          <p class="badge bg-primary">{{ $item->status }}<p>         
        </td>
        @endif
        <td> 
          <div class="d-flex gap-3">
          @if($item->keterangan == 'Bukti transfer tidak valid!' || $item->status == 'Menunggu Pembayaran') 
          <a href="{{ url('/upload/' . $item->id) }}" class="btn btn-info "><i class="bi bi-upload"></i></a>
          <form action="/delete/{{ $item->id }}"  method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
          </form>
        </div>
          @else
          <form action="/delete/{{ $item->id }}"  method="post">
          @method('delete')
          @csrf
          <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
          </form>
      </td>
        @endif
      </tr>
       @endforeach     
    </tbody>
  </table>
</div>
</div>
@endsection