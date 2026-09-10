<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Tepenet Güvenlik blog yazıları ve güvenlik rehberleri." />
    <title>Bloglar | Tepenet Güvenlik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('stil.css') }}" />
    <script src="https://kit.fontawesome.com/8d3c119f81.js" crossorigin="anonymous"></script>
  </head>
  <body class="page-bloglar">
    @include('partials.navbar')

    <main class="blog-page-main blog-page-main--index">
      <section class="blog-page-hero blog-page-hero--index" aria-labelledby="page-title">
        <div class="container">
          <p class="blog-page-eyebrow">TEPENET / BİLGİ MERKEZİ</p>
          <h1 id="page-title">Bloglar</h1>
          <p>Güvenlik sistemleri, alarm çözümleri ve kamera teknolojileri için sahadan, net ve uygulanabilir bilgiler.</p>
          <div class="blog-page-hero__meta" aria-label="Blog istatistiği">
            <span>YAYIN ARŞİVİ</span>
            <strong>{{ $blogs->total() }} YAZI</strong>
          </div>
        </div>
      </section>

      <section class="blog-directory" aria-label="Blog yazıları">
        <div class="container">
          <form method="GET" action="{{ route('bloglar.index') }}" class="blog-directory__toolbar">
            <div class="blog-directory__search">
              <label for="blog-search">Bloglarda arayın</label>
              <div class="blog-directory__search-field">
                <span aria-hidden="true">⌕</span>
                <input id="blog-search" name="search" type="search" value="{{ $search }}" placeholder="Başlık veya içerik ara" maxlength="100" />
              </div>
            </div>

            <div class="blog-directory__sort">
              <label for="blog-sort">Sıralama</label>
              <select id="blog-sort" name="sort">
                <option value="newest" @selected($sort === 'newest')>En yeni</option>
                <option value="oldest" @selected($sort === 'oldest')>En eski</option>
                <option value="title" @selected($sort === 'title')>Başlığa göre A–Z</option>
              </select>
            </div>

            <div class="blog-directory__actions">
              <button type="submit">Uygula <span aria-hidden="true">→</span></button>
              @if ($search !== '' || $sort !== 'newest')
                <a href="{{ route('bloglar.index') }}">Temizle</a>
              @endif
            </div>
          </form>

          <div class="blog-directory__summary" aria-live="polite">
            <p>
              @if ($search !== '')
                <strong>“{{ $search }}”</strong> için {{ $blogs->total() }} sonuç
              @else
                {{ $blogs->total() }} yazı listeleniyor
              @endif
            </p>
            @if ($blogs->count() > 0)
              <span>{{ $blogs->firstItem() }}–{{ $blogs->lastItem() }} / {{ $blogs->total() }}</span>
            @endif
          </div>

        @if ($blogs->count() > 0)
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 blog-directory__grid">
            @foreach ($blogs as $blog)
              <div class="col">
                <article class="blog-list-card h-100">
                  <div class="blog-list-card__body">
                    <div class="blog-list-card__meta">
                      <p class="blog-list-card__date">{{ $blog->created_at?->format('d.m.Y') }}</p>
                      <span>REHBER</span>
                    </div>
                    <h2>{{ $blog->baslik }}</h2>
                    <p>{{ \Illuminate\Support\Str::limit(trim(strip_tags($blog->icerik)), 180) }}</p>
                    <a href="{{ route('bloglar.show', $blog) }}" class="blog-list-card__link">Yazıyı incele <span aria-hidden="true">→</span></a>
                  </div>
                </article>
              </div>
            @endforeach
          </div>

          @if ($blogs->hasPages())
            <nav class="blog-directory__pagination blog-pagination" aria-label="Blog sayfaları">
              @foreach ($blogs->onEachSide(1)->linkCollection() as $link)
                @php($label = $loop->first ? '← Önceki' : ($loop->last ? 'Sonraki →' : $link['label']))

                @if ($link['url'] === null)
                  <span class="blog-pagination__item is-disabled" aria-disabled="true">{{ $label }}</span>
                @elseif ($link['active'])
                  <span class="blog-pagination__item is-current" aria-current="page">{{ $label }}</span>
                @else
                  <a href="{{ $link['url'] }}" class="blog-pagination__item">{{ $label }}</a>
                @endif
              @endforeach
            </nav>
          @endif
        @else
          <div class="blog-empty-state">
            <span aria-hidden="true">//</span>
            <h2>{{ $search !== '' ? 'Aramanızla eşleşen bir yazı bulunamadı.' : 'Henüz blog yazısı bulunmuyor.' }}</h2>
            <p>{{ $search !== '' ? 'Farklı bir ifade deneyin veya tüm yazıları görüntüleyin.' : 'Yeni yazılar yayınlandığında burada görüntüleyebilirsiniz.' }}</p>
            @if ($search !== '')
              <a href="{{ route('bloglar.index') }}">Tüm yazıları görüntüle</a>
            @endif
          </div>
        @endif
        </div>
      </section>
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
