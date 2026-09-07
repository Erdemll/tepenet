@props([
  'paginator',
  'search' => '',
  'sort' => 'created_at',
  'direction' => 'desc',
  'searchPlaceholder' => 'Kayıtlarda ara',
  'createRoute' => null,
  'createLabel' => 'Yeni kayıt',
  'emptyTitle' => 'Henüz kayıt bulunmuyor',
  'emptyDescription' => 'İlk kaydı ekleyerek başlayabilirsiniz.',
])

<section {{ $attributes->class('overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm') }}>
  <div class="flex flex-col gap-4 border-b border-slate-200 p-4 sm:flex-row sm:items-center sm:justify-between sm:p-5">
    <form method="GET" action="{{ url()->current() }}" class="flex w-full max-w-lg gap-2">
      <input type="hidden" name="sort" value="{{ $sort }}" />
      <input type="hidden" name="direction" value="{{ $direction }}" />
      <label class="sr-only" for="admin-table-search">Ara</label>
      <input id="admin-table-search" name="search" type="search" value="{{ $search }}" placeholder="{{ $searchPlaceholder }}" class="min-w-0 flex-1 rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm outline-none transition placeholder:text-slate-400 focus:border-red-700 focus:ring-4 focus:ring-red-100" />
      <button type="submit" class="rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-700 focus:outline-none focus:ring-4 focus:ring-slate-200">Ara</button>
      @if ($search !== '')
        <a href="{{ url()->current() }}" class="inline-flex items-center rounded-xl border border-slate-300 px-3 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">Temizle</a>
      @endif
    </form>

    @if ($createRoute)
      <a href="{{ $createRoute }}" class="inline-flex shrink-0 items-center justify-center rounded-xl bg-red-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-200">
        <span class="mr-2 text-lg leading-none" aria-hidden="true">+</span>{{ $createLabel }}
      </a>
    @endif
  </div>

  @if ($paginator->count() > 0)
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
        <thead class="bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
          <tr>{{ $head }}</tr>
        </thead>
        <tbody class="divide-y divide-slate-100 bg-white">{{ $slot }}</tbody>
      </table>
    </div>

    <div class="border-t border-slate-200 px-4 py-4 sm:px-5">
      <div class="mb-3 text-xs text-slate-500">
        Toplam {{ $paginator->total() }} kaydın {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }} arası gösteriliyor.
      </div>
      {{ $paginator->onEachSide(1)->links() }}
    </div>
  @else
    <div class="px-6 py-16 text-center">
      <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-slate-100 text-slate-500" aria-hidden="true">⌕</div>
      <h2 class="mt-4 text-base font-semibold text-slate-900">{{ $emptyTitle }}</h2>
      <p class="mt-2 text-sm text-slate-500">{{ $emptyDescription }}</p>
    </div>
  @endif
</section>
