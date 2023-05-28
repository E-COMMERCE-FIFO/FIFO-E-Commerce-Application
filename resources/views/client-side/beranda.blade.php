@extends('client-side.layouts.main-client')
@section('title', 'Beranda')
@section('main-content')
<section id="hero">
   <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
         <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
         <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-image: url(assets/client-side/img/slide/first-banner-slide.jpg)">
               <div class="carousel-container">
                  <div class="carousel-content">
                     <h2 class="animate__animated animate__fadeInDown">Selamat Datang di Toko <span>Roket Mini Moto</span></h2>
                     <p class="animate__animated animate__fadeInUp">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur officiis, error voluptatum molestiae perspiciatis at nisi minima voluptates, quos dolore perferendis autem sunt aliquam commodi voluptas consequuntur aspernatur, dolorum eaque!</p>
                     <a href="{{ url('/register') }}" class="btn-get-started animate__animated animate__fadeInUp">Daftar</a>
                  </div>
               </div>
            </div>
            <div class="carousel-item" style="background-image: url(assets/client-side/img/slide/second-banner-slide.jpg)">
               <div class="carousel-container">
                  <div class="carousel-content">
                     <h2 class="animate__animated fanimate__adeInDown">Melayani <span>Sepenuh Hati</span></h2>
                     <p class="animate__animated animate__fadeInUp">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur officiis, error voluptatum molestiae perspiciatis at nisi minima voluptates, quos dolore perferendis autem sunt aliquam commodi voluptas consequuntur aspernatur, dolorum eaque!</p>
                     <a href="#services" class="btn-get-started animate__animated animate__fadeInUp">Lihat Produk</a>
                  </div>
               </div>
            </div>
            <div class="carousel-item" style="background-image: url(assets/client-side/img/slide/third-banner-slide.jpg)">
               <div class="carousel-container">
                  <div class="carousel-content">
                     <h2 class="animate__animated animate__fadeInDown">Harga <span>Terjangkau</span>, Kualitas <span>Terjamin</span></h2>
                     <p class="animate__animated animate__fadeInUp">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur officiis, error voluptatum molestiae perspiciatis at nisi minima voluptates, quos dolore perferendis autem sunt aliquam commodi voluptas consequuntur aspernatur, dolorum eaque!</p>
                     <a href="#services" class="btn-get-started animate__animated animate__fadeInUp">Beli Sekarang</a>
                  </div>
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
         </a>
         <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
         </a>
      </div>
   </div>
</section>
<main id="main">
   <section id="services" class="services">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h2 class="text-center">Pilihan Kategori Barang Terbaik untuk Anda</h2>
            </div>
            <div class="col-md-12 text-center">
               @forelse ($kategori as $kategoriitem)
                  <a href="{{ route('kategori-barang-activity', $kategoriitem->kategori) }}" class="badge bg-orange-style text-lowercase my-href-link">{{ $kategoriitem->kategori }}</a>
               @empty
                  <h4>Belum ada kategori yang bisa ditampilkan!</h4>
               @endforelse
            </div>

            @foreach ($barangByKategori as $kategoriName => $splitBarang)
               <div class="col-md-12 d-flex justify-content-between align-content-center mt-5">
                  <h4>Kategori {{ $kategoriName }}</h4>
                  <a href="{{ route('kategori-barang-activity', $kategoriName) }}">
                     <strong>Lihat selengkapnya</strong>
                  </a>
               </div><hr class="mb-3">
               @foreach ($splitBarang->take(3) as $item)
               <div class="col-md-4 mb-3">
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
            @endforeach
         </div>
      </div>
   </section>
</main>
@endsection
