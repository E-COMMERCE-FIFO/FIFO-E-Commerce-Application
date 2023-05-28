@extends('client-side.layouts.main-client')
@section('title', 'List Barang')
@section('main-content')
<main id="main">
   <section id="services" class="services">
      <div class="container">
         <div class="row">
            <div class="col-md-12 mt-5">
               <h2 class="text-center">Kategori Barang {{ $getBarangByKategori[0]->kategori }}</h2>
            </div>
            @foreach ($getBarangByKategori as $item)
            <div class="col-md-4 mt-4">
               <div class="card text-center" data-aos="fade-up"  data-aos-anchor-placement="top-bottom">
                  @if($item->stok == 0)
                  <div class="stock-is-null">
                     <div class="description">
                        <h2>Stok Habis</h2>
                     </div>
                     <div class="box-image-barang">
                        <img class="card-img-top bg-danger" src="{{ Storage::url('public/barang/') . $item->foto_barang }}" alt="Card image cap">
                     </div>
                  </div>
                  @else
                  <div class="box-image-barang">
                     <img class="card-img-top" src="{{ Storage::url('public/barang/') . $item->foto_barang }}" alt="Card image cap">
                  </div>
                  @endif
                  <div class="card-body">
                     <h4 class="text-center mb-3">{{ $item->nama_barang }}</h4>
                     @if ($item->stok == 0)
                     <a href="#" class="btn btn-danger w-100 disabled">Beli Sekarang</a>
                     @else
                     @auth
                  
                     <a href="{{ route('edit', $item->id) }}" class="btn btn-primary w-100">Beli Sekarang</a>
                     @else
                     <a href="{{ route('login') }}" class="btn btn-primary w-100">Beli Sekarang</a>
                     @endauth
                     @endif
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </section>
</main>
@endsection
