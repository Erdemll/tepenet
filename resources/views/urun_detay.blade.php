<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="{{ $urun->baslik }} ürününün görselini, ürün kodunu ve açıklamasını inceleyin."
    />
    <title>{{ $urun->baslik }} | Tepenet Güvenlik</title>

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
          <h1 id="page-title">{{ $urun->baslik }}</h1>
          <nav aria-label="Sayfa yolu">
            <ol class="breadcrumb-list">
              <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
              <li aria-hidden="true">›</li>
              <li><a href="{{ route('urunler-ve-hizmetler.index') }}">Tepenet Ürünler</a></li>
              <li aria-hidden="true">›</li>
              <li><a href="{{ route('urunler-ve-hizmetler.'.$sistem) }}">{{ $sistemBasligi }}</a></li>
              <li aria-hidden="true">›</li>
              <li>
                <a href="{{ route('urunler-ve-hizmetler.kategori', ['sistem' => $sistem, 'urunKategori' => $urunKategori]) }}">
                  {{ $urunKategori->baslik }}
                </a>
              </li>
              <li aria-hidden="true">›</li>
              <li aria-current="page">{{ $urun->baslik }}</li>
            </ol>
          </nav>
        </div>
      </section>

      <section class="product-detail-section" aria-labelledby="product-detail-title">
        <div class="container">
          <article class="product-detail">
            <div class="row g-0 align-items-stretch">
              <div class="col-12 col-lg-6">
                <div class="product-detail__visual">
                  @if ($urunResimUrl !== null)
                    <img src="{{ $urunResimUrl }}" alt="{{ $urun->baslik }}" />
                  @else
                    <div
                      class="image-placeholder"
                      role="img"
                      aria-label="{{ $urun->baslik }} için ürün görseli bulunmuyor"
                    >
                      <span>Ürün görseli</span>
                    </div>
                  @endif
                </div>
              </div>

              <div class="col-12 col-lg-6">
                <div class="product-detail__content">
                  <span class="product-detail__category">{{ $urunKategori->baslik }}</span>
                  <h2 id="product-detail-title">{{ $urun->baslik }}</h2>

                  <dl class="product-detail__meta">
                    <div>
                      <dt>Ürün Kodu</dt>
                      <dd>{{ $urun->urun_kodu }}</dd>
                    </div>
                  </dl>

                  <div class="product-detail__description">
                    <h3>Ürün Açıklaması</h3>
                    <p>{{ $urun->aciklama }}</p>
                  </div>

                  <div class="product-detail__actions">
                    <a class="product-detail__contact" href="{{ route('iletisim') }}">
                      Bu Ürün Hakkında Bilgi Al <span aria-hidden="true">→</span>
                    </a>

                    <a
                      class="product-detail__back"
                      href="{{ route('urunler-ve-hizmetler.kategori', ['sistem' => $sistem, 'urunKategori' => $urunKategori]) }}"
                    >
                      <span aria-hidden="true">←</span> {{ $urunKategori->baslik }} ürünlerine dön
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </article>
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
