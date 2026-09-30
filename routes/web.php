<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SpesialisController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PasienAdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\JadwalLayananAdminController;


// AUTH
Route::controller(AuthController::class)->group(function () {

    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login.process');
    Route::post('/logout', 'logout')->name('logout');

    Route::get('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'storeRegister'])
        ->name('register.store');
});


Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get(
            '/dashboard',
            [AdminDashboardController::class, 'index']
        )->name('admin.dashboard');

        Route::resource('layanan', LayananController::class);
        Route::resource('dokter', DokterController::class);
        Route::resource('invoice', InvoiceController::class);
        Route::resource('spesialis', SpesialisController::class)->parameters(['spesialis' => 'spesialis']);
        Route::resource('agama', AgamaController::class);
        Route::resource('pendidikan', PendidikanController::class);
        Route::resource('pekerjaan', PekerjaanController::class);
        Route::resource('pasien', PasienAdminController::class);
        Route::resource('jadwal-layanan', JadwalLayananAdminController::class);

        Route::get(
            '/pemeriksaan/pending',
            [PemeriksaanController::class, 'pending']
        )->name('pemeriksaan.pending');
        Route::get(
            '/pemeriksaan/selesai',
            [PemeriksaanController::class, 'selesai']
        )->name('pemeriksaan.selesai');
    });

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/tentang', [BerandaController::class, 'tentang'])->name('tentang');
Route::get('/kontak', [BerandaController::class, 'kontak'])->name('kontak');
Route::get('/layanan', [BerandaController::class, 'layanan'])->name('layanan');
Route::get('/layanan/{slug}', [BerandaController::class, 'detail_layanan'])->name('detail_layanan');
Route::get('/privacy', [BerandaController::class, 'privacy'])->name('privacy');
Route::get('/terms', [BerandaController::class, 'terms'])->name('terms');
Route::get('/dokter', [BerandaController::class, 'dokter'])->name('dokter');
// Route::get('/invoice-pendaftaran', [BerandaController::class, 'invoice'])->name('invoice');


Route::middleware(['auth', 'role:pasien'])
    ->group(function () {

        Route::get(
            '/dashboard-pasien',
            [PasienController::class, 'dashboard']
        )->name('dashboard_pasien');

        Route::get(
            '/profil-pasien',
            [PasienController::class, 'profil']
        )->name('profil');

        Route::put(
            '/profil/update',
            [PasienController::class, 'updateProfil']
        )->name('profil.update');

        Route::post(
            '/daftar/store',
            [BerandaController::class, 'storePemeriksaan']
        )->name('daftar.store');

        Route::get(
            '/pemeriksaan',
            [PasienController::class, 'pemeriksaan']
        )->name('pemeriksaan');

        Route::get(
            '/invoice',
            [PasienController::class, 'invoice']
        )->name('invoice');

        Route::get(
            '/invoice/detail/{id}',
            [PasienController::class, 'detailInvoice']
        )->name('invoice.detail');

        Route::get(
            '/invoice/download/{id}',
            [PasienController::class, 'downloadInvoice']
        )->name('invoice.download');

        Route::post(
            '/midtrans/callback',
            [BerandaController::class, 'midtransCallback']
        );

        Route::get(
            '/payment-success/{id}',
            [BerandaController::class, 'paymentSuccess']
        )->name('payment.success');

        Route::get('/daftar/{slug}', [BerandaController::class, 'daftar'])->name('daftar');
        Route::get('/daftar-edit/{id}', [BerandaController::class, 'daftar_edit'])->name('daftar_edit');
        Route::put(
            '/daftar-update/{id}',
            [BerandaController::class, 'updatePemeriksaan']
        )->name('daftar_update');
        Route::get('/pembayaran/{id}', [BerandaController::class, 'before_pembayaran'])->name('pembayaran');
    });
