<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;
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
        $isCorporateRequest = $this->input('source_page') === 'kurumsal-cozumler';

        return [
            'source_page' => [
                'nullable',
                Rule::in([
                    'ev-guvenligi',
                    'ev-guvenligi-nelerden-olusur',
                    'is-yeri-guvenligi',
                    'is-yeri-guvenligi-nelerden-olusur',
                    'kurumsal-cozumler',
                ]),
            ],
            'ad' => ['required', 'string', 'max:100'],
            'soyad' => ['required', 'string', 'max:100'],
            'telefon' => ['required', 'string', 'max:20', 'regex:/^\+?[0-9\s().-]{10,20}$/'],
            'email' => ['nullable', 'email:rfc', 'max:255'],
            'urun_grubu' => ['required', Rule::in(['kamera', 'alarm', 'diger'])],
            'il' => ['required', Rule::in(array_keys(Config::array('iller')))],
            'firma_adi' => [
                Rule::excludeIf(! $isCorporateRequest),
                Rule::requiredIf($isCorporateRequest),
                'string',
                'max:150',
            ],
            'kurum_turu' => [
                Rule::excludeIf(! $isCorporateRequest),
                Rule::requiredIf($isCorporateRequest),
                Rule::in(['magaza', 'ofis', 'fabrika', 'otel', 'diger']),
            ],
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
            'source_page.in' => 'Kaynak sayfa bilgisi geçersiz.',
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
            'firma_adi.required' => 'Lütfen firma adını girin.',
            'firma_adi.max' => 'Firma adı en fazla 150 karakter olabilir.',
            'kurum_turu.required' => 'Lütfen kurum türünü seçin.',
            'kurum_turu.in' => 'Lütfen geçerli bir kurum türü seçin.',
            'sube_sayisi.required' => 'İş yeri talepleri için şube sayısını girin.',
            'sube_sayisi.integer' => 'Şube sayısı tam sayı olmalıdır.',
            'sube_sayisi.min' => 'Şube sayısı en az 1 olmalıdır.',
            'sube_sayisi.max' => 'Şube sayısı en fazla 10.000 olabilir.',
            'kvkk_onayi.accepted' => 'Devam etmek için aydınlatma metnini onaylayın.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $preparedInput = [
            'isyeri_talebi' => $this->boolean('isyeri_talebi'),
            'kampanya_izni' => $this->boolean('kampanya_izni'),
            'kvkk_onayi' => $this->boolean('kvkk_onayi'),
        ];

        if ($this->input('source_page') === 'kurumsal-cozumler') {
            $preparedInput['urun_grubu'] = 'diger';
            $preparedInput['isyeri_talebi'] = true;
        }

        $this->merge($preparedInput);
    }
}
