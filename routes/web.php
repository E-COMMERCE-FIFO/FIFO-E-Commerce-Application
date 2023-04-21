<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Client\LandingController;
use App\Http\Controllers\Server\BarangController;
use App\Http\Controllers\Server\SupplierController;
use App\Http\Controllers\Server\DashboardController;
use App\Http\Controllers\Server\DetailTrxController;
use App\Http\Controllers\Server\PembelianController;

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
    return to_route('login');
});

// ! ROUTE CLIENT SIDE
Route::get('/beranda', [LandingController::class, 'index']);

// ? PREVIEW DATATABLES
Route::get('/datatables', [DashboardController::class, 'datatables']);

// ? PREVIEW FORM
Route::get('/form', [DashboardController::class, 'form']);

Route::middleware(['auth', 'verified'])->group(function () {
    // ! ROUTE SERVER SIDE
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/barang-activity', BarangController::class)->parameters([
        'barang-activity' => 'barang'
    ]);
    Route::resource('/pembelian-activity', PembelianController::class)->parameters([
        'pembelian-activity' => 'pembelian'
    ]);
    
    Route::get('/supplier', [SupplierController::class, 'index']);
    Route::get('/createsupplier', [SupplierController::class, 'create']);
    Route::post('/add', [SupplierController::class, 'store']);
    Route::get('/{id}/edit', [SupplierController::class, 'edit']);
    Route::put('/{id}', [SupplierController::class, 'update']);
    Route::delete('/{id}', [SupplierController::class, 'destroy']);
    
    // ? ROUTE BREEZE 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';