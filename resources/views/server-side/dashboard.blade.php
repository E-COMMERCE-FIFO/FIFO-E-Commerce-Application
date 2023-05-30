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
         <div class="col-lg-12">
            <div class="row">

               <div class="col-xxl-6 col-xl-6">
                  <div class="card info-card revenue-card">
                     <div class="card-body">
                        <h5 class="card-title">Pemasukan <span>| total pemasukan</span></h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-currency-dollar"></i>
                           </div>
                           <div class="ps-3">
                              <h6>Rp{{ $totalpemasukan }}</h6>
                              <a href="{{ url('penjualan') }}">
                                 <span class="text-success small pt-1 fw-bold">Lihat data</span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-xxl-6 col-xl-6">
                  <div class="card info-card customers-card">
                     <div class="card-body">
                        <h5 class="card-title">Pengeluaran <span>| total pengeluaran</span></h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-currency-dollar"></i>
                           </div>
                           <div class="ps-3">
                              <h6>Rp{{ $totalpengeluaran }}</h6>
                              <a href="{{ url('penjualan') }}">
                                 <span class="small pt-1 fw-bold" style="color: rgb(244, 161, 5);">Lihat data</span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-xxl-4 col-md-4">
                  <div class="card info-card sales-card">
                     <div class="card-body">
                        <h5 class="card-title">Admin <span>| total admin</span></h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-person-workspace"></i>
                           </div>
                           <div class="ps-3">
                              <h6>{{ $totaladmin }}</h6>
                              <a href="{{ route('pengguna-activity.index') }}">
                                 <span class="text-primary small pt-1 fw-bold">Lihat data</span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-xxl-4 col-md-4">
                  <div class="card info-card sales-card">
                     <div class="card-body">
                        <h5 class="card-title">Pelanggan <span>| total pelanggan</span></h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-people"></i>
                           </div>
                           <div class="ps-3">
                              <h6>{{ $totalpelanggan }}</h6>
                              <a href="{{ url('data-pelanggan') }}">
                                 <span class="text-primary small pt-1 fw-bold">Lihat data</span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-xxl-4 col-md-4">
                  <div class="card info-card revenue-card">
                     <div class="card-body">
                        <h5 class="card-title">Supplier <span>| total supplier</span></h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-house-check"></i>
                           </div>
                           <div class="ps-3">
                              <h6>{{ $totalsupplier }}</h6>
                              <a href="{{ url('supplier') }}">
                                 <span class="text-success small pt-1 fw-bold">Lihat data</span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-xxl-4 col-xl-4">
                  <div class="card info-card revenue-card">
                     <div class="card-body">
                        <h5 class="card-title">Barang <span>| total barang</span></h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-boxes"></i>
                           </div>
                           <div class="ps-3">
                              <h6>{{ $totalbarang }}</h6>
                              <a href="{{ route('barang-activity.index') }}">
                                 <span class="text-success small pt-1 fw-bold">Lihat data</span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-xxl-4 col-xl-4">
                  <div class="card info-card customers-card">
                     <div class="card-body">
                        <h5 class="card-title">Pembelian <span>| total pembelian</span></h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-journal-arrow-down"></i>
                           </div>
                           <div class="ps-3">
                              <h6>{{ $totalpembelian }}</h6>
                              <a href="{{ route('pembelian-activity.index') }}">
                                 <span class="small pt-1 fw-bold" style="color: rgb(244, 161, 5);">Lihat data</span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-xxl-4 col-xl-4">
                  <div class="card info-card customers-card">
                     <div class="card-body">
                        <h5 class="card-title">Penjualan <span>| total penjualan</span></h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-journal-arrow-up"></i>
                           </div>
                           <div class="ps-3">
                              <h6>{{ $totalpenjualan }}</h6>
                              <a href="{{ url('penjualan') }}">
                                 <span class="small pt-1 fw-bold" style="color: rgb(244, 161, 5);">Lihat data</span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

            </div>
         </div>

      </div>
   </section>
</main>
@endsection