<?php

use App\Http\Controllers\UploadController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/test', function () {
    return view('test');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/form-pendaftaran', function () {
        return view('pendaftaran.form');
    })->name('pendaftaran');

    Route::post('/upload', [UploadController::class, 'store'])->name('upload.store');
    Route::get('/file-upload', [UploadController::class, 'index'])->name('fileUpload');


    Route::get('/pendaftaran', [PendaftaranController::class, 'show'])->name('pendaftaran.show');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::put('/pendaftaran/{id}', [PendaftaranController::class, 'update'])->name('pendaftaran.update');
    Route::get('/pendaftaran/{id}', [PendaftaranController::class, 'edit']);
    Route::delete('/pendaftaran/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
