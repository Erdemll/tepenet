<header>
  <div class="topbar container-fluid">
    <div class="container text-white text-end py-2">
      <i class="fa-solid fa-handshake"></i>
      <a class="partner-link" href="#">İş Ortağımız Olmak İster Misiniz?</a>
      <span class="topbar-divider mx-2">|</span>
      <i class="contact-icon fa-solid fa-headset"></i>
      <span>Hemen Ara</span>
      <a href="tel:+905555555555">+0908505329670</a>
      <span class="topbar-divider mx-2">|</span> <span>🇹🇷 Türkçe</span>
    </div>
  </div>

  <div
    class="site-header container-fluid d-flex justify-content-between align-items-center px-3 py-2"
  >
    <a class="navbar-brand fw-bold" href="{{ route('home') }}">
      <img src="{{ asset('logo.png') }}" alt="Tepenet Güvenlik ana sayfa" />
    </a>
    <nav class="site-nav navbar navbar-expand-xl">
      <div class="container">
        <!-- Masaüstü Menü -->
        <div class="d-none d-xl-flex ms-auto">
          <ul class="navbar-nav align-items-center gap-2">
            <li class="nav-item dropdown">
              <a
                class="fs-6 text-danger nav-link dropdown-toggle"
                href="{{ route('ev-guvenligi.index') }}"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fa-solid fa-house-lock"></i> Ev Güvenliği
              </a>
              <ul class="dropdown-menu bg-danger">
                <li>
                  <a
                    class="fs-6 text-white dropdown-item"
                    href="{{ route('ev-guvenligi.index') }}"
                    >Ev Alarm Sistemleri</a
                  >
                </li>
                <li>
                  <a
                    class="fs-6 text-white dropdown-item"
                    href="{{ route('ev-guvenligi.nelerden-olusur') }}"
                    >Nelerden Oluşur?</a
                  >
                </li>
                <li>
                  <a
                    class="fs-6 text-white dropdown-item"
                    href="{{ route('ev-guvenligi.nasil-calisir') }}"
                    >Nasıl Çalışır?</a
                  >
                </li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a
                class="fs-6 text-danger nav-link dropdown-toggle"
                href="{{ route('is-yeri-guvenligi.index') }}"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fa-solid fa-building-shield"></i> İş Yeri
                Güvenliği
              </a>
              <ul class="dropdown-menu bg-danger">
                <li>
                  <a
                    class="fs-6 text-white dropdown-item"
                    href="{{ route('is-yeri-guvenligi.index') }}"
                    >İş Yeri Alarm Sistemleri</a
                  >
                </li>
                <li>
                  <a
                    class="fs-6 text-white dropdown-item"
                    href="{{ route('is-yeri-guvenligi.nelerden-olusur') }}"
                    >Nelerden Oluşur?</a
                  >
                </li>
                <li>
                  <a
                    class="fs-6 text-white dropdown-item"
                    href="{{ route('is-yeri-guvenligi.nasil-calisir') }}"
                    >Nasıl Çalışır?</a
                  >
                </li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a
                class="fs-6 text-danger nav-link dropdown-toggle"
                href="{{ route('kurumsal-cozumler.index') }}"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fa-solid fa-users-gear"></i> Kurumsal Çözümler
              </a>
              <ul class="dropdown-menu bg-danger">
                <li>
                  <a
                    class="fs-6 text-white dropdown-item"
                    href="{{ route('kurumsal-cozumler.index') }}"
                    >Kurumsal Güvenlik çözümleri</a
                  >
                </li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a
                class="fs-6 text-danger nav-link dropdown-toggle"
                href="{{ route('kendi-sistemini-olustur.index') }}"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fa-solid fa-screwdriver-wrench"></i> Kendi
                Sisteminizi Oluşturun
              </a>
              <ul class="dropdown-menu bg-danger">
                <li>
                  <a
                    class="fs-6 text-white dropdown-item"
                    href="{{ route('kendi-sistemini-olustur.index') }}"
                    >Kurumsal Alarm çözümleri</a
                  >
                </li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a
                class="fs-6 text-danger nav-link dropdown-toggle"
                href="{{ route('urunler-ve-hizmetler.index') }}"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fa-solid fa-shield-halved"></i> Ürün ve
                Hizmetlerimiz
              </a>
              <ul class="dropdown-menu bg-danger">
                <li>
                  <a class="fs-6 text-white dropdown-item" href="{{ route('urunler-ve-hizmetler.index') }}#kamera-sistemleri">Kamera Sistemleri</a
                  >
                </li>

                <li>
                  <a class="fs-6 text-white dropdown-item" href="{{ route('urunler-ve-hizmetler.index') }}#alarm-sistemleri">Alarm Sistemleri</a
                  >
                </li>

                <li>
                  <a class="fs-6 text-white dropdown-item" href="{{ route('urunler-ve-hizmetler.index') }}">Yenilikçi ürünler</a
                  >
                </li>

                <li>
                  <a class="fs-6 text-white dropdown-item" href="{{ route('urunler-ve-hizmetler.index') }}">Hizmetlerimiz</a
                  >
                </li>

                <li>
                  <a class="fs-6 text-white dropdown-item" href="{{ route('urunler-ve-hizmetler.index') }}">Termal Kamera Çözmleri</a
                  >
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a style="text-decoration: none;" class="text-danger" href="{{ route('online-islemler') }}">Online İşlemler</a>
            </li>

            <li class="nav-item ms-2">
              <button class="search-button btn" aria-label="Sitede ara">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                  <circle
                    cx="11"
                    cy="11"
                    r="6.5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                  ></circle>
                  <path
                    d="m16 16 4 4"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-width="1.8"
                  ></path>
                </svg>
              </button>
            </li>
          </ul>
        </div>

        <!-- Mobil Hamburger Butonu -->
        <button
          class="navbar-toggler d-xl-none"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#mobileMenu"
          aria-controls="mobileMenu"
          aria-label="Menüyü aç"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <!-- Mobil Offcanvas -->
    <div
      class="offcanvas offcanvas-end"
      tabindex="-1"
      id="mobileMenu"
      aria-labelledby="mobileMenuLabel"
    >
      <!-- Başlık -->
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobileMenuLabel">Tepenet</h5>

        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="offcanvas"
          aria-label="Kapat"
        ></button>
      </div>

      <!-- Menü -->
      <div class="offcanvas-body">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('home') }}"> Ana Sayfa </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('hakkimizda.index') }}"> Hakkımızda </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('urunler-ve-hizmetler.index') }}"> Ürünler </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="tel:+905555555555"> İletişim </a>
          </li>

          <li class="nav-item">
              <a style="text-decoration: none;" class="text-danger" href="{{ route('online-islemler') }}">Online İşlemler</a>
            </li>
        </ul>

        <hr />

        <a class="quote-button btn btn-primary w-100" href="{{ route('home') }}#ucretsiz-kesif">
          Teklif Al
        </a>
      </div>
    </div>
  </div>
</header>
