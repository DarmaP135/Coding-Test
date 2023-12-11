<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [DashboardController::class, 'showAll'])->name('landing-page');

Route::group(['middleware' => 'guest'], function () {
    // Rute login dan registrasi
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    // Rute-rute yang memerlukan autentikasi
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');

    Route::get('/manajemen-mobil', [DashboardController::class, 'manajemenIndex'])->name('manajemen-mobil');
    Route::get('/tambah-mobil', [DashboardController::class, 'tambahMobil'])->name('tambah-mobil');
    Route::post('/add-mobil', [DashboardController::class, 'addMobil'])->name('add-mobil');

    Route::get('/peminjaman-mobil', [DashboardController::class, 'peminjamanIndex'])->name('peminjaman-mobil');
    Route::get('/sewa-mobil', [DashboardController::class, 'sewaMobil'])->name('sewa-mobil');
    Route::post('/pencarian-mobil', [DashboardController::class, 'pencarianMobil'])->name('pencarian-mobil');
    Route::get('/rent-car/{id}', [DashboardController::class, 'rentMobil'])->name('sewa-Mobil');
    Route::post('/book-mobil/{id}', [DashboardController::class, 'bookMobil'])->name('book-mobil');

    Route::get('/pengembalian/{id}', [DashboardController::class, 'pengembalianMobil'])->name('pengembalian-mobil');
    Route::post('/pengembalian-mobil/{id}', [DashboardController::class, 'pengembalian'])->name('pengembalian');
});
