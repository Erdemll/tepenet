<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex, nofollow" />
    <title>Yönetici Girişi | Tepenet Güvenlik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="min-h-screen bg-slate-950 font-sans text-slate-900 antialiased">
    <main class="relative flex min-h-screen items-center justify-center overflow-hidden px-4 py-10 sm:px-6">
      <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(204,21,32,0.28),transparent_38%),radial-gradient(circle_at_bottom_right,rgba(148,163,184,0.12),transparent_34%)]"></div>

      <section class="relative w-full max-w-md overflow-hidden rounded-3xl border border-white/10 bg-white shadow-2xl shadow-black/30">
        <div class="h-1.5 bg-red-700"></div>

        <div class="p-7 sm:p-10">
          <a href="{{ route('home') }}" class="inline-flex items-center gap-3" aria-label="Tepenet ana sayfasına dön">
            <img src="{{ asset('logo.png') }}" alt="Tepenet Güvenlik" class="h-12 w-auto" />
          </a>

          <div class="mt-8">
            <p class="text-sm font-semibold uppercase tracking-[0.18em] text-red-700">Yönetim Paneli</p>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight text-slate-950">Yönetici girişi</h1>
            <p class="mt-3 text-sm leading-6 text-slate-600">Paneli görüntülemek için yetkili hesabınızla giriş yapın.</p>
          </div>

          <form method="POST" action="{{ route('admin.login.store') }}" class="mt-8 flex flex-col gap-5">
            @csrf

            <div>
              <label for="username" class="block text-sm font-semibold text-slate-800">Kullanıcı adı</label>
              <input
                id="username"
                name="username"
                type="text"
                value="{{ old('username') }}"
                required
                autofocus
                autocomplete="username"
                aria-invalid="{{ $errors->has('username') ? 'true' : 'false' }}"
                @class([
                    'mt-2 block w-full rounded-xl border bg-white px-4 py-3 text-sm text-slate-950 outline-none transition placeholder:text-slate-400 focus:ring-4',
                    'border-red-400 focus:border-red-600 focus:ring-red-100' => $errors->has('username'),
                    'border-slate-300 focus:border-red-700 focus:ring-red-100' => ! $errors->has('username'),
                ])
              />
              @error('username')
                <p class="mt-2 text-sm font-medium text-red-700" role="alert">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label for="password" class="block text-sm font-semibold text-slate-800">Parola</label>
              <input
                id="password"
                name="password"
                type="password"
                required
                autocomplete="current-password"
                aria-invalid="{{ $errors->has('password') ? 'true' : 'false' }}"
                @class([
                    'mt-2 block w-full rounded-xl border bg-white px-4 py-3 text-sm text-slate-950 outline-none transition focus:ring-4',
                    'border-red-400 focus:border-red-600 focus:ring-red-100' => $errors->has('password'),
                    'border-slate-300 focus:border-red-700 focus:ring-red-100' => ! $errors->has('password'),
                ])
              />
              @error('password')
                <p class="mt-2 text-sm font-medium text-red-700" role="alert">{{ $message }}</p>
              @enderror
            </div>

            <button type="submit" class="mt-1 inline-flex w-full items-center justify-center rounded-xl bg-red-700 px-5 py-3.5 text-sm font-semibold text-white shadow-lg shadow-red-900/20 transition hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-200">
              Güvenli giriş yap
            </button>
          </form>

          <p class="mt-7 text-center text-xs leading-5 text-slate-500">Bu alan yalnızca yetkili Tepenet personeli içindir.</p>
        </div>
      </section>
    </main>
  </body>
</html>
