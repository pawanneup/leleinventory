<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('welcome');});

Route::get('/register', [RegistrationController::class, 'index'])->name('user.showRegister');
Route::post('/register', [RegistrationController::class, 'insert'])->name('user.register');

Route::get('/login', [LoginController::class, 'index'])->name('user.showLogin');
Route::post('/login', [LoginController::class, 'insert'])->name('user.login');

Route::get('/logout', [LoginController::class, 'logout'])->name('user.logout');

Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->get('/category', [CategoryController::class, 'view' ])->name('category');
Route::middleware('auth')->post('/category', [CategoryController::class, 'store'])->name('store.category');
Route::middleware('auth')->get('/category/delete/{id}',[CategoryController::class,'delete'])->name("category.delete");

Route::middleware('auth')->get('/products', [ProductController::class, 'index'])->name('product.index');
Route::middleware('auth')->post('/products', [ProductController::class, 'store'])->name('store.product');
Route::middleware('auth')->get('/product/delete/{id}', [ProductController::class, 'delete'])->name("product.delete");
Route::middleware('auth')->get('/products/category/{category_id}', [ProductController::class, 'index'])->name('product.filter');


Route::middleware('auth')->get('/stock', [StockController::class, 'index' ])->name('stock');
Route::middleware('auth')->post('/stock', [StockController::class, 'store'])->name('store.stock');
Route::middleware('auth')->get('/stock/delete/{id}',[StockController::class,'delete'])->name("stock.delete");



