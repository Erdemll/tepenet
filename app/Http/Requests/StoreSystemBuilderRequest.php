<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSystemBuilderRequest extends FormRequest
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
            'talep_alani' => ['required', Rule::in(['Ev', 'İş Yeri'])],
            'risk_durumu' => ['required', Rule::in(['Evet', 'Hayır'])],
            'riskli_nokta_sayisi' => [
                Rule::excludeIf($this->input('risk_durumu') !== 'Evet'),
                Rule::requiredIf($this->input('risk_durumu') === 'Evet'),
                'integer',
                'min:1',
                'max:50',
            ],
            'sistem_tercihi' => ['required', Rule::in(['Kablolu', 'Kablosuz'])],
            'ad' => ['required', 'string', 'max:100'],
            'soyad' => ['required', 'string', 'max:100'],
            'telefon' => ['required', 'string', 'max:20', 'regex:/^\+?[0-9\s().-]{10,20}$/'],
            'email' => ['nullable', 'email:rfc', 'max:255'],
            'il' => ['required', Rule::in(['bursa', 'istanbul', 'ankara'])],
            'not' => ['nullable', 'string', 'max:2000'],
            'kampanya_izni' => ['required', 'boolean'],
            'kvkk_onayi' => ['accepted'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'talep_alani.required' => 'Lütfen kullanım alanını seçin.',
            'talep_alani.in' => 'Lütfen geçerli bir kullanım alanı seçin.',
            'risk_durumu.required' => 'Lütfen riskli nokta durumunu seçin.',
            'risk_durumu.in' => 'Lütfen geçerli bir risk durumu seçin.',
            'riskli_nokta_sayisi.required' => 'Risk bulunan alanlar için kapı ve pencere sayısını girin.',
            'riskli_nokta_sayisi.integer' => 'Kapı ve pencere sayısı tam sayı olmalıdır.',
            'riskli_nokta_sayisi.min' => 'Kapı ve pencere sayısı en az 1 olmalıdır.',
            'riskli_nokta_sayisi.max' => 'Kapı ve pencere sayısı en fazla 50 olabilir.',
            'sistem_tercihi.required' => 'Lütfen sistem tercihinizi seçin.',
            'sistem_tercihi.in' => 'Lütfen geçerli bir sistem tercihi seçin.',
            'ad.required' => 'Lütfen adınızı girin.',
            'ad.max' => 'Ad en fazla 100 karakter olabilir.',
            'soyad.required' => 'Lütfen soyadınızı girin.',
            'soyad.max' => 'Soyad en fazla 100 karakter olabilir.',
            'telefon.required' => 'Lütfen telefon numaranızı girin.',
            'telefon.regex' => 'Lütfen geçerli bir telefon numarası girin.',
            'telefon.max' => 'Telefon numarası en fazla 20 karakter olabilir.',
            'email.email' => 'Lütfen geçerli bir e-posta adresi girin.',
            'il.required' => 'Lütfen bir il seçin.',
            'il.in' => 'Lütfen geçerli bir il seçin.',
            'not.max' => 'Not en fazla 2.000 karakter olabilir.',
            'kvkk_onayi.accepted' => 'Devam etmek için aydınlatma metnini onaylayın.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'kampanya_izni' => $this->boolean('kampanya_izni'),
            'kvkk_onayi' => $this->boolean('kvkk_onayi'),
        ]);
    }
}
