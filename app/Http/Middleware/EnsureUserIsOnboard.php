<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsOnboard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

 $user = auth()->user();

    if (!$user) {
        return redirect('/freetrial');
       
    }

  
      switch ($user->onboarding_step) {
        case 'step1':
            return redirect()->route('welcome');
        default:
            return $next($request);
    }
}
}