<?php

namespace App\Http\Controllers;

use App\Models\PanelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PanelAuthController extends Controller
{
    public function loginForm()
    {
        return view('panelauth.login');
    }

    public function login(Request $request)
    {
        $user = PanelUser::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('panel_user_id', $user->id);
            Session::put('is_super', $user->is_super);
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Invalid Credentials');
    }

   public function logout()
{
    session()->forget('panel_user_id');
    session()->forget('is_super');
    return redirect()->route('panel.login');
}
}
