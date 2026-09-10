<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="{{ $blog->baslik }} | Tepenet Güvenlik" />
    <title>{{ $blog->baslik }} | Tepenet Güvenlik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('stil.css') }}" />
    <script src="https://kit.fontawesome.com/8d3c119f81.js" crossorigin="anonymous"></script>
  </head>
  <body class="page-blog-detay">
    @include('partials.navbar')

    <main class="blog-page-main">
      <section class="blog-page-hero blog-page-hero--detail" aria-labelledby="page-title">
        <div class="container">
          <a href="{{ route('bloglar.index') }}" class="blog-page-back">← Tüm blog yazıları</a>
          <p class="blog-page-eyebrow">TEPENET BLOG</p>
          <h1 id="page-title">{{ $blog->baslik }}</h1>
          <p>{{ $blog->created_at?->format('d.m.Y') }}</p>
        </div>
      </section>

      <article class="container py-5">
        <div class="blog-article">
          <div class="blog-article__content">{!! $content !!}</div>
        </div>
      </article>
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
