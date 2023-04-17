<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Client\LandingController;
use App\Http\Controllers\Server\BarangController;
use App\Http\Controllers\Server\SupplierController;
use App\Http\Controllers\Server\DashboardController;

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

// ! DEFAULT ROUTE LARAVEL
Route::get('/', function () {
    return view('welcome');
});

// ! ROUTE CLIENT SIDE
Route::get('/beranda', [LandingController::class, 'index']);

// ! ROUTE SERVER SIDE
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::resource('/barang-activity', BarangController::class)->parameters([
    'barang-activity' => 'barang_id'
]);

Route::get('/supplier', [SupplierController::class, 'index']);
Route::get('/createsupplier', [SupplierController::class, 'create']);
Route::post('/add', [SupplierController::class, 'store']);
Route::get('/{id}/edit', [SupplierController::class, 'edit']);
Route::put('/{id}', [SupplierController::class, 'update']);
Route::delete('/{id}', [SupplierController::class, 'destroy']);

// ? PREVIEW DATATABLES
Route::get('/datatables', [DashboardController::class, 'datatables']);

// ? PREVIEW FORM
Route::get('/form', [DashboardController::class, 'form']);

// ! ROUTE BREEZE AUTHENTICATION
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
