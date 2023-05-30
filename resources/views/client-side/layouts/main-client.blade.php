<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="description" content="Toko Roket Mini Moto">
   <meta name="keywords" content="Toko Roket Mini Moto">
   <meta name="author" content="Diana Fithri Lestari">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <link href="{{ url('assets/client-side/img/favicon.png') }}" rel="icon">
   <link href="{{ url('assets/client-side/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
   <link href="{{ url('assets/client-side/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
   <link href="{{ url('assets/client-side/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ url('assets/client-side/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
   <link href="{{ url('assets/client-side/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
   <link href="{{ url('assets/client-side/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
   <link href="{{ url('assets/client-side/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
   <link href="{{ url('assets/client-side/css/style.css') }}" rel="stylesheet">
   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
   <title>@yield('title')</title>
</head>
<body>
   <section id="topbar" class="d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
         <div class="contact-info d-flex align-items-center">
            <i class="bi bi-geo-alt-fill d-flex align-items-center">
               <a href="mailto:contact@example.com">Kel. Blindungan, Bondowoso, Jawa Timur 68212</a>
            </i>
            <i class="bi bi-alarm d-flex align-items-center ms-4"><span>09.00 - 22.00</span></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 877-5917-4130</span></i>
         </div>
         <div class="social-links d-none d-md-flex align-items-center">
            <a href="#" class="twitter"><i class="bi bi-link-45deg"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="instagram"><i class="bi bi-whatsapp"></i></a>
         </div>
      </div>
   </section>

   <header id="header" class="d-flex align-items-center">
      <div class="container d-flex justify-content-between align-items-center">
         <div class="logo">
            <h1><a href="#">Roket Mini Moto</a></h1>
         </div>
         <nav id="navbar" class="navbar">
            <ul>
               <li><a href="{{ route('beranda') }}">Beranda</a></li>
               <li class="dropdown">
                  <a href="#">
                     <span>Katalog Produk</span> <i class="bi bi-chevron-down"></i>
                  </a>
                  <ul>
                     @foreach (App\Models\Kategori::all() as $item)
                        <li><a href="{{ route('kategori-barang-activity', $item->kategori) }}">{{ $item->kategori }}</a></li>
                     @endforeach
                  </ul>
               </li>
               <li><a href="{{ route('beranda') }}">Cara Belanja</a></li>
            
               @auth
               @if(Auth::user()->role == 'Administrator')
               <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
               <li><a href="{{ url('/logout') }}">logout</a></li>

               @else
               <li><a href="{{ route('history') }}">Riwayat Pembelian</a></li>
               <li><a href="{{ url('/logout') }}">logout</a></li>
               @endif
               @else
               <li><a href="{{ url('/login') }}">Masuk</a></li>
               @endauth
               
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
         </nav>
      </div>
   </header>

   @yield('main-content')

   <footer id="footer">
      <div class="footer-top">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-6 footer-links">
                  <h4>Daftar Halaman</h4>
                  <ul>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Beranda</a></li>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Katalog Produk</a></li>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Cara Belanja</a></li>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Riwayat Pembelian</a></li>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Masuk/Daftar</a></li>
                  </ul>
               </div>
               <div class="col-lg-3 col-md-6 footer-links">
                  <h4>Daftar Produk</h4>
                  <ul>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Moto Trail Mini</a></li>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Moto Trail Mini</a></li>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Moto Trail Mini</a></li>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Moto Trail Mini</a></li>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Moto Trail Mini</a></li>
                  </ul>
               </div>
               <div class="col-lg-3 col-md-6 footer-contact">
                  <h4>Tentang Kami</h4>
                  <p>
                     Utara hotel baru, Jl. Ra. Kartini No.41, Pegadaian, Blindungan, Kec. Bondowoso, Kabupaten Bondowoso, Jawa Timur 68212 <br><br>
                     <strong>Phone:</strong> +1 5589 55488 55<br>
                     <strong>Email:</strong> info@example.com<br>
                  </p>
               </div>
               <div class="col-lg-3 col-md-6 footer-info">
                  <h4>Temukan Kami</h4>
                  <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.852142353829!2d113.8222771143778!3d-7.910510280922554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6dd215e465253%3A0xfc06574f8da1604d!2sGrosir%20Roket%20Mini%20Moto%20Bondowoso!5e0!3m2!1sid!2sid!4v1680979283405!5m2!1sid!2sid" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
                  <div class="social-links mt-3">
                     <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                     <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                     <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                     <a href="#" class="instagram"><i class="bx bxl-whatsapp"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="copyright">
            Copyright &copy; 2023 <strong>Toko Roket Mini Moto</strong>. All Rights Reserved
         </div>
         <div class="credits">
            Created by Diana Fithri Lestari
         </div>
      </div>
   </footer>

   <script src="{{ url('assets/client-side/vendor/purecounter/purecounter_vanilla.js') }}"></script>
   <script src="{{ url('assets/client-side/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ url('assets/client-side/vendor/glightbox/js/glightbox.min.js') }}"></script>
   <script src="{{ url('assets/client-side/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
   <script src="{{ url('assets/client-side/vendor/swiper/swiper-bundle.min.js') }}"></script>
   <script src="{{ url('assets/client-side/vendor/waypoints/noframework.waypoints.js') }}"></script>
   <script src="{{ url('assets/client-side/vendor/php-email-form/validate.js') }}"></script>
   <script src="{{ url('assets/client-side/js/main.js') }}"></script>
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script>
     AOS.init();
   </script>
</body>
</html>