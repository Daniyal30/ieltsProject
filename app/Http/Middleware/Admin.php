<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (! auth()->check()) {
            return redirect()->route('login')->with('error', 'Please Login First');
        }

        if (! auth()->user()->hasRole('admin')) {
            abort(403, 'Access Denied! You are not Admin');
        }

        return $next($request);
    }
}
