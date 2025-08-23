<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PanelAuthMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = session('panel_user');

        // If no user in session, redirect to login
        if (!$user) {
            return redirect()->route('panel.login')->with('error', 'Please login first.');
        }

        // Share the user globally with all Blade views
        view()->share('panelUser', $user);

        return $next($request);
    }
}
