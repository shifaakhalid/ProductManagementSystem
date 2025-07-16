<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FreeTrialController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\PaymentSetupController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::view('/register', 'register')->name('register');
Route::post('/registerSave', [UserController::class, 'register'])->name('registerSave');
Route::view('/login', 'login')->name('login');
Route::post('/loginMatch', [UserController::class, 'login'])->name('loginMatch');

// Dashboard & Static Pages
Route::get('index', [UserController::class, 'indexPage'])->name('index');
Route::view('create', 'create')->name('create');
Route::view('store', 'store')->name('store');
Route::view('show', 'show')->name('show');


// Role-based Access
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin', fn() => 'Welcome Admin');
// });

// Route::middleware(middleware: ['auth', 'role:manager,cashier'])->group(function () {
//     Route::get('/pos', fn() => 'POS Area');
// });

// Route::middleware(['auth'])->group(function () {
//     Route::resource('products', ProductController::class);
    // ya individually:
    // Route::get('/dashboard', [DashboardController::class, 'index']);
// });



// full CRUD: index, show, create, store, edit, update, destroy
Route::resource('products', ProductController::class);

Route::post('/logout', function () {
    Auth::logout(); 
    return redirect('/login'); 
})->name('logout');

Route::get('/phpinfo', function () {
    phpinfo();
});

Route::view('/home', 'pos.home')->name('home');
Route::view('/features', 'pos.features')->name('features');
Route::view('/pricing', 'pos.pricing')->name('pricing');
Route::view('/contact', 'pos.contact')->name('contact');

// Free Trial
Route::view('/freetrial', 'pos.freetrial')->name('freetrial');
Route::view('/businessLogin', 'pos.freetriallogin')->name('freetriallogin');
Route::post('/business-login', [POSController::class, 'businessLogin'])->name('business-login');
Route::post('/freetrial', [FreeTrialController::class, 'store'])->name('freetrial.submit');

// Onboarding
Route::view('/onboarding', 'pos.onboarding')->name('onboarding');

Route::get('/onboarding/payment', [OnboardingController::class, 'payment'])->name('onboarding.payment');
Route::get('/pos/onboarding/product', [OnboardingController::class, 'product'])->name('onboarding-product');
Route::post('pos/onboarding/complete', [OnboardingController::class, 'complete'])->name('onboarding.complete');
Route::get('/pos/onboarding/payment', [OnboardingController::class, 'payment'])->name('onboarding-payment');
// Route::get('/pos/onboarding/paymentdetails', [OnboardingController::class, 'paymentdetails'])->name('onboarding-payment');

Route::view('/pos/onboarding/paymentdetails', 'pos.onboarding.paymentdetails')->name('paymentdetails');
Route::post('/pos/onboarding/paymentdetails', [PaymentSetupController::class, 'storePaymentDetails'])->name('onboarding.payment.details.store');

//products shop
Route::get('/pos/products', [POSController::class, 'getProducts'])->name('pos.products');
Route::get('/shop', [POSController::class, 'shop'])->name('shop');
// Route::view('/shop', [POSController::class, 'shop'])->name('shop');
//search
Route::get('/search', [POSController::class, 'search'])->name('search');

//dashboard
Route::view('/pos/dashboard', 'pos.posdashboard')->name('dashboard');


// cart
Route::post('/pos/complete-sale', [POSController::class, 'completeSale']);
Route::post('/cart/add', [POSController::class, 'addToCart'])->name('addToCart');
Route::post('/cart/update', [POSController::class, 'update'])->name('cart.update');
Route::post('/cart/updateCart', [POSController::class, 'updateCartBadge'])->name('cart.updateCartbadge');
Route::post('/cart/remove', [POSController::class, 'remove'])->name('cart.remove');
Route::get('/cart', [POSController::class, 'cart'])->name('cart');
// Route::get('/checkout',[POSController::class, 'store']);