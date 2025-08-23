<?php

namespace App\Http\Controllers;

use App\Models\PanelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PanelAuthController extends Controller
{
    // Show login form
    public function loginForm()
    {
        return view('panelauth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = PanelUser::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Store entire user in session
            session(['panel_user' => $user]);
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Invalid credentials.');
    }

    // Logout
    public function logout()
    {
        session()->forget('panel_user');
        return redirect()->route('panel.login')->with('success', 'Logged out successfully.');
    }
}
