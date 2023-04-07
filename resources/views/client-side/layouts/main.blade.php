<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="description" content="E-Commerce Trail Mini">
   <meta name="keywords" content="E-Commerce Trail Mini">
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
   <title>@yield('title')</title>
</head>
<body>
   <section id="topbar" class="d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
         <i class="bi bi-geo-alt-fill d-flex align-items-center">
            <a href="mailto:contact@example.com">Bondowoso, Jawa Timur 68214, Indonesia</a>
         </i>
         <i class="bi bi-alarm d-flex align-items-center ms-4"><span>{{ $time }}</span></i>
         <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 877-5917-4130</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
         <a href="#" class="twitter"><i class="bi bi-link-45deg"></i></a>
         <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
         <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      </div>
      </div>
   </section>

   <header id="header" class="d-flex align-items-center">
      <div class="container d-flex justify-content-between align-items-center">
         <div class="logo">
            <h1><a href="#">Mini Moto</a></h1>
         </div>
         <nav id="navbar" class="navbar">
            <ul>
               <li class="dropdown">
                  <a href="#">
                     <span>Beranda</span> <i class="bi bi-chevron-down"></i>
                  </a>
                  <ul>
                     <li><a href="#">Drop Down 1</a></li>
                     <li><a href="#">Drop Down 2</a></li>
                     <li><a href="#">Drop Down 3</a></li>
                     <li><a href="#">Drop Down 4</a></li>
                  </ul>
               </li>
               <li class="dropdown">
                  <a href="#">
                     <span>Katalog Produk</span> <i class="bi bi-chevron-down"></i>
                  </a>
                  <ul>
                     <li><a href="#">Drop Down 1</a></li>
                     <li><a href="#">Drop Down 2</a></li>
                     <li><a href="#">Drop Down 3</a></li>
                     <li><a href="#">Drop Down 4</a></li>
                  </ul>
               </li>
               <li class="dropdown">
                  <a href="#">
                     <span>Cara Belanja</span> <i class="bi bi-chevron-down"></i>
                  </a>
                  <ul>
                     <li><a href="#">Drop Down 1</a></li>
                     <li><a href="#">Drop Down 2</a></li>
                     <li><a href="#">Drop Down 3</a></li>
                     <li><a href="#">Drop Down 4</a></li>
                  </ul>
               </li>
               <li><a href="#">Masuk</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
         </nav>
      </div>
   </header>

   @yield('main-content')

   <footer id="footer">
      <div class="footer-newsletter">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  <h4>Our Newsletter</h4>
                  <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
               </div>
               <div class="col-lg-6">
                  <form action="" method="post">
                     <input type="email" name="email"><input type="submit" value="Subscribe">
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="footer-top">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-6 footer-links">
                  <h4>Useful Links</h4>
                  <ul>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                  </ul>
               </div>
               <div class="col-lg-3 col-md-6 footer-links">
                  <h4>Our Services</h4>
                  <ul>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                     <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                  </ul>
               </div>
               <div class="col-lg-3 col-md-6 footer-contact">
                  <h4>Contact Us</h4>
                  <p>
                     A108 Adam Street <br>
                     New York, NY 535022<br>
                     United States <br><br>
                     <strong>Phone:</strong> +1 5589 55488 55<br>
                     <strong>Email:</strong> info@example.com<br>
                  </p>
               </div>
               <div class="col-lg-3 col-md-6 footer-info">
                  <h3>About Eterna</h3>
                  <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                  <div class="social-links mt-3">
                     <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                     <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                     <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                     <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                     <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="copyright">
            Copyright &copy; 2023 <strong>Diana Fithri Lestari</strong>. All Rights Reserved
         </div>
         <div class="credits">
            Created by Diana Fithri Lestari</a>
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
</body>
</html>