<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/home', function () {
    return view('Frontend.index');
});

// Route::get('/shop', function () {
//     return view('Frontend.shop');
// });
Route::get('/shop',[FrontendController::class,'Index'])->name('Frontend.shop');

Route::get('/contact', function () {
    return view('Frontend.contact');
});
Route::get('/admin/dashboard', function () {
    return view('Admin.dashboard');
})->middleware('auth')->name('admin.dashboard');



// Route::get('/addCategory', function () {
//     return view('Admin.Category.create');
// });

//Category routes
Route::get('/addCategory',[CategoryController::class,'Create'])->name('admin.addCategory');
Route::post('/addCategory',[CategoryController::class,'Store'])->name('admin.storeCategory');
Route::get('/manageCategory',[CategoryController::class,'Index'])->name('admin.manageCategory');
Route::delete('/deleteCategory/{id}',[CategoryController::class,'Delete'])->name('admin.deleteCategory');
Route::get('/editCategory/{id}',[CategoryController::class,'Edit'])->name('admin.editCategory');
Route::put('/updateCategory/{id}',[CategoryController::class,'Update'])->name('admin.updateCategory');


//Products Routes
Route::get('/admin/addProduct',[ProductController::class,'Create'])->name('admin.addProduct');
Route::post('/admin/addProduct',[ProductController::class,'Store'])->name('admin.storeProduct');
Route::get('/admin/AllProduct',[ProductController::class,'Index'])->name('admin.manageProduct');
Route::delete('admin/deleteProduct/{id}',[ProductController::class,'Delete'])->name('admin.deleteProduct');
