<?php

namespace App\Http\Middleware;

use App\Http\Controllers\productController;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class Authenticate extends Middleware
{



  /**
     * 
     * 
     * 
     * 
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // protected function redirectTo(Request $request): ?string
    // {
    //     // return $request->expectsJson() ? null : route('login');
    //     // Route::middleware(['auth'])->group(function () {
    //     //     Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    //     //     Route::resource('products', productController::class);
    //     // });
    // }
}

