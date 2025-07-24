<?php
use Stripe\Stripe;
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


use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentDetailsController;





Route::get('/shop', [POSController::class, 'shop'])->name('shop');

Route::get('/',  function () {
    return view('pos.home');
});
Route::view('/productManager', 'welcome')->name('welcome');
// Auth Routes
Route::view('/register', 'register')->name('register');
Route::post('/registerSave', [UserController::class, 'register'])->name('registerSave');
Route::view('/login', 'login')->name('login');
Route::post('/loginMatch', [UserController::class, 'login'])->name('loginMatch');


Route::get('index', [UserController::class, 'indexPage'])->name('index');

Route::resource('products', ProductController::class)->names([
    'index' => 'products.index',
    'create' => 'products.create',
    'store' => 'products.store',
    'show' => 'products.show',
    'edit' => 'products.edit',
    'update' => 'products.update',
    'destroy' => 'products.destroy',
]);




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

// Route::get('/onboarding/payment', [OnboardingController::class, 'payment'])->name('onboarding.payment');
Route::view('/onboarding/payment', 'pos.onboarding.paymentdetails')->name('setuppayment');

Route::get('/pos/onboarding/product', [OnboardingController::class, 'product'])->name('onboarding-product');
Route::post('pos/onboarding/complete', [OnboardingController::class, 'complete'])->name('onboarding.complete');
Route::get('/pos/onboarding/payment', [OnboardingController::class, 'payment'])->name('onboarding-payment');
// Route::get('/pos/onboarding/paymentdetails', [OnboardingController::class, 'paymentdetails'])->name('onboarding-payment');

// Route::view('/pos/onboarding/paymentdetails', 'pos.onboarding.paymentdetails')->name('paymentdetails');
// Route::post('/pos/onboarding/paymentdetails', [PaymentSetupController::class, 'storePaymentDetails'])->name('onboarding.payment.details.store');

//products shop
Route::get('/pos/products', [POSController::class, 'getProducts'])->name('pos.products');

//search
Route::get('/search', [POSController::class, 'search'])->name('search');

//dashboard
Route::get('/pos/dashboard', [PaymentDetailsController::class, 'index'])
    ->name('dashboard');

Route::get('/pos/dashboard', [PaymentDetailsController::class, 'ordersdaily'])->name('dashboard');

// cart


Route::post('/pos/complete-sale', [POSController::class, 'completeSale']);
Route::post('/cart/add', [POSController::class, 'addToCart'])->name('addToCart');
Route::post('/cart/update', [POSController::class, 'update'])->name('cart.update');
Route::post('/cart/updateCart', [POSController::class, 'updateCartBadge'])->name('cart.updateCartbadge');
Route::post('/cart/remove', [POSController::class, 'remove'])->name('cart.remove');
Route::get('/cart', [POSController::class, 'cart'])->name('cart');
  
// Route::get('/checkout',[POSController::class, 'store']);


Route::get('/checkout', [POSController::class, 'checkout'])->name('pos.checkout');
Route::get('/stripe', [PaymentDetailsController::class, 'stripeForm'])->name('stripe.form');
Route::post('/stripe/pay', [PaymentDetailsController::class, 'store'])->name('stripe.payment');
Route::post('/receipt/store', [PaymentDetailsController::class, 'storeReceiptDetails'])->name('stripe.receipt');
Route::get('/receipt/{id}', [PaymentDetailsController::class, 'show'])->name('receipt.view');


//logout
Route::post('/logout', [FreeTrialController::class, 'logout'])->name('logout'); yeh mujhe maintain kar k dedo but please routes change nhi Karna qk system pehle hi bana hua 
