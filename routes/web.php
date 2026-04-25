<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;



// Route::get('/', function () {
//     return view('index');
// })->name('index');

Route::get('/', [UserController::class, 'home'])->name('index');


Route::get('/product_detail/{id}', [UserController::class, 'productdetail'])->name('product_detail');
Route::get('/viewallproducts', [UserController::class, 'viewallproducts'])->name('viewallproduct');
Route::get('/addtocart/{id}', [UserController::class, 'addtocart'])
    ->middleware(['auth', 'verified'])->name('add_to_cart');

Route::get('/cartproducts', [UserController::class, 'cartproducts'])->middleware(['auth', 'verified'])->name('cartproducts');
Route::get('/removecartproduct/{id}', [UserController::class, 'removecartproduct'])->middleware(['auth', 'verified'])->name('removecartproduct');
Route::post('/confirm_order', [UserController::class, 'confirmOrder'])->middleware(['auth', 'verified'])->name('confirm_order');

Route::get('/dashboard', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/myorders', [UserController::class, 'myorders'])
    ->middleware(['auth', 'verified'])->name('myorders');

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/add_category', [AdminController::class, "addcategory"])->name('admin.addcategory');
    Route::post('/add_category', [AdminController::class, "postaddcategory"])->name('admin.postaddcategory');
    Route::get('/view_category', [AdminController::class, "viewcategory"])->name('admin.viewcategory');
    Route::get('/delete_category/{id}', [AdminController::class, 'deleteCategory'])->name('admin.categorydelete');
    Route::get('/update_category/{id}', [AdminController::class, 'updatecategory'])->name('admin.categoryupdate');
    Route::post('/update_category/{id}', [AdminController::class, 'postupdatecategory'])->name('admin.postupdatecategory');

    Route::get('/add_product', [AdminController::class, 'addproduct'])->name('admin.addproduct');
    Route::post('/add_product', [AdminController::class, 'postaddproduct'])->name('admin.postaddproduct');
    Route::get('/view_product', [AdminController::class, 'viewproduct'])->name('admin.viewproduct');
    Route::get('/delete_product/{id}', [AdminController::class, 'deleteProduct'])->name('admin.productdelete');
    Route::get('/update_product/{id}', [AdminController::class, 'updateproduct'])->name('admin.updateproduct');
    Route::post('/update_product/{id}', [AdminController::class, 'postupdateproduct'])->name('admin.postupdateproduct');
    Route::any('/search', [AdminController::class, 'searchproduct'])->name('admin.searchproduct');
    Route::get('/view_orders', [AdminController::class, 'vieworders'])->name('admin.vieworders');
    Route::post('/change_status/{id}', [AdminController::class, 'changestatus'])->name('admin.change_status');
    Route::get('/downloadpdf/{id}', [AdminController::class, 'downloadpdf'])->name('admin.downloadpdf');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
