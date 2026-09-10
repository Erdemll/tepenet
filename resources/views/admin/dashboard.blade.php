<x-admin.layout title="Yönetim Paneli" heading="Genel Bakış" active="dashboard">
  <section class="overflow-hidden rounded-3xl bg-slate-950 px-6 py-8 text-white shadow-xl shadow-slate-300/50 sm:px-9 sm:py-10">
    <div class="max-w-2xl">
      <span class="inline-flex rounded-full bg-red-700/20 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-red-300 ring-1 ring-inset ring-red-500/30">Panel hazır</span>
      <h2 class="mt-5 text-2xl font-semibold tracking-tight sm:text-3xl">Yönetim alanının temeli oluşturuldu.</h2>
      <p class="mt-4 max-w-xl text-sm leading-7 text-slate-300 sm:text-base">İş ilanları ve blog yönetimi aktif. Tüm içerikleri ortak yönetim yapısı üzerinden güncelleyebilirsiniz.</p>
    </div>
  </section>

  <section class="mt-7 grid gap-5 sm:grid-cols-2 xl:grid-cols-3" aria-label="Yönetim alanları">
    <a href="{{ route('admin.is-ilanlari.index') }}" class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:border-red-200 hover:shadow-md">
      <div class="flex items-center justify-between gap-4">
        <h2 class="font-semibold text-slate-900">İş İlanları</h2>
        <span class="rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-800">Aktif</span>
      </div>
      <p class="mt-3 text-sm leading-6 text-slate-500">İlanları listeleyin, arayın, ekleyin, düzenleyin ve silin.</p>
      <span class="mt-5 inline-flex text-sm font-semibold text-red-700 transition group-hover:translate-x-1">Yönetime git →</span>
    </a>

    <a href="{{ route('admin.bloglar.index') }}" class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:border-red-200 hover:shadow-md">
      <div class="flex items-center justify-between gap-4">
        <h2 class="font-semibold text-slate-900">Bloglar</h2>
        <span class="rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-800">Aktif</span>
      </div>
      <p class="mt-3 text-sm leading-6 text-slate-500">Blog yazılarını HTML içerikleriyle ekleyin, düzenleyin ve yönetin.</p>
      <span class="mt-5 inline-flex text-sm font-semibold text-red-700 transition group-hover:translate-x-1">Yönetime git →</span>
    </a>

    @foreach (['Başvurular', 'Site Ayarları'] as $upcomingSection)
      <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between gap-4">
          <h2 class="font-semibold text-slate-900">{{ $upcomingSection }}</h2>
          <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-500">Yakında</span>
        </div>
        <p class="mt-3 text-sm leading-6 text-slate-500">Bu bölüm sonraki geliştirme adımlarında birlikte hazırlanacak.</p>
      </article>
    @endforeach
  </section>
</x-admin.layout>
