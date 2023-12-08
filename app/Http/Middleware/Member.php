<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class Member
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } if (Auth::user()->role == 0) {
            return $next($request);
        } if (Auth::user()->role == 1) {
            return redirect()->route('editor');
        } if (Auth::user()->role == 2) {
            return redirect()->route('admin');
        } 

        

      
    }
}
