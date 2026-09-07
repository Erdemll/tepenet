<?php

namespace App\Http\Requests\Admin;

use App\Models\IsIlani;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SaveIsIlaniRequest extends FormRequest
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
        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'alpha_dash:ascii',
                'max:255',
                Rule::unique('is_ilanlari', 'slug')->ignore($this->route('isIlani')),
            ],
            'summary' => ['required', 'string', 'max:1000'],
            'type' => ['required', Rule::in(array_keys(IsIlani::typeLabels()))],
            'cities' => ['required', 'array', 'min:1', 'max:81'],
            'cities.*' => ['required', 'string', 'max:100', 'distinct'],
            'employment_type' => ['required', 'string', 'max:100'],
            'application_deadline' => ['nullable', Rule::date()->format('Y-m-d')],
            'is_active' => ['required', 'boolean'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'İlan başlığını girin.',
            'slug.required' => 'İlan bağlantısını girin.',
            'slug.unique' => 'Bu ilan bağlantısı daha önce kullanılmış.',
            'summary.required' => 'İlan özetini girin.',
            'type.required' => 'Pozisyon tipini seçin.',
            'type.in' => 'Geçerli bir pozisyon tipi seçin.',
            'cities.required' => 'En az bir şehir girin.',
            'cities.min' => 'En az bir şehir girin.',
            'employment_type.required' => 'Çalışma şeklini girin.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $title = $this->string('title')->trim()->toString();
        $slug = $this->string('slug')->trim()->toString();
        $citiesInput = $this->input('cities', []);

        if (is_string($citiesInput)) {
            $citiesInput = preg_split('/[\r\n,;]+/u', $citiesInput) ?: [];
        }

        $cities = collect(Arr::wrap($citiesInput))
            ->filter(fn (mixed $city): bool => is_string($city))
            ->map(fn (string $city): string => trim($city))
            ->filter()
            ->unique()
            ->values()
            ->all();

        $this->merge([
            'title' => $title,
            'slug' => Str::slug($slug !== '' ? $slug : $title),
            'cities' => $cities,
            'employment_type' => $this->string('employment_type')->trim()->toString(),
            'is_active' => $this->boolean('is_active'),
        ]);
    }
}
