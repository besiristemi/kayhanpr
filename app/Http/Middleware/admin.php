<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin
{
    public function handle($request, Closure $next)
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        if (! Auth::user()->canAccessPanel()) {
            Auth::logout();

            return redirect()
                ->route('login')
                ->withErrors(['email' => 'Bu hesapla panele erişim yetkiniz yok.']);
        }

        return $next($request);
    }
}
