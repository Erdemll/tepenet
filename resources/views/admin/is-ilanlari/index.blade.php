<x-admin.layout
  title="İş İlanları"
  heading="İş İlanları"
  active="is-ilanlari"
  description="Yayındaki ve taslak iş ilanlarını arayın, sıralayın ve yönetin.">
  <x-admin.data-table
    :paginator="$table['paginator']"
    :search="$table['search']"
    :sort="$table['sort']"
    :direction="$table['direction']"
    search-placeholder="Başlık, şehir veya pozisyon ara"
    :create-route="route('admin.is-ilanlari.create')"
    create-label="Yeni ilan ekle"
    empty-title="İş ilanı bulunamadı"
    empty-description="Arama ölçütünü temizleyin veya yeni bir ilan ekleyin.">
    <x-slot:head>
      <x-admin.sortable-heading field="title" label="İlan" :sort="$table['sort']" :direction="$table['direction']" />
      <x-admin.sortable-heading field="type" label="Pozisyon" :sort="$table['sort']" :direction="$table['direction']" />
      <th scope="col" class="px-5 py-3.5">Şehirler</th>
      <x-admin.sortable-heading field="application_deadline" label="Son başvuru" :sort="$table['sort']" :direction="$table['direction']" />
      <x-admin.sortable-heading field="is_active" label="Durum" :sort="$table['sort']" :direction="$table['direction']" />
      <th scope="col" class="px-5 py-3.5 text-right">İşlemler</th>
    </x-slot:head>

    @foreach ($table['paginator'] as $isIlani)
      <tr class="align-top hover:bg-slate-50/70">
        <td class="min-w-72 px-5 py-4">
          <p class="font-semibold text-slate-900">{{ $isIlani->title }}</p>
          <p class="mt-1 line-clamp-2 text-xs leading-5 text-slate-500">{{ $isIlani->summary }}</p>
        </td>
        <td class="whitespace-nowrap px-5 py-4 text-slate-600">{{ $isIlani->typeLabel() }}</td>
        <td class="max-w-64 px-5 py-4 text-slate-600">{{ implode(', ', $isIlani->cities) }}</td>
        <td class="whitespace-nowrap px-5 py-4 text-slate-600">{{ $isIlani->application_deadline?->format('d.m.Y') ?? 'Sürekli' }}</td>
        <td class="whitespace-nowrap px-5 py-4">
          <span @class([
            'inline-flex rounded-full px-2.5 py-1 text-xs font-semibold',
            'bg-emerald-100 text-emerald-800' => $isIlani->is_active,
            'bg-slate-100 text-slate-600' => ! $isIlani->is_active,
          ])>{{ $isIlani->is_active ? 'Yayında' : 'Taslak' }}</span>
        </td>
        <td class="px-5 py-4">
          <div class="flex justify-end gap-2">
            <a href="{{ route('admin.is-ilanlari.edit', $isIlani) }}" class="inline-flex items-center rounded-lg border border-slate-300 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-100">Düzenle</a>
            <x-admin.delete-button :action="route('admin.is-ilanlari.destroy', $isIlani)" :label="$isIlani->title.' ilanını sil'" />
          </div>
        </td>
      </tr>
    @endforeach
  </x-admin.data-table>
</x-admin.layout>
