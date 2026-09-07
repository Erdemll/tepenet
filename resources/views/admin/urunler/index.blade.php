<x-admin.layout
  title="Ürünler"
  heading="Ürünler"
  active="urunler"
  description="Ürünleri arayın, sıralayın; görselleri ve kategori bilgileriyle birlikte yönetin.">
  <x-admin.data-table
    :paginator="$table['paginator']"
    :search="$table['search']"
    :sort="$table['sort']"
    :direction="$table['direction']"
    search-placeholder="Başlık, ürün kodu veya açıklama ara"
    :create-route="route('admin.urunler.create')"
    create-label="Yeni ürün ekle"
    empty-title="Ürün bulunamadı"
    empty-description="Arama ölçütünü temizleyin veya yeni bir ürün ekleyin.">
    <x-slot:head>
      <th scope="col" class="px-5 py-3.5">Resim</th>
      <x-admin.sortable-heading field="baslik" label="Ürün" :sort="$table['sort']" :direction="$table['direction']" />
      <x-admin.sortable-heading field="urun_kodu" label="Ürün kodu" :sort="$table['sort']" :direction="$table['direction']" />
      <x-admin.sortable-heading field="kategori_id" label="Kategori" :sort="$table['sort']" :direction="$table['direction']" />
      <x-admin.sortable-heading field="created_at" label="Eklenme tarihi" :sort="$table['sort']" :direction="$table['direction']" />
      <th scope="col" class="px-5 py-3.5 text-right">İşlemler</th>
    </x-slot:head>

    @foreach ($table['paginator'] as $urun)
      <tr class="align-middle hover:bg-slate-50/70">
        <td class="px-5 py-4">
          @if ($urun->resimUrl())
            <img src="{{ $urun->resimUrl() }}" alt="{{ $urun->baslik }}" class="size-14 rounded-xl border border-slate-200 bg-white object-contain p-1" loading="lazy" />
          @else
            <div class="flex size-14 items-center justify-center rounded-xl border border-dashed border-slate-300 bg-slate-50 text-xs font-semibold text-slate-400">Yok</div>
          @endif
        </td>
        <td class="min-w-72 px-5 py-4">
          <p class="font-semibold text-slate-900">{{ $urun->baslik }}</p>
          <p class="mt-1 line-clamp-2 text-xs leading-5 text-slate-500">{{ $urun->aciklama }}</p>
          <p class="mt-1 text-xs text-slate-400">/{{ $urun->slug }}</p>
        </td>
        <td class="whitespace-nowrap px-5 py-4 font-medium text-slate-700">{{ $urun->urun_kodu }}</td>
        <td class="whitespace-nowrap px-5 py-4 text-slate-600">{{ $urun->kategori->baslik }}</td>
        <td class="whitespace-nowrap px-5 py-4 text-slate-600">{{ $urun->created_at->format('d.m.Y') }}</td>
        <td class="px-5 py-4">
          <div class="flex justify-end gap-2">
            <a href="{{ route('admin.urunler.edit', $urun) }}" class="inline-flex items-center rounded-lg border border-slate-300 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-100">Düzenle</a>
            <x-admin.delete-button :action="route('admin.urunler.destroy', $urun)" :label="$urun->baslik.' ürününü sil'" />
          </div>
        </td>
      </tr>
    @endforeach
  </x-admin.data-table>
</x-admin.layout>
