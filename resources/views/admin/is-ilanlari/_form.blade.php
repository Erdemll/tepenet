@php
  $oldCities = old('cities');
  $citiesValue = is_array($oldCities)
    ? implode(PHP_EOL, $oldCities)
    : ($oldCities ?? implode(PHP_EOL, $isIlani->cities ?? []));
  $inputClass = 'block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-950 outline-none transition placeholder:text-slate-400 focus:border-red-700 focus:ring-4 focus:ring-red-100';
@endphp

<div class="grid gap-6 lg:grid-cols-2">
  <x-admin.form-field name="title" label="İlan başlığı" required>
    <input id="title" name="title" type="text" value="{{ old('title', $isIlani->title) }}" required maxlength="255" class="{{ $inputClass }}" />
  </x-admin.form-field>

  <x-admin.form-field name="slug" label="İlan bağlantısı" hint="Boş bırakırsanız başlıktan otomatik oluşturulur.">
    <input id="slug" name="slug" type="text" value="{{ old('slug', $isIlani->slug) }}" maxlength="255" placeholder="ornek-is-ilani" class="{{ $inputClass }}" />
  </x-admin.form-field>

  <x-admin.form-field name="type" label="Pozisyon tipi" required>
    <select id="type" name="type" required class="{{ $inputClass }}">
      @foreach ($typeOptions as $value => $label)
        <option value="{{ $value }}" @selected(old('type', $isIlani->type) === $value)>{{ $label }}</option>
      @endforeach
    </select>
  </x-admin.form-field>

  <x-admin.form-field name="employment_type" label="Çalışma şekli" required>
    <input id="employment_type" name="employment_type" type="text" value="{{ old('employment_type', $isIlani->employment_type ?? 'Tam zamanlı') }}" required maxlength="100" class="{{ $inputClass }}" />
  </x-admin.form-field>

  <x-admin.form-field name="summary" label="İlan özeti" required class="lg:col-span-2">
    <textarea id="summary" name="summary" rows="4" required maxlength="1000" class="{{ $inputClass }}">{{ old('summary', $isIlani->summary) }}</textarea>
  </x-admin.form-field>

  <x-admin.form-field name="cities" label="Şehirler" required hint="Her satıra bir şehir yazabilir veya şehirleri virgülle ayırabilirsiniz." class="lg:col-span-2">
    <textarea id="cities" name="cities" rows="5" required class="{{ $inputClass }}">{{ $citiesValue }}</textarea>
  </x-admin.form-field>

  <x-admin.form-field name="application_deadline" label="Son başvuru tarihi" hint="Boş bırakırsanız ilanda “Sürekli” gösterilir.">
    <input id="application_deadline" name="application_deadline" type="date" value="{{ old('application_deadline', $isIlani->application_deadline?->format('Y-m-d')) }}" class="{{ $inputClass }}" />
  </x-admin.form-field>

  <div class="flex items-center lg:pt-7">
    <input type="hidden" name="is_active" value="0" />
    <label class="inline-flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3">
      <input id="is_active" name="is_active" type="checkbox" value="1" @checked((bool) old('is_active', $isIlani->exists ? $isIlani->is_active : true)) class="size-4 rounded border-slate-300 text-red-700 focus:ring-red-600" />
      <span>
        <span class="block text-sm font-semibold text-slate-800">İlan yayında</span>
        <span class="mt-0.5 block text-xs text-slate-500">Kapalıysa ilan public sayfada görünmez.</span>
      </span>
    </label>
  </div>
</div>

<div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">
  <a href="{{ route('admin.is-ilanlari.index') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Vazgeç</a>
  <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-red-700 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-200">{{ $submitLabel }}</button>
</div>
