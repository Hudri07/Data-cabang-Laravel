<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginProses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        if (Auth::check()) {
            return redirect('login');
        }
        $user = Auth::user();

        if ($user->level == $roles)
            return $next($request);

        return redirect('login')->with('error', "Kamu tidak punya akses");
    }
}
