<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

});

Route::get('/login', function () {
    return view('login');

});

Route::get('/home', function () {
    return view('home');

});

Route::get('/kelembabansuhu', function () {
    return view('kelembabansuhu');

});