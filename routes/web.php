<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index');
})->name('index');



Route::get('/dashboard', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/add_category', [AdminController::class, "addcategory"])->name('admin.addcategory');
    Route::post('/add_category', [AdminController::class, "postaddcategory"])->name('admin.postaddcategory');
    Route::get('/view_category', [AdminController::class, "viewcategory"])->name('admin.viewcategory');
    Route::get('/delete_category/{id}', [AdminController::class, 'deleteCategory'])->name('admin.categorydelete');
    Route::get('/update_category/{id}', [AdminController::class, 'updatecategory'])->name('admin.categoryupdate');
    Route::post('/update_category/{Id}', [AdminController::class, 'postupdatecategory'])->name('admin.postupdatecategory');

    Route::get('/add_product', [AdminController::class, 'addproduct'])->name('admin.addproduct');
    Route::post('/add_product', [AdminController::class, 'postaddproduct'])->name('admin.postaddproduct');
    Route::get('/view_product', [AdminController::class, 'viewproduct'])->name('admin.viewproduct');
    Route::get('/delete_product/{id}', [AdminController::class, 'deleteProduct'])->name('admin.productdelete');
    Route::get('/update_product/{id}', [AdminController::class, 'updateproduct'])->name('admin.updateproduct');
    Route::post('/update_product/{id}', [AdminController::class, 'postupdateproduct'])->name('admin.postupdateproduct');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
