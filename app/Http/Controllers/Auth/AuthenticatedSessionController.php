<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $agent = new Agent;

        if ($agent->isMobile()) {
            return view('mobiles.auth.login');
        } elseif ($agent->isDesktop()) {
            return view('desktop.auth.login');
        } else {
            // Jika bukan perangkat mobile atau desktop, Anda bisa mengembalikan tampilan default di sini.
            return view('desktop.auth.login');
        }
        
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
    
        $request->session()->regenerate();
    
        // Pengecekan apakah pengguna memiliki peran "employee"
        // if ($request->user()->hasRole('employee')) {
        //     return redirect(RouteServiceProvider::EMPLOYEE);
        // }
    
        return redirect()->intended(RouteServiceProvider::HOME);
    }    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if (Auth::user()) {
            if (Auth::user()->hasRole('employee')) {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/login');
            }
        }
    
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }    
    
}
