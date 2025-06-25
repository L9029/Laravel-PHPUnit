<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('help', function () {
    return "Prueba de Test";
});

Route::view("profile", "profile");

Route::post('profile', function (Request $request) {

    $request->validate([
        'photo' => 'required|image|max:2048',
    ]);

    $request->file('photo')->store('profiles', 'local');

    return redirect('profile');
});