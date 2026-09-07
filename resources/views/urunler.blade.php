<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="{{ $urunKategori->baslik }} kategorisindeki Tepenet güvenlik ürünlerini inceleyin."
    />
    <title>{{ $urunKategori->baslik }} | Tepenet Güvenlik</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{ asset('stil.css') }}" />
    <script
      src="https://kit.fontawesome.com/8d3c119f81.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body class="page-urunler-ve-hizmetler">
    @include('partials.navbar')

    <main>
      <section class="products-banner" aria-labelledby="page-title">
        <div class="products-banner__image">
          <img src="{{ asset('resimler/urunler/banner3.png') }}" alt="Tepenet alarm ve kamera ürünleri" />
        </div>
        <div class="container">
          <h1 id="page-title">{{ $urunKategori->baslik }}</h1>
          <nav aria-label="Sayfa yolu">
            <ol class="breadcrumb-list">
              <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
              <li aria-hidden="true">›</li>
              <li><a href="{{ route('urunler-ve-hizmetler.index') }}">Tepenet Ürünler</a></li>
              <li aria-hidden="true">›</li>
              <li><a href="{{ route('urunler-ve-hizmetler.'.$sistem) }}">{{ $sistemBasligi }}</a></li>
              <li aria-hidden="true">›</li>
              <li aria-current="page">{{ $urunKategori->baslik }}</li>
            </ol>
          </nav>
        </div>
      </section>

      <section class="products-section" aria-labelledby="product-list-title">
        <div class="container">
          <div class="row g-4 g-xl-5 align-items-start">
            <div class="col-12 col-lg-3">
              <x-product-tree :active-slug="$urunKategori->slug" />
            </div>

            <div class="col-12 col-lg-9">
              <header class="product-listing-header">
                <span class="product-listing-header__eyebrow">{{ $sistemBasligi }}</span>
                <h2 id="product-list-title">{{ $urunKategori->baslik }}</h2>
                <p>{{ $urunler->total() }} ürün listeleniyor.</p>
              </header>

              @if ($urunler->isEmpty())
                <div class="product-empty" role="status">
                  Bu kategoride henüz yayınlanmış bir ürün bulunmuyor.
                </div>
              @else
                <div class="category-grid product-grid row row-cols-1 row-cols-md-2 g-4">
                  @foreach ($urunler as $urun)
                    <div class="col">
                      <a
                        class="category-card product-card"
                        href="{{ route('urunler-ve-hizmetler.urun-detay', ['sistem' => $sistem, 'urunKategori' => $urunKategori, 'urun' => $urun]) }}"
                      >
                        <div class="category-card__visual">
                          @if ($urun->resimUrl() !== null)
                            <img
                              src="{{ $urun->resimUrl() }}"
                              alt="{{ $urun->baslik }}"
                              loading="lazy"
                            />
                          @else
                            <div class="image-placeholder" aria-hidden="true">
                              <span>Ürün görseli</span>
                            </div>
                          @endif
                        </div>
                        <div class="category-card__body product-card__body">
                          <div>
                            <span class="product-card__code">Ürün Kodu: {{ $urun->urun_kodu }}</span>
                            <h3>{{ $urun->baslik }}</h3>
                            <p>{{ $urun->aciklama }}</p>
                            <span class="product-card__link">Ürünü incele <span aria-hidden="true">→</span></span>
                          </div>
                        </div>
                      </a>
                    </div>
                  @endforeach
                </div>

                @if ($urunler->hasPages())
                  <nav class="product-pagination" aria-label="Ürün sayfaları">
                    {{ $urunler->links('pagination::bootstrap-5') }}
                  </nav>
                @endif
              @endif
            </div>
          </div>
        </div>
      </section>
    </main>

    <a class="floating-discovery" href="tel:+905555555555"><span aria-hidden="true">☎</span> İletişim</a>

    @include('partials.footer')

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
