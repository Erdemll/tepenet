<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule;

class StoreContactRequest extends FormRequest
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
            'ad' => ['required', 'string', 'max:100'],
            'soyad' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email:rfc', 'max:255'],
            'telefon' => ['required', 'string', 'regex:/^5[0-9]{9}$/'],
            'il' => ['nullable', Rule::in(array_keys(Config::array('iller')))],
            'ilce' => [
                Rule::excludeIf(! $this->filled('il')),
                'nullable',
                'string',
                'max:100',
            ],
            'konu' => [
                'nullable',
                Rule::in(['bilgi', 'memnuniyet', 'oneri', 'sikayet', 'talep', 'yetkili-servis', 'yetkili-satici']),
            ],
            'mesaj' => ['nullable', 'string', 'max:5000'],
            'kampanya_izni' => ['required', 'boolean'],
            'tercih_telefon' => [Rule::excludeIf(! $this->boolean('kampanya_izni')), 'boolean'],
            'tercih_email' => [Rule::excludeIf(! $this->boolean('kampanya_izni')), 'boolean'],
            'tercih_sms' => [Rule::excludeIf(! $this->boolean('kampanya_izni')), 'boolean'],
            'kvkk_onayi' => ['accepted'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'ad.required' => 'Lütfen adınızı girin.',
            'ad.max' => 'Ad en fazla 100 karakter olabilir.',
            'soyad.required' => 'Lütfen soyadınızı girin.',
            'soyad.max' => 'Soyad en fazla 100 karakter olabilir.',
            'email.required' => 'Lütfen e-posta adresinizi girin.',
            'email.email' => 'Lütfen geçerli bir e-posta adresi girin.',
            'telefon.required' => 'Lütfen telefon numaranızı girin.',
            'telefon.regex' => 'Telefon numarası 5 ile başlayan 10 haneden oluşmalıdır.',
            'il.in' => 'Lütfen geçerli bir il seçin.',
            'ilce.max' => 'İlçe en fazla 100 karakter olabilir.',
            'konu.in' => 'Lütfen geçerli bir konu seçin.',
            'mesaj.max' => 'Mesaj en fazla 5.000 karakter olabilir.',
            'kvkk_onayi.accepted' => 'Devam etmek için aydınlatma metnini onaylayın.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'kampanya_izni' => $this->boolean('kampanya_izni'),
            'tercih_telefon' => $this->boolean('tercih_telefon'),
            'tercih_email' => $this->boolean('tercih_email'),
            'tercih_sms' => $this->boolean('tercih_sms'),
            'kvkk_onayi' => $this->boolean('kvkk_onayi'),
        ]);
    }
}
