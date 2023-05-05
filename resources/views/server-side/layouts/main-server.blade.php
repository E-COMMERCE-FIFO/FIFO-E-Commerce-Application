<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta name="description" content="Toko Roket Mini Moto">
   <meta name="keywords" content="Toko Roket Mini Moto">
   <meta name="author" content="Diana Fithri Lestari">
   <link href="{{ url('assets/server-side/img/favicon.png') }}" rel="icon">
   <link href="{{ url('assets/server-side/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
   <link href="https://fonts.gstatic.com" rel="preconnect">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <link href="{{ url('assets/server-side/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ url('assets/server-side/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
   <link href="{{ url('assets/server-side/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
   <link href="{{ url('assets/server-side/vendor/quill/quill.snow.css') }}" rel="stylesheet">
   <link href="{{ url('assets/server-side/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
   <link href="{{ url('assets/server-side/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
   <link href="{{ url('assets/server-side/vendor/simple-datatables/style.css') }}" rel="stylesheet">
   <link href="{{ url('assets/server-side/css/style.css') }}" rel="stylesheet">
   <title>@yield('title')</title>
</head>
<body>

   <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
         <a href{{ url('dashboard') }}" class="logo d-flex align-items-center">
            <img src="{{ url('assets/server-side/img/logo.png') }}" alt="">
            <span class="d-none d-lg-block">R.MiniMoto</span>
         </a>
         <i class="bi bi-list toggle-sidebar-btn"></i>
      </div>
      <div class="search-bar">
         <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search">
               <i class="bi bi-search"></i>
            </button>
         </form>
      </div>
      <nav class="header-nav ms-auto">
         <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
               <a class="nav-link nav-icon search-bar-toggle " href="#">
                  <i class="bi bi-search"></i>
               </a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                  <i class="bi bi-bell"></i>
                  <span class="badge bg-primary badge-number">4</span>
               </a>
               <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                  <li class="dropdown-header">
                     You have 4 new notifications <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li class="notification-item">
                     <i class="bi bi-exclamation-circle text-warning"></i>
                     <div>
                        <h4>Lorem Ipsum</h4>
                        <p>Quae dolorem earum veritatis oditseno</p>
                        <p>30 min. ago</p>
                     </div>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li class="notification-item">
                     <i class="bi bi-x-circle text-danger"></i>
                     <div>
                        <h4>Atque rerum nesciunt</h4>
                        <p>Quae dolorem earum veritatis oditseno</p>
                        <p>1 hr. ago</p>
                     </div>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li class="notification-item">
                     <i class="bi bi-check-circle text-success"></i>
                     <div>
                        <h4>Sit rerum fuga</h4>
                        <p>Quae dolorem earum veritatis oditseno</p>
                        <p>2 hrs. ago</p>
                     </div>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li class="notification-item">
                     <i class="bi bi-info-circle text-primary"></i>
                     <div>
                        <h4>Dicta reprehenderit</h4>
                        <p>Quae dolorem earum veritatis oditseno</p>
                        <p>4 hrs. ago</p>
                     </div>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li class="dropdown-footer">
                     <a href="#">Show all notifications</a>
                  </li>
               </ul>
            </li>

            <li class="nav-item dropdown pe-3">
               <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                  <img src="{{ url('assets/server-side/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                  <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->nama_lengkap }}</span>
               </a>
               <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                  <li class="dropdown-header">
                     <h6>Kevin Anderson</h6> <span>Web Designer</span>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                     <a class="dropdown-item d-flex align-items-center" href="{{ url('dashboard') }}">
                        <i class="bi bi-person"></i><span>My Profile</span>
                     </a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                     <a class="dropdown-item d-flex align-items-center" href="{{ url('dashboard') }}">
                        <i class="bi bi-gear"></i><span>Account Settings</span>
                     </a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                     <a class="dropdown-item d-flex align-items-center" href="{{ url('dashboard') }}">
                        <i class="bi bi-question-circle"></i><span>Need Help?</span>
                     </a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                     <a class="dropdown-item d-flex align-items-center" href="{{ url('logout') }}">
                        <i class="bi bi-box-arrow-right"></i><span>Sign Out</span>
                     </a>
                  </li>
               </ul>
            </li>
         </ul>
      </nav>
   </header>

   <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">
         <li class="nav-heading mb-2">Dashboards</li>
         <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">
               <i class="bi bi-grid"></i><span>Dashboard</span>
            </a>
         </li>
         <li class="nav-heading mb-2 mt-4">Data</li>
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#pengguna-nav" data-bs-toggle="collapse" href="">
               <i class="bi bi-people"></i><span>Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="pengguna-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
               <li>
                  <a href="{{ route('pengguna-activity.index') }}">
                     <i class="bi bi-circle"></i><span>Data Pengguna</span>
                  </a>
               </li>
               <li>
                  <a href="{{ route('pengguna-activity.create') }}">
                     <i class="bi bi-circle"></i><span>Tambah Admin</span>
                  </a>
               </li>
            </ul>
         </li>
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="{{ url('dashboard') }}">
               <i class="bi bi-bus-front-fill"></i><span>Supplier</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
               <li>
                  <a href="{{ url('supplier') }}">
                     <i class="bi bi-circle"></i><span>Data Supplier</span>
                  </a>
               </li>
               <li>
                  <a href="{{ url('createsupplier') }}">
                     <i class="bi bi-circle"></i><span>Tambah Supplier</span>
                  </a>
               </li>
            </ul>
         </li>
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#barang-nav" data-bs-toggle="collapse" href="#">
               <i class="bi bi-boxes"></i><span>Barang</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="barang-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
               <li>
                  <a href="{{ route('barang-activity.index') }}">
                     <i class="bi bi-circle"></i><span>Data Barang</span>
                  </a>
               </li>
               <li>
                  <a href="{{ route('barang-activity.create') }}">
                     <i class="bi bi-circle"></i><span>Tambah Barang</span>
                  </a>
               </li>
            </ul>
         </li>
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#transaksi-nav" data-bs-toggle="collapse" href="#">
               <i class="bi bi-cart-check"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="transaksi-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
               <li>
                  <a href="{{ route('pembelian-activity.index') }}">
                     <i class="bi bi-circle"></i><span>Pembelian</span>
                  </a>
               </li>
               <li>
                  <a href="{{ url('dashboard') }}">
                     <i class="bi bi-circle"></i><span>Penjualan</span>
                  </a>
               </li>
            </ul>
         </li>
         <li class="nav-heading mb-2 mt-4">Laporan</li>
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#cetak-nav" data-bs-toggle="collapse" href="#">
               <i class="bi bi-printer"></i><span>Cetak Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="cetak-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
               <li>
                  <a href="{{ url('dashboard') }}">
                     <i class="bi bi-circle"></i><span>Barang Masuk</span>
                  </a>
               </li>
               <li>
                  <a href="{{ url('dashboard') }}">
                     <i class="bi bi-circle"></i><span>Barang Keluar</span>
                  </a>
               </li>
            </ul>
         </li>
         <li class="nav-heading mb-2 mt-4">Lain-lain</li>
         <li class="nav-item">
            <a class="nav-link collapsed" href=" {{ url('logout') }}">
               <i class="bi bi-sign-turn-slight-right"></i>
               <span>Keluar</span>
            </a>
         </li>
      </ul>
   </aside>

   @yield('main-content')

   <footer id="footer" class="footer">
      <div class="copyright">
         Copyright &copy; 2023 <strong><span>Toko Roket Mini Moto</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
         Created by Diana Fithri Lestari
      </div>
   </footer>

   <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

   <script src="{{ url('assets/server-side/vendor/apexcharts/apexcharts.min.js') }}"></script>
   <script src="{{ url('assets/server-side/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ url('assets/server-side/vendor/chart.js/chart.umd.js') }}"></script>
   <script src="{{ url('assets/server-side/vendor/echarts/echarts.min.js') }}"></script>
   <script src="{{ url('assets/server-side/vendor/quill/quill.min.js') }}"></script>
   <script src="{{ url('assets/server-side/vendor/simple-datatables/simple-datatables.js') }}"></script>
   <script src="{{ url('assets/server-side/vendor/tinymce/tinymce.min.js') }}"></script>
   <script src="{{ url('assets/server-side/vendor/php-email-form/validate.js') }}"></script>
   <script src="{{ url('assets/server-side/js/main.js') }}"></script>
</body>
</html>