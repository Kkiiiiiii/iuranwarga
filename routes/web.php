<?php

use App\Http\Controllers\AdminUsercontroller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DetailPaymentController;
use App\Http\Controllers\DuesCategoryController;
use App\Http\Controllers\DuesMemberController;
use App\Http\Controllers\halamanutama;
use App\Http\Controllers\login;
use App\Http\Controllers\PaymentController;
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
    Route::get('/admin/searchDues-cat', [AdminUsercontroller::class, 'searchDuesCat'])->name('admin-searchDuescat');

    Route::get('/admin/dues_category', [DuesCategoryController::class,'view'])->name('admin.dues_category');
    Route::get('/admin/dues_category/create', [DuesCategoryController::class,'create'])->name('admin.dues_categoryCreate');
    Route::post('/admin/dues_category/create', [DuesCategoryController::class,'store'])->name('admin.dues_categoryStore');
    Route::get('/admin/dues_category/edit/{id}', [DuesCategoryController::class,'edit'])->name('admin.dues_categoryEdit');
    Route::post('/admin/dues_category/edit/{id}', [DuesCategoryController::class,'update'])->name('admin.dues_categoryUpdate');
    Route::get('/admin/dues_category/delete/{id}', [DuesCategoryController::class,'delete'])->name('admin.dues_categoryDelete');


    Route::get('/admin/dues_member', [DuesMemberController::class,'view'])->name('admin.dues_member');
    Route::get('/admin/dues_member/create', [DuesMemberController::class,'create'])->name('admin.dues_memberCreate');
    Route::post('/admin/dues_member/create', [DuesMemberController::class,'store'])->name('admin.dues_memberStore');
    Route::get('/admin/dues_member/edit/{id}', [DuesMemberController::class,'edit'])->name('admin.dues_memberEdit');
    Route::post('/admin/dues_member/edit/{id}', [DuesMemberController::class,'update'])->name('admin.dues_memberUpdate');
    Route::get('/admin/dues_member/delete/{id}', [DuesMemberController::class,'delete'])->name('admin.dues_memberDelete');

    Route::get('/admin/payment', [PaymentController::class,'view'])->name('admin.payment');
    // Route::get('/admin/payment/create', [PaymentController::class,'create'])->name('admin.paymentCreate');
    // Route::get('/admin/payment/edit/{id}', [PaymentController::class,'edit'])->name('admin.paymentEdit');
    // Route::post('/admin/payment/edit/{id}', [PaymentController::class,'update'])->name('admin.paymentUpdate');
    Route::post('/admin/payment/store', [PaymentController::class,'store'])->name('admin.paymentStore');
    Route::get( '/admin/payment/delete/{id}', [PaymentController::class,'delete'])->name('admin.paymentDelete');
    Route::get( '/admin/payment/detail/{id}', [DetailPaymentController::class,'payment_detail'])->name('admin.paymentDetail');

});

Route::middleware(['officer'])->group(function(){

});
