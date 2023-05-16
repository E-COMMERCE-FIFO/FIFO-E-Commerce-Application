<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Client\LandingController;
use App\Http\Controllers\Server\BarangController;
use App\Http\Controllers\Server\SupplierController;
use App\Http\Controllers\Server\DashboardController;
use App\Http\Controllers\Server\KategoriController;
use App\Http\Controllers\Server\PembelianController;
use App\Http\Controllers\Server\PenggunaController;
use App\Http\Controllers\Server\PenjualanController;
use App\Http\Controllers\ServerPenjualanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ! INDEX
Route::get('/', function () {
    return to_route('beranda');
});

// ! ROUTE CLIENT SIDE
Route::get('/beranda', [PenjualanController::class, 'index'])->name('beranda');
Route::get('/edit/{item}', [PenjualanController::class, 'edit'])->name('edit');
Route::post('/penjualan/store', [PenjualanController::class, 'store'])->name('store');
// ? PREVIEW DATATABLES
Route::get('/datatables', [DashboardController::class, 'datatables']);

// ? PREVIEW FORM
Route::get('/form', [DashboardController::class, 'form']);

Route::middleware(['auth', 'verified'])->group(function () {
    // ! ROUTE SERVER SIDE
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/kategori-activity', KategoriController::class)->parameters([
        'kategori-activity' => 'kategori'
    ]);
    Route::resource('/barang-activity', BarangController::class)->parameters([
        'barang-activity' => 'barang'
    ]);
    Route::resource('/pembelian-activity', PembelianController::class)->parameters([
        'pembelian-activity' => 'pembelian'
    ]);
    Route::resource('/pengguna-activity', PenggunaController::class)->parameters([
        'pengguna-activity' => 'pengguna'
    ]);
    
    Route::get('/data-pelanggan', [PenggunaController::class, 'customer']);
    Route::get('/supplier', [SupplierController::class, 'index']);
    Route::get('/createsupplier', [SupplierController::class, 'create']);
    Route::post('/add', [SupplierController::class, 'store']);
    Route::get('/{id}/edit', [SupplierController::class, 'edit']);
    Route::put('/{id}', [SupplierController::class, 'update']);
    Route::delete('/{id}', [SupplierController::class, 'destroy']);
    Route::get('/penjualan', [ServerPenjualanController::class, 'index']);
    Route::delete('/penjualan/{id}', [ServerPenjualanController::class, 'destroy']);
    Route::get('/{id}/detail', [ServerPenjualanController::class, 'show']);

    
    // ? ROUTE BREEZE 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';