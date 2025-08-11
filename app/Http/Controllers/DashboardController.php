<?php

namespace App\Http\Controllers;

use App\Models\PanelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('panelauth.dashboard');
    }

    public function create()
    {
        $user = session('panel_user');
        if (!$user->is_super_admin) {
            abort(403, 'Unauthorized');
        }
        return view('panelauth.create');
    }

public function store(Request $request)
{
    $user = session('panel_user');
    if (!$user->is_super_admin) {
        abort(403, 'Unauthorized');
    }

    \App\Models\PanelUser::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'visible_password' => $request->password,
        'is_super_admin' => $request->has('is_super_admin'),
    ]);

    return redirect()->route('dashboard')->with('success', 'New admin created');
}
}
