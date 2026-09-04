<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="Tepenet alarm ve kamera sistemlerini; kablolu, kablosuz, HD ve IP ürün kategorileriyle inceleyin."
    />
    <title>Ürünler ve Hizmetler | Tepenet Güvenlik</title>

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
          <img src="" alt="Tepenet alarm ve kamera ürünleri" />
          <div class="image-placeholder">Ürünler sayfası banner görseli · src alanını doldurun</div>
        </div>
        <div class="container">
          <h1 id="page-title">Tepenet Ürünler</h1>
          <nav aria-label="Sayfa yolu">
            <ol class="breadcrumb-list">
              <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
              <li aria-hidden="true">›</li>
              <li aria-current="page">Tepenet Ürünler</li>
            </ol>
          </nav>
        </div>
      </section>

      <section class="products-section" aria-label="Ürün kategorileri">
        <div class="container">
          <div class="row g-4 g-xl-5 align-items-start">
            <div class="col-12 col-lg-3">
              <nav class="product-tree" aria-label="Ürün kategorileri menüsü">
                <h2 class="product-tree__title">Tepenet Ürünler</h2>
                <ul>
                  <li id="alarm-sistemleri">
                    <a class="product-tree__branch" href="#alarm-sistemleri">Alarm Sistemleri</a>
                    <ul class="product-tree__children" id="alarm-alt-kategoriler">
                      <li><a href="#">Kablolu Alarm Sistemi</a></li>
                      <li><a href="#">Kablosuz Alarm Sistemi</a></li>
                    </ul>
                  </li>
                  <li id="kamera-sistemleri">
                    <a class="product-tree__branch" href="#kamera-sistemleri">Kamera Sistemleri</a>
                    <ul class="product-tree__children" id="kamera-alt-kategoriler">
                      <li><a href="#">HD Güvenlik Kamerası Sistemleri</a></li>
                      <li><a href="#">IP Kamera Sistemleri</a></li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>

            <div class="col-12 col-lg-9">
              <div class="category-grid row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                  <a class="category-card" href="#alarm-sistemleri" aria-describedby="alarm-alt-kategoriler">
                    <div class="category-card__visual">
                      <img src="" alt="Alarm sistemleri ürün grubu" />
                      <div class="image-placeholder">Alarm sistemleri görseli · src alanını doldurun</div>
                    </div>
                    <div class="category-card__body">
                      <div>
                        <span class="category-card__label">Ürün Detay</span>
                        <h2>Alarm Sistemleri</h2>
                      </div>
                      <span class="category-card__arrow" aria-hidden="true">→</span>
                    </div>
                  </a>
                </div>
                <div class="col">
                  <a class="category-card" href="#kamera-sistemleri" aria-describedby="kamera-alt-kategoriler">
                    <div class="category-card__visual">
                      <img src="" alt="Kamera sistemleri ürün grubu" />
                      <div class="image-placeholder">Kamera sistemleri görseli · src alanını doldurun</div>
                    </div>
                    <div class="category-card__body">
                      <div>
                        <span class="category-card__label">Ürün Detay</span>
                        <h2>Kamera Sistemleri</h2>
                      </div>
                      <span class="category-card__arrow" aria-hidden="true">→</span>
                    </div>
                  </a>
                </div>
              </div>
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
