<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('travel-map');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
