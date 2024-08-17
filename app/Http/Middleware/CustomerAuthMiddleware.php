<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Check authentication logic here
        if (!auth()->check()) {
            // Redirect or respond with unauthorized message
            return redirect()->route('customer.login');
        }

        // User is authenticated, continue to the requested route
        return $next($request);
    }


}
