<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::view('/register', 'register')->name('register');
Route::post('registerSave', [UserController::class, 'register'])->name('registerSave');
Route::view('/login', 'login')->name('login');
Route::post('/loginMatch', [UserController::class, 'login'])->name('loginMatch');

// Dashboard & Static Pages
Route::get('index', [UserController::class, 'indexPage'])->name('index');
Route::view('create', 'create')->name('create');
Route::view('store', 'store')->name('store');
Route::view('show', 'show')->name('show');


// Role-based Access
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', fn() => 'Welcome Admin');
});

Route::middleware(['auth', 'role:manager,cashier'])->group(function () {
    Route::get('/pos', fn() => 'POS Area');
});

// ✅ Only this is needed for full CRUD: index, show, create, store, edit, update, destroy
Route::resource('products', ProductController::class);
