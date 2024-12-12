<?php

namespace App\Http\Middleware;
use Closure;
use App\UserStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class UserActiveMiddleware

{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and their status is ACTIVE
        if (Auth::check() && Auth::user()->status == UserStatus::ACTIVE) {
            return $next($request);
        }

        // Optionally, you can redirect or abort if the condition isn't met
        Auth::logout();
        return redirect()->route('admin.login');  // Or abort(403) if you want to restrict access
    }
}
