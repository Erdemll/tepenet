@props([
  'title',
  'heading',
  'active' => 'dashboard',
  'description' => null,
])

<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex, nofollow" />
    <title>{{ $title }} | Tepenet Güvenlik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="min-h-screen bg-slate-100 font-sans text-slate-900 antialiased">
    <div class="min-h-screen lg:grid lg:grid-cols-[17rem_1fr]">
      <aside class="border-b border-slate-800 bg-slate-950 px-5 py-5 text-white lg:min-h-screen lg:border-r lg:border-b-0 lg:px-6 lg:py-8">
        <div class="flex items-center justify-between gap-4 lg:block">
          <a href="{{ route('admin.dashboard') }}" class="inline-flex rounded-xl bg-white px-3 py-2">
            <img src="{{ asset('logo.png') }}" alt="Tepenet Güvenlik" class="h-9 w-auto" />
          </a>

          <form method="POST" action="{{ route('admin.logout') }}" class="lg:hidden">
            @csrf
            <button type="submit" class="rounded-lg border border-white/20 px-3 py-2 text-sm font-medium text-slate-200 transition hover:bg-white/10">Çıkış</button>
          </form>
        </div>

        <nav class="mt-6 lg:mt-10" aria-label="Yönetim menüsü">
          <p class="px-3 text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Menü</p>
          <div class="mt-3 flex flex-col gap-2">
            <a
              href="{{ route('admin.dashboard') }}"
              @if ($active === 'dashboard') aria-current="page" @endif
              @class([
                'flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition',
                'bg-red-700 text-white shadow-lg shadow-red-950/25' => $active === 'dashboard',
                'text-slate-300 hover:bg-white/10 hover:text-white' => $active !== 'dashboard',
              ])>
              <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.2 12 4l9 9.2M5.5 10.8V20h13v-9.2M9.5 20v-6h5v6" />
              </svg>
              Genel Bakış
            </a>

            <a
              href="{{ route('admin.is-ilanlari.index') }}"
              @if ($active === 'is-ilanlari') aria-current="page" @endif
              @class([
                'flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition',
                'bg-red-700 text-white shadow-lg shadow-red-950/25' => $active === 'is-ilanlari',
                'text-slate-300 hover:bg-white/10 hover:text-white' => $active !== 'is-ilanlari',
              ])>
              <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V5.75A1.75 1.75 0 0 1 9.75 4h4.5A1.75 1.75 0 0 1 16 5.75V7m-12 4h16M5 7h14a1 1 0 0 1 1 1v10.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 4 18.5V8a1 1 0 0 1 1-1Z" />
              </svg>
              İş İlanları
            </a>

            <a
              href="{{ route('admin.urunler.index') }}"
              @if ($active === 'urunler') aria-current="page" @endif
              @class([
                'flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition',
                'bg-red-700 text-white shadow-lg shadow-red-950/25' => $active === 'urunler',
                'text-slate-300 hover:bg-white/10 hover:text-white' => $active !== 'urunler',
              ])>
              <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 7.5 12 3l8 4.5v9L12 21l-8-4.5v-9ZM4.5 7.75 12 12l7.5-4.25M12 12v8.5" />
              </svg>
              Ürünler
            </a>
          </div>
        </nav>

        <div class="mt-8 hidden border-t border-white/10 pt-6 lg:block">
          <p class="truncate text-sm font-semibold text-white">{{ auth()->user()->name }}</p>
          <p class="mt-1 truncate text-xs text-slate-400">{{ '@'.auth()->user()->username }}</p>

          <form method="POST" action="{{ route('admin.logout') }}" class="mt-4">
            @csrf
            <button type="submit" class="w-full rounded-xl border border-white/15 px-4 py-2.5 text-sm font-semibold text-slate-200 transition hover:border-white/30 hover:bg-white/10 hover:text-white">Güvenli çıkış</button>
          </form>
        </div>
      </aside>

      <main class="min-w-0 px-4 py-7 sm:px-7 lg:px-10 lg:py-10">
        <div class="mx-auto max-w-7xl">
          <header class="flex flex-col gap-5 border-b border-slate-200 pb-7 sm:flex-row sm:items-end sm:justify-between">
            <div>
              <p class="text-sm font-semibold text-red-700">Tepenet Yönetim Paneli</p>
              <h1 class="mt-1 text-3xl font-semibold tracking-tight text-slate-950">{{ $heading }}</h1>
              @if ($description)
                <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">{{ $description }}</p>
              @endif
            </div>

            @isset($actions)
              <div class="shrink-0">{{ $actions }}</div>
            @endisset
          </header>

          @if (session('status'))
            <div class="mt-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800" role="status">
              {{ session('status') }}
            </div>
          @endif

          <div class="mt-7">{{ $slot }}</div>
        </div>
      </main>
    </div>
  </body>
</html>
