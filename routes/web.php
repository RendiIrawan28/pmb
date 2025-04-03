<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\S_Admin_Controller;
use App\Http\Controllers\UploadBerkasController;
use App\Http\Controllers\uploadBuktiPembayaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/test', function () {
    return view('admin.partial.input_berkas');
})->name('test');
Route::get('/Forbidden', function () { 
    return view('error.403'); }
    )->name('403');

// Route untuk calon mahasiswa
//tambahkan middleware untuk semua route
Route::middleware(['auth', 'verified', 'checkRole:1' ])->group(function () {
    Route::get('/form-pendaftaran', function () {
        return view('pendaftaran.form');
    })->name('pendaftaran');

    Route::get('/file-upload', [UploadBerkasController::class, 'index'])->name('fileUpload');
    Route::get('/upload', [UploadBerkasController::class, 'show'])->name('upload.show');
    Route::get('/upload/{id}', [UploadBerkasController::class, 'showdata'])->name('upload.showdata');
    Route::post('/upload', [UploadBerkasController::class, 'store'])->name('upload.store');

    Route::get('/bukti-upload', [uploadBuktiPembayaranController::class, 'index'])->name('buktiUpload');
    Route::get('/bukti', [uploadBuktiPembayaranController::class, 'show'])->name('bukti.show');

    Route::get('/pendaftaran', [PendaftaranController::class, 'show'])->name('pendaftaran.show');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::put('/pendaftaran/{id}', [PendaftaranController::class, 'update'])->name('pendaftaran.update');
    Route::get('/pendaftaran/{id}', [PendaftaranController::class, 'edit']);
    Route::delete('/pendaftaran/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route untuk Admin
Route::middleware(['auth','verified','checkRole:2'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.admin');
    })->name('admin');

    Route::get('/admin/pendaftaran', [AdminController::class, 'show'])->name('admin.pedaftaran');
    Route::get('/admin/pendaftaran/{id}', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/berkas/{id}', [AdminController::class, 'GetImages'])->name('admin.image');
});


// Route untuk Super_Admin
Route::middleware(['auth','verified','checkRole:3'])->group(function () {
    Route::get('/super-admin/dashboard', function () {
        return view('admin.super_admin');
    })->name('super_admin');

    Route::get('/super-admin/admin', [S_Admin_Controller::class, 'show'])->name('s_admin.admin');
    Route::post('/super-admin/admin', [S_Admin_Controller::class, 'store'])->name('s_admin.store');
    Route::delete('/super-admin/admin/{id}', [S_Admin_Controller::class, 'destroy'])->name('s_admin.destroy');
});


require __DIR__ . '/auth.php';
