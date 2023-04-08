@extends('client-side.layouts.main')
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
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
               <div class="icon-box shadow-sm">
                  <div class="icon"><i class="bx bxl-dribbble"></i></div>
                  <h4><a href="">Lorem Ipsum</a></h4>
                  <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
               <div class="icon-box shadow-sm">
                  <div class="icon"><i class="bx bx-file"></i></div>
                  <h4><a href="">Sed ut perspiciatis</a></h4>
                  <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
               <div class="icon-box shadow-sm">
                  <div class="icon"><i class="bx bx-tachometer"></i></div>
                  <h4><a href="">Magni Dolores</a></h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
@endsection