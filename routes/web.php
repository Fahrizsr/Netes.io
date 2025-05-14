<?php

use App\Http\Controllers\KelembabanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DurasiInkubasiController;

Route::get('/', function () {
    return view('welcome');

});

Route::get('/login', function () {
    return view('login');

});

Route::get('/logout', function () {
    return view('welcome');

});

Route::get('/home', function () {
    return view('home');

});

Route::get('/kelembabansuhu', function () {
    return view('kelembabansuhu');

});

Route::get('/jadwalrotasi', function () {
    return view('jadwalrotasi');

});

Route::get('/ubahrotasi', function () {
    return view('ubahrotasi');

});

Route::get('/sensor', function () {
    return view('sensor');

});

Route::get('/pilihkelamin', function () {
    return view('pilihkelamin');

});

Route::get('/notifikasi', function () {
    return view('notifikasi');

});

Route::get('/profile', function () {
    return view('profile');

});

// Route::get('/durasingkubasi', function () {
//     return view('durasingkubasi');

// });


Route::get('/durasingkubasi', [DurasiInkubasiController::class, 'index'])->name('durasi.index');
Route::post('/update-incubation', [DurasiInkubasiController::class, 'update'])->name('durasi.update');

Route::get('/kelembaban', [KelembabanController::class, 'index'])->name('kelembaban.index');
Route::post('/kelembaban', [KelembabanController::class, 'store'])->name('kelembaban.store');
