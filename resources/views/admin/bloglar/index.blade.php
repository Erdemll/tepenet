<x-admin.layout
  title="Bloglar"
  heading="Bloglar"
  active="bloglar"
  description="Blog yazılarını arayın, sıralayın, düzenleyin ve HTML içerikleriyle yönetin.">
  <x-admin.data-table
    :paginator="$table['paginator']"
    :search="$table['search']"
    :sort="$table['sort']"
    :direction="$table['direction']"
    search-placeholder="Başlık veya içerik ara"
    :create-route="route('admin.bloglar.create')"
    create-label="Yeni blog ekle"
    empty-title="Blog yazısı bulunamadı"
    empty-description="Arama ölçütünü temizleyin veya yeni bir blog yazısı ekleyin.">
    <x-slot:head>
      <x-admin.sortable-heading field="baslik" label="Blog yazısı" :sort="$table['sort']" :direction="$table['direction']" />
      <th scope="col" class="px-5 py-3.5">İçerik özeti</th>
      <x-admin.sortable-heading field="created_at" label="Oluşturulma" :sort="$table['sort']" :direction="$table['direction']" />
      <x-admin.sortable-heading field="updated_at" label="Güncellenme" :sort="$table['sort']" :direction="$table['direction']" />
      <th scope="col" class="px-5 py-3.5 text-right">İşlemler</th>
    </x-slot:head>

    @foreach ($table['paginator'] as $blog)
      <tr class="align-top hover:bg-slate-50/70">
        <td class="min-w-64 px-5 py-4">
          <p class="font-semibold text-slate-900">{{ $blog->baslik }}</p>
        </td>
        <td class="max-w-xl px-5 py-4 text-slate-600">
          {{ \Illuminate\Support\Str::limit(trim(strip_tags($blog->icerik)), 180) }}
        </td>
        <td class="whitespace-nowrap px-5 py-4 text-slate-600">{{ $blog->created_at?->format('d.m.Y H:i') }}</td>
        <td class="whitespace-nowrap px-5 py-4 text-slate-600">{{ $blog->updated_at?->format('d.m.Y H:i') }}</td>
        <td class="px-5 py-4">
          <div class="flex justify-end gap-2">
            <a href="{{ route('admin.bloglar.edit', $blog) }}" class="inline-flex items-center rounded-lg border border-slate-300 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-100">Düzenle</a>
            <x-admin.delete-button :action="route('admin.bloglar.destroy', $blog)" :label="$blog->baslik.' blog yazısını sil'" />
          </div>
        </td>
      </tr>
    @endforeach
  </x-admin.data-table>
</x-admin.layout>
