<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Placeholder for login logic
        return redirect()->route('admin.dashboard');
    }

    public function destroy(Request $request)
    {
        // Placeholder for logout logic
        return redirect()->route('home');
    }
}
