<?php

namespace App\Http\Middleware;
use Closure;
use App\UserStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class GuestMiddleware

{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and their status is ACTIVE
        if (!Auth::check() ) {
            return $next($request);
        }

        // Optionally, you can redirect or abort if the condition isn't met
        elseif(Auth::user()->hasRole('admin')){
            return redirect()->route('admin.dashboard');  // Or abort(403) if you want to restrict access
        }

        elseif(Auth::user()->hasRole('agent')){
            return redirect()->route('agent.ticket.index');  // Or abort(403) if you want to restrict access
        }

        else{
            return redirect()->route('customer.ticket.index');  // Or abort(403) if you want to restrict access
        }

    }
}
