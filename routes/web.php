<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\login;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class, 'home'])->name('home');
Route::get("/login", [login::class,"login"])->name("login");
Route::get("/regis", [login::class,"regis"])->name("regis");
Route::post("/auth", [login::class, "auth"])->name('auth');

Route::middleware(['admin'])->group(function() {
    Route::get('/admin', [Controller::class, 'admin'])->name('admin');
});

Route::middleware(['warga'])->group(function(){

});