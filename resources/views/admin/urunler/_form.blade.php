@php
  $inputClass = 'block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-950 outline-none transition placeholder:text-slate-400 focus:border-red-700 focus:ring-4 focus:ring-red-100';
@endphp

<div class="grid gap-6 lg:grid-cols-2">
  <x-admin.form-field name="baslik" label="Ürün başlığı" required>
    <input id="baslik" name="baslik" type="text" value="{{ old('baslik', $urun->baslik) }}" required maxlength="255" class="{{ $inputClass }}" />
  </x-admin.form-field>

  <x-admin.form-field name="kategori_id" label="Kategori" required>
    <select id="kategori_id" name="kategori_id" required class="{{ $inputClass }}">
      <option value="">Kategori seçin</option>
      @foreach ($kategoriler as $kategori)
        <option value="{{ $kategori->id }}" @selected((string) old('kategori_id', $urun->kategori_id) === (string) $kategori->id)>{{ $kategori->baslik }}</option>
      @endforeach
    </select>
  </x-admin.form-field>

  <x-admin.form-field name="urun_kodu" label="Ürün kodu" required hint="Ürün kodları benzersiz olmalıdır.">
    <input id="urun_kodu" name="urun_kodu" type="text" value="{{ old('urun_kodu', $urun->urun_kodu) }}" required maxlength="100" placeholder="TP-1001" class="{{ $inputClass }}" />
  </x-admin.form-field>

  <x-admin.form-field name="slug" label="Ürün bağlantısı" hint="Boş bırakırsanız başlıktan otomatik oluşturulur.">
    <input id="slug" name="slug" type="text" value="{{ old('slug', $urun->slug) }}" maxlength="255" placeholder="ornek-urun" class="{{ $inputClass }}" />
  </x-admin.form-field>

  <x-admin.form-field name="aciklama" label="Ürün açıklaması" required class="lg:col-span-2">
    <textarea id="aciklama" name="aciklama" rows="7" required maxlength="10000" class="{{ $inputClass }}">{{ old('aciklama', $urun->aciklama) }}</textarea>
  </x-admin.form-field>

  <x-admin.form-field name="resim" label="Ürün resmi" hint="JPG, JPEG, PNG veya WEBP; en fazla 5 MB." class="lg:col-span-2">
    <input id="resim" name="resim" type="file" accept="image/jpeg,image/png,image/webp" class="block w-full rounded-xl border border-slate-300 bg-white text-sm text-slate-600 file:mr-4 file:border-0 file:bg-slate-100 file:px-4 file:py-3 file:font-semibold file:text-slate-700 hover:file:bg-slate-200 focus:outline-none focus:ring-4 focus:ring-red-100" />
  </x-admin.form-field>

  @if ($urun->exists && $urun->resimUrl())
    <div class="flex flex-col gap-4 rounded-2xl border border-slate-200 bg-slate-50 p-4 sm:flex-row sm:items-center lg:col-span-2">
      <img src="{{ $urun->resimUrl() }}" alt="{{ $urun->baslik }} mevcut resmi" class="size-28 rounded-xl border border-slate-200 bg-white object-contain p-2" />
      <div>
        <p class="text-sm font-semibold text-slate-800">Mevcut ürün resmi</p>
        <p class="mt-1 text-xs leading-5 text-slate-500">Yeni bir resim seçerseniz bu dosya otomatik olarak silinir.</p>
        <input type="hidden" name="resmi_sil" value="0" />
        <label class="mt-3 inline-flex cursor-pointer items-center gap-2 text-sm font-medium text-red-700">
          <input name="resmi_sil" type="checkbox" value="1" @checked((bool) old('resmi_sil')) class="size-4 rounded border-slate-300 text-red-700 focus:ring-red-600" />
          Yeni resim yüklemeden mevcut resmi kaldır
        </label>
      </div>
    </div>
  @endif
</div>

<div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">
  <a href="{{ route('admin.urunler.index') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Vazgeç</a>
  <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-red-700 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-200">{{ $submitLabel }}</button>
</div>
