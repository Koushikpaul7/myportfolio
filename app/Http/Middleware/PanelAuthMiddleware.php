<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\PanelUser;

class PanelAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('panel_user_id')) {
            return redirect()->route('panel.login')->with('error', 'Please login first.');
        }

        $user = PanelUser::find(session('panel_user_id'));

        if (!$user) {
            session()->forget('panel_user_id');
            return redirect()->route('panel.login')->with('error', 'User not found.');
        }

        // Share logged-in user globally with views
        view()->share('panelUser', $user);

        return $next($request);
    }
}
