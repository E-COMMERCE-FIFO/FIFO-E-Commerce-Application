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
            @foreach ( $barang as $item)
            <div class="col-md-4 mb-3">
            <div class="card"  data-aos="fade-up"  data-aos-anchor-placement="top-bottom">
               <img class="card-img-top" src="{{ $item->foto_barang }}" alt="Card image cap">
               <div class="card-body">
                  <h6 class="text-center">{{ $item->nama_barang }}</h6>
                  <p>Rp. 10.000.000</p>
                  <a href="{{ route('edit', $item->id) }}" class="btn btn-primary">Beli Sekarang</a>
               </div>
             </div>
            </div>
            @endforeach
         </div>
      </div>

      <span class="qty-up">1</span>
   </section>
</main>
@endsection

{{-- <div class="row">
   @foreach ($barang as $item)    
   <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
      <div  class="icon-box shadow-sm">
         <img src="{{ $item->foto_barang }}" alt="" width="300px">
         <h6 class="text-center">{{ $item->nama_barang }}</h6>
         <form action="" method="POST">
         <a href="{{ route('edit', $item->id) }}" class="btn btn-primary">beli</a>
      </form>
      </div>
   </div>           
   @endforeach        
</div> --}}