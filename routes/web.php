<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\halamanutama;
use App\Http\Controllers\login;
use Illuminate\Support\Facades\Route;

Route::get('/', [halamanutama::class, 'home'])->name('home');
Route::get("/login", [login::class,"login"])->name("login");
Route::post("/auth", [login::class, "auth"])->name('auth');

Route::middleware(['admin'])->group(function() {
    Route::get('/admin', [halamanutama::class, 'admin'])->name('admin');
    Route::get('/admin/warga', [halamanutama::class,'users'])->name('admin.wargaTab');
    Route::get('/admin/warga/create', [login::class,'create'])->name('admin.wargaCreate');
    Route::post('/admin/warga/store', [login::class,'store'])->name('admin.wargaStore');
    Route::get('/admin/warga/edit/{id}', [halamanutama::class,'edit'])->name('warga-edit');
    Route::post('/admin/warga/edit/{id}', [halamanutama::class,'update'])->name('warga-update');
    Route::get('/admin/warga/delete/{id}', [halamanutama::class,'delete'])->name('warga-delete');




});

Route::middleware(['warga'])->group(function(){

});
