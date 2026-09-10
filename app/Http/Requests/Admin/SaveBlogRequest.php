<?php

namespace App\Http\Requests\Admin;

use App\Support\BlogHtmlSanitizer;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SaveBlogRequest extends FormRequest
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
            'baslik' => ['required', 'string', 'max:255'],
            'icerik' => ['required', 'string', 'max:100000'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'baslik.required' => 'Blog başlığını girin.',
            'icerik.required' => 'Blog içeriğini girin.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'baslik' => $this->string('baslik')->trim()->toString(),
            'icerik' => app(BlogHtmlSanitizer::class)->sanitize((string) $this->input('icerik', '')),
        ]);
    }
}
