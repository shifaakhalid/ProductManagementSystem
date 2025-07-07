<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::view('/register', 'register')->name('register');
Route::post('/registerSave', [UserController::class, 'registerSave'])->name('registerSave');
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

Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
    // ya individually:
    // Route::get('/dashboard', [DashboardController::class, 'index']);
});



// ✅ Only this is needed for full CRUD: index, show, create, store, edit, update, destroy
Route::resource('products', ProductController::class);

Route::post('/logout', function () {
    Auth::logout(); // ← logs the user out
    return redirect('/login'); // ← redirect to login or homepage
})->name('logout');

Route::get('/phpinfo', function () {
    phpinfo();
});
