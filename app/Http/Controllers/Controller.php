<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
{
    // $this->middleware(function ($request, $next) {
    //     $response = $next($request);

    //     return $response->header('Cache-Control','no-cache, no-store, must-revalidate')
    //                     ->header('Pragma','no-cache')
    //                     ->header('Expires','0');
    // });
}
}
