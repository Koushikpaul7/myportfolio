<?php

namespace App\Http\Controllers;

use App\Models\PanelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PanelAuthController extends Controller
{
    /**
     * Show login form
     */
    public function loginForm()
    {
        return view('panelauth.login'); // blade in resources/views/panelauth/login.blade.php
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = PanelUser::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Store only the user ID in session
            session(['panel_user_id' => $user->id]);

            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Invalid Credentials');
    }

    /**
     * Logout the user
     */
    public function logout()
    {
        session()->forget('panel_user_id');
        return redirect()->route('panel.login');
    }
}
