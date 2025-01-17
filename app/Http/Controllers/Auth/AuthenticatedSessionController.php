<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{

    public function create(): View
    {
        return view('auth.login');
    }


    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();
        $request->session()->regenerate();
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect(route('tickets.index', absolute: false));
        }

        elseif ($user->hasRole('customer')) {
            return redirect(route('customer.ticket.index', absolute: false));
        }

        elseif($user->hasRole('agent')) {
            return redirect(route('agent.ticket.index', absolute: false));
        }

        else {
            return redirect('/ss');
        }

    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
