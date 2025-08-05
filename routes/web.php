<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\login;
use Illuminate\Support\Facades\Route;

Route::get("/", [login::class,"login"])->name("login");


Route::middleware(['admin'])->group(function() {

});

Route::middleware(['warga'])->group(function(){

});