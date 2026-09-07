<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AdminLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'username.required' => 'Kullanıcı adınızı girin.',
            'password.required' => 'Parolanızı girin.',
        ];
    }

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $authenticated = Auth::attempt([
            'username' => $this->string('username')->toString(),
            'password' => $this->string('password')->toString(),
            'is_admin' => true,
        ]);

        if (! $authenticated) {
            RateLimiter::hit($this->throttleKey(), 60);

            throw ValidationException::withMessages([
                'username' => 'Kullanıcı adı veya parola hatalı.',
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'username' => Str::lower($this->string('username')->trim()->toString()),
        ]);
    }

    private function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'username' => "Çok fazla giriş denemesi yapıldı. {$seconds} saniye sonra tekrar deneyin.",
        ]);
    }

    private function throttleKey(): string
    {
        return Str::transliterate(
            Str::lower($this->string('username')->toString()).'|'.$this->ip()
        );
    }
}
