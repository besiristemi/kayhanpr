<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/yonetim';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function maxAttempts(): int
    {
        return 3;
    }

    protected function decayMinutes(): int
    {
        return 30;
    }

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = RateLimiter::availableIn($this->throttleKey($request));
        $minutes = (int) ceil($seconds / 60);

        throw ValidationException::withMessages([
            'email' => "Çok fazla hatalı giriş denemesi. Lütfen {$minutes} dakika sonra tekrar deneyin.",
        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $remaining = RateLimiter::remaining($this->throttleKey($request), $this->maxAttempts());

        throw ValidationException::withMessages([
            'email' => $remaining > 0
                ? "E-posta veya şifre hatalı. Kalan deneme hakkı: {$remaining}."
                : 'E-posta veya şifre hatalı.',
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        if (! $user->canAccessPanel()) {
            $this->guard()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            throw ValidationException::withMessages([
                'email' => 'Bu hesabın yönetim paneline erişim yetkisi bulunmuyor.',
            ]);
        }
    }
}
