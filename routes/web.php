<?php

use App\Http\Controllers\AdminUsercontroller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DuesCategoryController;
use App\Http\Controllers\DuesMemberController;
use App\Http\Controllers\halamanutama;
use App\Http\Controllers\login;
use Illuminate\Support\Facades\Route;

Route::get('/', [halamanutama::class, 'home'])->name('home');
Route::get("/login", [login::class,"login"])->name("login");
Route::post("/auth", [login::class, "auth"])->name('auth');
Route::get("/logout", [login::class, "logout"])->name(('logout'));

Route::middleware(['admin'])->group(function() {
    Route::get('/admin', [halamanutama::class, 'admin'])->name('admin');

    Route::get('/admin/warga', [AdminUsercontroller::class,'view'])->name('admin.wargaTab');
    Route::get('/admin/warga/create', [AdminUsercontroller::class,'create'])->name('admin.wargaCreate');
    Route::post('/admin/warga/store', [AdminUsercontroller::class,'store'])->name('admin.wargaStore');
    Route::get('/admin/warga/edit/{id}', [AdminUsercontroller::class,'edit'])->name('warga-edit');
    Route::post('/admin/warga/edit/{id}', [AdminUsercontroller::class,'update'])->name('warga-update');
    Route::get('/admin/warga/delete/{id}', [AdminUsercontroller::class,'delete'])->name('warga-delete');

    Route::get('/admin/dues_category', [DuesCategoryController::class,'view'])->name('admin.dues_category');
    Route::get('/admin/dues_category/create', [DuesCategoryController::class,'create'])->name('admin.dues_categoryCreate');
    Route::post('/admin/dues_category/create', [DuesCategoryController::class,'store'])->name('admin.dues_categoryStore');
    Route::get('/admin/dues_category/edit/{id}', [DuesCategoryController::class,'edit'])->name('admin.dues_categoryEdit');
    Route::post('/admin/dues_category/edit/{id}', [DuesCategoryController::class,'update'])->name('admin.dues_categoryUpdate');
    Route::get('/admin/dues_category/delete/{id}', [DuesCategoryController::class,'delete'])->name('admin.dues_categoryDelete');


    Route::get('/admin/dues_member', [DuesMemberController::class,'view'])->name('admin.dues_member');


});

Route::middleware(['warga'])->group(function(){

});
