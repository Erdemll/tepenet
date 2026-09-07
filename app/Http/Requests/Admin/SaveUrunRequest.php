<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SaveUrunRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()?->can('access-admin') ?? false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $urun = $this->route('urun');

        return [
            'baslik' => ['required', 'string', 'max:255'],
            'kategori_id' => ['required', 'integer', Rule::exists('urun_kategoriler', 'id')],
            'aciklama' => ['required', 'string', 'max:10000'],
            'urun_kodu' => [
                'required',
                'string',
                'max:100',
                Rule::unique('urunler', 'urun_kodu')->ignore($urun),
            ],
            'slug' => [
                'required',
                'string',
                'alpha_dash:ascii',
                'max:255',
                Rule::unique('urunler', 'slug')->ignore($urun),
            ],
            'resim' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'resmi_sil' => ['sometimes', 'boolean'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'baslik.required' => 'Ürün başlığını girin.',
            'kategori_id.required' => 'Ürün kategorisini seçin.',
            'kategori_id.exists' => 'Geçerli bir ürün kategorisi seçin.',
            'aciklama.required' => 'Ürün açıklamasını girin.',
            'urun_kodu.required' => 'Ürün kodunu girin.',
            'urun_kodu.unique' => 'Bu ürün kodu daha önce kullanılmış.',
            'slug.required' => 'Ürün bağlantısını girin.',
            'slug.unique' => 'Bu ürün bağlantısı daha önce kullanılmış.',
            'resim.image' => 'Yüklenen dosya geçerli bir görsel olmalıdır.',
            'resim.mimes' => 'Ürün resmi JPG, JPEG, PNG veya WEBP formatında olmalıdır.',
            'resim.max' => 'Ürün resmi en fazla 5 MB olabilir.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $baslik = $this->string('baslik')->trim()->toString();
        $slug = $this->string('slug')->trim()->toString();

        $this->merge([
            'baslik' => $baslik,
            'aciklama' => $this->string('aciklama')->trim()->toString(),
            'urun_kodu' => Str::upper($this->string('urun_kodu')->trim()->toString()),
            'slug' => Str::slug($slug !== '' ? $slug : $baslik),
            'resmi_sil' => $this->boolean('resmi_sil'),
        ]);
    }
}
