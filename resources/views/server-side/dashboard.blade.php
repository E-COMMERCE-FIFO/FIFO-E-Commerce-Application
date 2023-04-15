@extends('server-side.layouts.main-server')
@section('title', 'Dashboard Roket Mini Moto')
@section('main-content')
<main id="main" class="main">
   <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
         <ol class="breadcrumb">
            <li class="breadcrumb-item">
               <a href="index.html">Masuk</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
         </ol>
      </nav>
   </div>
   <section class="section dashboard">
      <div class="row">
         <div class="col-lg-8">
            <div class="row">
               <div class="col-xxl-4 col-md-6">
                  <div class="card info-card sales-card">
                     <div class="card-body">
                        <h5 class="card-title">Pengguna <span>| total pengguna</span></h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-people"></i>
                           </div>
                           <div class="ps-3">
                              <h6>145</h6>
                              <span class="text-primary small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-xxl-4 col-md-6">
                  <div class="card info-card revenue-card">
                     <div class="card-body">
                        <h5 class="card-title">Supplier <span>| total supplier</span></h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-currency-dollar"></i>
                           </div>
                           <div class="ps-3">
                              <h6>$3,264</h6>
                              <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-xxl-4 col-xl-6">
                  <div class="card info-card customers-card">
                     <div class="card-body">
                        <h5 class="card-title">Merek Barang <span>| total merek</span></h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-people"></i>
                           </div>
                           <div class="ps-3">
                              <h6>1244</h6>
                              <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-xxl-4 col-xl-6">
                  <div class="card info-card customers-card">
                     <div class="card-body">
                        <h5 class="card-title">Barang <span>| total barang</span></h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-lock"></i>
                           </div>
                           <div class="ps-3">
                              <h6>1244</h6>
                              <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-xxl-4 col-xl-6">
                  <div class="card info-card customers-card">
                     <div class="card-body">
                        <h5 class="card-title">Pembelian <span>| total pembelian</span></h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-lock"></i>
                           </div>
                           <div class="ps-3">
                              <h6>1244</h6>
                              <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-xxl-4 col-xl-6">
                  <div class="card info-card customers-card">
                     <div class="card-body">
                        <h5 class="card-title">Penjualan <span>| total penjualan</span></h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-lock"></i>
                           </div>
                           <div class="ps-3">
                              <h6>1244</h6>
                              <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-12">
                  <div class="card recent-sales overflow-auto">
                     <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                           <li class="dropdown-header text-start">
                              <h6>Filter</h6>
                           </li>
                           <li><a class="dropdown-item" href="#">Today</a></li>
                           <li><a class="dropdown-item" href="#">This Month</a></li>
                           <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                     </div>
                     <div class="card-body">
                        <h5 class="card-title">Data Penjualan <span>| Transaksi Pelanggan</span></h5>
                        <table class="table table-borderless datatable">
                           <thead>
                              <tr>
                                 <th scope="col">No</th>
                                 <th scope="col">Nama Pelanggan</th>
                                 <th scope="col">Barang</th>
                                 <th scope="col">Harga</th>
                                 <th scope="col">Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <th scope="row"><a href="#">1</a></th>
                                 <td>Ahmad Wildan</td>
                                 <td><a href="#" class="text-primary">Bakso Gunung</a></td>
                                 <td>80K</td>
                                 <td><span class="badge bg-success">Sukses</span></td>
                              </tr>
                              <tr>
                                 <th scope="row"><a href="#">2</a></th>
                                 <td>Bahrul Ulum</td>
                                 <td><a href="#" class="text-primary">Durex 10 Lusin</a></td>
                                 <td>200K</td>
                                 <td><span class="badge bg-warning">Tertunda</span></td>
                              </tr>
                              <tr>
                                 <th scope="row"><a href="#">3</a></th>
                                 <td>Rizky Ramdhani</td>
                                 <td><a href="#" class="text-primary">Roti Goreng</a></td>
                                 <td>100K</td>
                                 <td><span class="badge bg-warning">Tertunda</span></td>
                              </tr>
                              <tr>
                                 <th scope="row"><a href="#">4</a></th>
                                 <td>Farul Ahmad Wananda</td>
                                 <td><a href="#" class="text-primar">Pecel Lele</a></td>
                                 <td>400K</td>
                                 <td><span class="badge bg-danger">Gagal</span></td>
                              </tr>
                              <tr>
                                 <th scope="row"><a href="#">5</a></th>
                                 <td>Zainur Roziqin</td>
                                 <td><a href="#" class="text-primary">Sepeda Motor</a></td>
                                 <td>800K</td>
                                 <td><span class="badge bg-success">Sukses</span></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-lg-4">
            <div class="card">
               <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                     <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                     </li>
                     <li><a class="dropdown-item" href="#">Today</a></li>
                     <li><a class="dropdown-item" href="#">This Month</a></li>
                     <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
               </div>
               <div class="card-body">
               <h5 class="card-title">Aktivitas Terbaru <span>| Pengguna</span></h5>
                  <div class="activity">
                     <div class="activity-item d-flex">
                        <div class="activite-label">32 min</div>
                        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                        <div class="activity-content">Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae</div>
                     </div>
                     <div class="activity-item d-flex">
                        <div class="activite-label">56 min</div>
                        <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                        <div class="activity-content">Voluptatem blanditiis blanditiis eveniet</div>
                     </div>
                     <div class="activity-item d-flex">
                        <div class="activite-label">2 hrs</div>
                        <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                        <div class="activity-content">Voluptates corrupti molestias voluptatem</div>
                     </div>
                     <div class="activity-item d-flex">
                        <div class="activite-label">1 day</div>
                        <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                        <div class="activity-content">Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore</div>
                     </div>
                     <div class="activity-item d-flex">
                        <div class="activite-label">2 days</div>
                        <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                        <div class="activity-content">Est sit eum reiciendis exercitationem</div>
                     </div>
                     <div class="activity-item d-flex">
                        <div class="activite-label">4 weeks</div>
                        <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                        <div class="activity-content">Dicta dolorem harum nulla eius. Ut quidem quidem sit quas</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
@endsection