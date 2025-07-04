<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
   public function handle($request, closure $next,...$roles){
        
    if(!in_array(auth()->user()->role,$roles)){
      abort(403);
    }
     return $next($request);
   } 
    
   }

