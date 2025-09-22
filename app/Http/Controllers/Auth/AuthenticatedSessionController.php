<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    public function store(Request $request): RedirectResponse
    {
       
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

       
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
           
            $request->session()->regenerate();

           
            if (Auth::user()->email === 'admin123@gmail.com') {
                return redirect()->route('admin.dashboard');
            }

           
            return redirect()->route('home');
        }

      
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}