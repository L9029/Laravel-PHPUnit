<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileControler;

Route::get('/', function () {
    return view('welcome');
});

Route::get('help', function () {
    return "Prueba de Test";
});

Route::view("profile", "profile");

Route::post('profile', [ProfileControler::class, 'upload_file'])->name('profile.upload_file');