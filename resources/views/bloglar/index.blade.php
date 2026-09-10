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

    <main class="blog-page-main">
      <section class="blog-page-hero" aria-labelledby="page-title">
        <div class="container">
          <p class="blog-page-eyebrow">TEPENET GÜVENLİK</p>
          <h1 id="page-title">Bloglar</h1>
          <p>Güvenlik sistemleri, alarm çözümleri ve kamera teknolojileri hakkında güncel bilgiler.</p>
        </div>
      </section>

      <section class="container py-5" aria-label="Blog yazıları">
        @if ($blogs->count() > 0)
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($blogs as $blog)
              <div class="col">
                <article class="blog-list-card h-100">
                  <div class="blog-list-card__body">
                    <p class="blog-list-card__date">{{ $blog->created_at?->format('d.m.Y') }}</p>
                    <h2>{{ $blog->baslik }}</h2>
                    <p>{{ \Illuminate\Support\Str::limit(trim(strip_tags($blog->icerik)), 180) }}</p>
                    <a href="{{ route('bloglar.show', $blog) }}" class="blog-list-card__link">Devamını okuyun <span aria-hidden="true">→</span></a>
                  </div>
                </article>
              </div>
            @endforeach
          </div>

          <div class="mt-5">{{ $blogs->onEachSide(1)->links() }}</div>
        @else
          <div class="blog-empty-state">
            <h2>Henüz blog yazısı bulunmuyor.</h2>
            <p>Yeni yazılar yayınlandığında burada görüntüleyebilirsiniz.</p>
          </div>
        @endif
      </section>
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
