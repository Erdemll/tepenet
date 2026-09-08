<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDiscoveryRequest extends FormRequest
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
            'telefon' => ['required', 'string', 'max:20', 'regex:/^\+?[0-9\s().-]{10,20}$/'],
            'email' => ['nullable', 'email:rfc', 'max:255'],
            'urun_grubu' => ['required', Rule::in(['kamera', 'alarm', 'diger'])],
            'il' => ['required', Rule::in(['bursa', 'istanbul', 'ankara'])],
            'isyeri_talebi' => ['required', 'boolean'],
            'sube_sayisi' => [
                Rule::excludeIf(! $this->boolean('isyeri_talebi')),
                Rule::requiredIf($this->boolean('isyeri_talebi')),
                'integer',
                'min:1',
                'max:10000',
            ],
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
            'ad.required' => 'Lütfen adınızı girin.',
            'ad.max' => 'Ad en fazla 100 karakter olabilir.',
            'soyad.required' => 'Lütfen soyadınızı girin.',
            'soyad.max' => 'Soyad en fazla 100 karakter olabilir.',
            'telefon.required' => 'Lütfen telefon numaranızı girin.',
            'telefon.regex' => 'Lütfen geçerli bir telefon numarası girin.',
            'telefon.max' => 'Telefon numarası en fazla 20 karakter olabilir.',
            'email.email' => 'Lütfen geçerli bir e-posta adresi girin.',
            'urun_grubu.required' => 'Lütfen bir ürün grubu seçin.',
            'urun_grubu.in' => 'Lütfen geçerli bir ürün grubu seçin.',
            'il.required' => 'Lütfen bir il seçin.',
            'il.in' => 'Lütfen geçerli bir il seçin.',
            'sube_sayisi.required' => 'İş yeri talepleri için şube sayısını girin.',
            'sube_sayisi.integer' => 'Şube sayısı tam sayı olmalıdır.',
            'sube_sayisi.min' => 'Şube sayısı en az 1 olmalıdır.',
            'sube_sayisi.max' => 'Şube sayısı en fazla 10.000 olabilir.',
            'kvkk_onayi.accepted' => 'Devam etmek için aydınlatma metnini onaylayın.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'isyeri_talebi' => $this->boolean('isyeri_talebi'),
            'kampanya_izni' => $this->boolean('kampanya_izni'),
            'kvkk_onayi' => $this->boolean('kvkk_onayi'),
        ]);
    }
}
