@props([
  'name',
  'label',
  'required' => false,
  'hint' => null,
])

<div {{ $attributes }}>
  <label for="{{ $name }}" class="block text-sm font-semibold text-slate-800">
    {{ $label }}
    @if ($required)
      <span class="text-red-700" aria-hidden="true">*</span>
    @endif
  </label>
  <div class="mt-2">{{ $slot }}</div>
  @if ($hint && ! $errors->has($name))
    <p class="mt-2 text-xs leading-5 text-slate-500">{{ $hint }}</p>
  @endif
  @error($name)
    <p class="mt-2 text-sm font-medium text-red-700" role="alert">{{ $message }}</p>
  @enderror
</div>
