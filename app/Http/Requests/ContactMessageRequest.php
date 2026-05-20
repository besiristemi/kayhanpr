<?php

namespace App\Http\Requests;

use App\Services\ContactSpamGuard;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class ContactMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'adsoyad' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\pL\s\-\.]+$/u'],
            'email' => ['required', 'email', 'max:255'],
            'konu' => ['nullable', 'string', 'max:255'],
            'mesaj' => ['required', 'string', 'min:10', 'max:5000'],
            'captcha_answer' => ['required', 'integer'],
            'form_started_at' => ['required', 'integer'],
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        ContactSpamGuard::issueCaptcha();

        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }

    public function messages(): array
    {
        return [
            'adsoyad.required' => 'Ad soyad alanı zorunludur.',
            'adsoyad.min' => 'Ad soyad en az 3 karakter olmalıdır.',
            'adsoyad.regex' => 'Ad soyad yalnızca harf içerebilir.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi girin.',
            'mesaj.required' => 'Mesaj alanı zorunludur.',
            'mesaj.min' => 'Mesaj en az 10 karakter olmalıdır.',
            'captcha_answer.required' => 'Güvenlik sorusunu cevaplayın.',
        ];
    }
}
