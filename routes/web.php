<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    CartController,
    FreeTrialController,
    OnboardingController,
    PaymentSetupController,
    POSController,
    ProductController,
    SaleController,
    UserController,
    PaymentController,
    PaymentDetailsController
};
use Stripe\Stripe;

// Public Routes

Route::get('/', fn() => view('pos.home'));
Route::view('/home', 'pos.home')->name('home');
Route::view('/features', 'pos.features')->name('features');
Route::view('/pricing', 'pos.pricing')->name('pricing');
Route::view('/contact', 'pos.contact')->name('contact');
Route::view('/productManager', 'welcome')->name('welcome');


// Authentication


Route::view('/register', 'register')->name('register');
Route::post('/registerSave', [UserController::class, 'register'])->name('registerSave');

Route::view('/login', 'login')->name('login');
Route::post('/loginMatch', [UserController::class, 'login'])->name('loginMatch');

Route::post('/logout', [FreeTrialController::class, 'logout'])->name('logout');
Route::get('index', [UserController::class, 'indexPage'])->name('index');

//Free Trial


Route::view('/freetrial', 'pos.freetrial')->name('freetrial');
Route::view('/businessLogin', 'pos.freetriallogin')->name('freetriallogin');
Route::post('/business-login', [POSController::class, 'businessLogin'])->name('business-login');
Route::post('/freetrial', [FreeTrialController::class, 'store'])->name('freetrial.submit');


// Onboarding

Route::view('/onboarding', 'pos.onboarding')->name('onboarding');
Route::view('/onboarding/payment', 'pos.onboarding.paymentdetails')->name('setuppayment');

Route::prefix('pos/onboarding')->group(function () {
    Route::get('/product', [OnboardingController::class, 'product'])->name('onboarding-product');
    Route::get('/payment', [OnboardingController::class, 'payment'])->name('onboarding-payment');
    Route::post('/complete', [OnboardingController::class, 'complete'])->name('onboarding.complete');
});


//POS System Routes
Route::prefix('pos')->middleware(['auth', 'ensure.onboarded'])->group(function () {

    // POS Shop & Products
    Route::get('/products', [POSController::class, 'getProducts'])->name('pos.products');
    Route::get('/shop', [POSController::class, 'shop'])->name('shop');

    // POS Dashboard 
    Route::get('/dashboard', [PaymentDetailsController::class, 'index'])->name('dashboard');
     Route::get('/dashboard', [PaymentDetailsController::class, 'ordersdaily'])->name('dashboard'); 

    // Checkout & Payment
    Route::get('/checkout', [POSController::class, 'checkout'])->name('pos.checkout');
    Route::post('/complete-sale', [POSController::class, 'completeSale']);

    // Cart
    Route::get('/cart', [POSController::class, 'cart'])->name('cart');
    Route::post('/cart/add', [POSController::class, 'addToCart'])->name('addToCart');
    Route::post('/cart/update', [POSController::class, 'update'])->name('cart.update');
    Route::post('/cart/updateCart', [POSController::class, 'updateCartBadge'])->name('cart.updateCartbadge');
    Route::post('/cart/remove', [POSController::class, 'remove'])->name('cart.remove');
});


//Stripe Payment Routes
Route::get('/stripe', [PaymentDetailsController::class, 'stripeForm'])->name('stripe.form');
Route::post('/stripe/pay', [PaymentDetailsController::class, 'store'])->name('stripe.payment');
Route::post('/receipt/store', [PaymentDetailsController::class, 'storeReceiptDetails'])->name('stripe.receipt');
Route::get('/receipt/{id}', [PaymentDetailsController::class, 'show'])->name('receipt.view');


// Global Search
Route::get('/search', [POSController::class, 'search'])->name('search');


// Product Management (with prefix)
Route::prefix('products')->middleware(['auth'])->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/', [ProductController::class, 'store'])->name('products.store');
    Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});

//  PHP Info 
// 

Route::get('/phpinfo', fn() => phpinfo());
