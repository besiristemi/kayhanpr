<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class ContactSpamGuard
{
    public static function issueCaptcha(): array
    {
        $a = random_int(2, 12);
        $b = random_int(2, 12);
        Session::put('contact_captcha_sum', $a + $b);

        return ['a' => $a, 'b' => $b];
    }

    public static function validate(Request $request): ?string
    {
        if ($request->filled('company_website')) {
            return 'Mesaj gönderilemedi.';
        }

        $started = (int) $request->input('form_started_at', 0);
        if ($started <= 0 || (time() - $started) < 3) {
            return 'Lütfen formu doldurduktan sonra tekrar deneyin.';
        }

        if ((time() - $started) > 7200) {
            return 'Form süresi doldu. Sayfayı yenileyip tekrar deneyin.';
        }

        $expected = (int) Session::get('contact_captcha_sum', -1);
        $answer = (int) $request->input('captcha_answer', -999);
        Session::forget('contact_captcha_sum');

        if ($expected < 0 || $answer !== $expected) {
            return 'Güvenlik doğrulaması hatalı. Lütfen işlemi yeniden yapın.';
        }

        $ip = $request->ip();
        $key = 'contact_rate_' . md5($ip);
        $count = (int) Cache::get($key, 0);
        if ($count >= 5) {
            return 'Çok fazla deneme yaptınız. Lütfen bir saat sonra tekrar deneyin.';
        }
        Cache::put($key, $count + 1, now()->addHour());

        return null;
    }
}
