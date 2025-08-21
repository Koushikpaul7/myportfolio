<?php

namespace App\Http\Controllers;

use App\Models\PanelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    // Show admin dashboard
    public function index()
    {
        return view('panelauth.dashboard');
    }

    // List all admins (Super Admin only)
    public function indexAdmins()
    {
        $user = session('panel_user');
        if (!$user->is_super) { // use 'is_super' here
            abort(403, 'Unauthorized');
        }

        $admins = PanelUser::all();
        return view('panelauth.index', compact('admins'));
    }

    // Show form to create new admin
    public function create()
    {
        $user = session('panel_user');
        if (!$user->is_super) { // use 'is_super' here
            abort(403, 'Unauthorized');
        }
        return view('panelauth.create');
    }

    // Store new admin in DB
    public function store(Request $request)
    {
        $user = session('panel_user');
        if (!$user->is_super) { // use 'is_super' here
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:panel_users,email',
            'password' => 'required|string|min:6',
            'is_super' => 'nullable|boolean',
        ]);

        PanelUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'visible_password' => $request->password,
            'is_super' => $request->has('is_super'), // this matches DB
        ]);

        return redirect()->route('backend.admin.index')->with('success', 'New admin created');
    }
}
