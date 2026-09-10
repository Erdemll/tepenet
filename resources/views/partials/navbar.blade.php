<header>
  <div class="topbar container-fluid">
    <div class="container text-white text-end py-2">
      <i class="fa-solid fa-handshake"></i>
      <a class="partner-link" href="{{ route('iletisim') }}">İş Ortağımız Olmak İster Misiniz?</a>
      <span class="topbar-divider mx-2">|</span>
      <i class="contact-icon fa-solid fa-headset"></i>
      <span class="topbar-call-label">Hemen Ara</span>
      <a href="tel:+905555555555">+0908505329670</a>
      <span class="topbar-divider mx-2">|</span> <span class="topbar-language">🇹🇷 Türkçe</span>
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
        <div class="desktop-navigation d-none d-xl-flex ms-auto">
          <ul class="navbar-nav align-items-center gap-2">
            <li class="nav-item dropdown">
              <a
                class="desktop-nav-link fs-6 text-danger nav-link dropdown-toggle"
                href="{{ route('ev-guvenligi.index') }}"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fa-solid fa-house-lock"></i>
                <span class="desktop-nav-label">
                  <span>Ev</span>
                  <span>Güvenliği</span>
                </span>
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
                class="desktop-nav-link fs-6 text-danger nav-link dropdown-toggle"
                href="{{ route('is-yeri-guvenligi.index') }}"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fa-solid fa-building-shield"></i>
                <span class="desktop-nav-label">
                  <span>İş Yeri</span>
                  <span>Güvenliği</span>
                </span>
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
                class="desktop-nav-link fs-6 text-danger nav-link dropdown-toggle"
                href="{{ route('kurumsal-cozumler.index') }}"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fa-solid fa-users-gear"></i>
                <span class="desktop-nav-label">
                  <span>Kurumsal</span>
                  <span>Çözümler</span>
                </span>
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
                class="desktop-nav-link fs-6 text-danger nav-link dropdown-toggle"
                href="{{ route('kendi-sistemini-olustur.index') }}"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fa-solid fa-screwdriver-wrench"></i>
                <span class="desktop-nav-label">
                  <span>Kendi Sisteminizi</span>
                  <span>Oluşturun</span>
                </span>
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
                class="desktop-nav-link fs-6 text-danger nav-link dropdown-toggle"
                href="{{ route('urunler-ve-hizmetler.index') }}"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fa-solid fa-shield-halved"></i>
                <span class="desktop-nav-label">
                  <span>Ürün ve</span>
                  <span>Hizmetlerimiz</span>
                </span>
              </a>
              <ul class="dropdown-menu bg-danger">
                <li>
                  <a class="fs-6 text-white dropdown-item" href="{{ route('urunler-ve-hizmetler.kamera-sistemleri') }}">Kamera Sistemleri</a
                  >
                </li>

                <li>
                  <a class="fs-6 text-white dropdown-item" href="{{ route('urunler-ve-hizmetler.alarm-sistemleri') }}">Alarm Sistemleri</a
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
              <a class="desktop-nav-link text-danger" href="{{ route('online-islemler') }}">
                <i class="fa-solid fa-globe"></i>
                <span class="desktop-nav-label">
                  <span>Online</span>
                  <span>İşlemler</span>
                </span>
              </a>
            </li>

            <li class="nav-item">
              <a class="desktop-nav-link text-primary" href="{{ route('iletisim') }}">
                <i class="fa-solid fa-phone"></i>
                <span class="desktop-nav-label">
                  <span>İletişim</span>
                </span>
              </a>
            </li>

            <!--
            
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
            
            -->
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
      <div class="mobile-menu-header offcanvas-header">
        <a class="mobile-menu-brand" href="{{ route('home') }}" aria-label="Tepenet ana sayfa">
          <img src="{{ asset('logo.png') }}" alt="" />
        </a>
        <h2 class="visually-hidden" id="mobileMenuLabel">Mobil Menü</h2>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="offcanvas"
          aria-label="Kapat"
        ></button>
      </div>

      <div class="mobile-navigation offcanvas-body" data-mobile-navigation>
        <nav id="mobileNavigationAccordion" aria-label="Mobil ana menü">
          <ul class="navbar-nav">
            <li class="mobile-nav-item">
              <a @class(['mobile-nav-link', 'active' => request()->routeIs('home')]) href="{{ route('home') }}">
                <span>Ana Sayfa</span>
              </a>
            </li>

            <li class="mobile-nav-item">
              <a @class(['mobile-nav-link', 'active' => request()->routeIs('hakkimizda.*')]) href="{{ route('hakkimizda.index') }}">
                <span>Hakkımızda</span>
              </a>
            </li>

            <li class="mobile-nav-item">
              <div class="mobile-nav-row">
                <a @class(['mobile-nav-link', 'active' => request()->routeIs('ev-guvenligi.*')]) href="{{ route('ev-guvenligi.index') }}">
                  <span>Ev Güvenliği</span>
                </a>
                <button class="mobile-nav-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#mobileEvGuvenligiMenu" aria-controls="mobileEvGuvenligiMenu" aria-expanded="{{ request()->routeIs('ev-guvenligi.*') ? 'true' : 'false' }}" aria-label="Ev Güvenliği alt menüsünü aç veya kapat">
                  <span class="mobile-nav-chevron" aria-hidden="true"></span>
                </button>
              </div>
              <div id="mobileEvGuvenligiMenu" @class(['mobile-submenu collapse', 'show' => request()->routeIs('ev-guvenligi.*')]) data-bs-parent="#mobileNavigationAccordion">
                <a @class(['mobile-submenu-link', 'active' => request()->routeIs('ev-guvenligi.index')]) href="{{ route('ev-guvenligi.index') }}">Ev Alarm Sistemleri</a>
                <a @class(['mobile-submenu-link', 'active' => request()->routeIs('ev-guvenligi.nelerden-olusur')]) href="{{ route('ev-guvenligi.nelerden-olusur') }}">Nelerden Oluşur?</a>
                <a @class(['mobile-submenu-link', 'active' => request()->routeIs('ev-guvenligi.nasil-calisir')]) href="{{ route('ev-guvenligi.nasil-calisir') }}">Nasıl Çalışır?</a>
              </div>
            </li>

            <li class="mobile-nav-item">
              <div class="mobile-nav-row">
                <a @class(['mobile-nav-link', 'active' => request()->routeIs('is-yeri-guvenligi.*')]) href="{{ route('is-yeri-guvenligi.index') }}">
                  <span>İş Yeri Güvenliği</span>
                </a>
                <button class="mobile-nav-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#mobileIsYeriGuvenligiMenu" aria-controls="mobileIsYeriGuvenligiMenu" aria-expanded="{{ request()->routeIs('is-yeri-guvenligi.*') ? 'true' : 'false' }}" aria-label="İş Yeri Güvenliği alt menüsünü aç veya kapat">
                  <span class="mobile-nav-chevron" aria-hidden="true"></span>
                </button>
              </div>
              <div id="mobileIsYeriGuvenligiMenu" @class(['mobile-submenu collapse', 'show' => request()->routeIs('is-yeri-guvenligi.*')]) data-bs-parent="#mobileNavigationAccordion">
                <a @class(['mobile-submenu-link', 'active' => request()->routeIs('is-yeri-guvenligi.index')]) href="{{ route('is-yeri-guvenligi.index') }}">İş Yeri Alarm Sistemleri</a>
                <a @class(['mobile-submenu-link', 'active' => request()->routeIs('is-yeri-guvenligi.nelerden-olusur')]) href="{{ route('is-yeri-guvenligi.nelerden-olusur') }}">Nelerden Oluşur?</a>
                <a @class(['mobile-submenu-link', 'active' => request()->routeIs('is-yeri-guvenligi.nasil-calisir')]) href="{{ route('is-yeri-guvenligi.nasil-calisir') }}">Nasıl Çalışır?</a>
              </div>
            </li>

            <li class="mobile-nav-item">
              <div class="mobile-nav-row">
                <a @class(['mobile-nav-link', 'active' => request()->routeIs('kurumsal-cozumler.*')]) href="{{ route('kurumsal-cozumler.index') }}">
                  <span>Kurumsal Çözümler</span>
                </a>
                <button class="mobile-nav-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#mobileKurumsalCozumlerMenu" aria-controls="mobileKurumsalCozumlerMenu" aria-expanded="{{ request()->routeIs('kurumsal-cozumler.*') ? 'true' : 'false' }}" aria-label="Kurumsal Çözümler alt menüsünü aç veya kapat">
                  <span class="mobile-nav-chevron" aria-hidden="true"></span>
                </button>
              </div>
              <div id="mobileKurumsalCozumlerMenu" @class(['mobile-submenu collapse', 'show' => request()->routeIs('kurumsal-cozumler.*')]) data-bs-parent="#mobileNavigationAccordion">
                <a @class(['mobile-submenu-link', 'active' => request()->routeIs('kurumsal-cozumler.index')]) href="{{ route('kurumsal-cozumler.index') }}">Kurumsal Güvenlik Çözümleri</a>
              </div>
            </li>

            <li class="mobile-nav-item">
              <div class="mobile-nav-row">
                <a @class(['mobile-nav-link', 'active' => request()->routeIs('kendi-sistemini-olustur.*')]) href="{{ route('kendi-sistemini-olustur.index') }}">
                  <span>Kendi Sisteminizi Oluşturun</span>
                </a>
                <button class="mobile-nav-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#mobileKendiSisteminiOlusturMenu" aria-controls="mobileKendiSisteminiOlusturMenu" aria-expanded="{{ request()->routeIs('kendi-sistemini-olustur.*') ? 'true' : 'false' }}" aria-label="Kendi Sisteminizi Oluşturun alt menüsünü aç veya kapat">
                  <span class="mobile-nav-chevron" aria-hidden="true"></span>
                </button>
              </div>
              <div id="mobileKendiSisteminiOlusturMenu" @class(['mobile-submenu collapse', 'show' => request()->routeIs('kendi-sistemini-olustur.*')]) data-bs-parent="#mobileNavigationAccordion">
                <a @class(['mobile-submenu-link', 'active' => request()->routeIs('kendi-sistemini-olustur.index')]) href="{{ route('kendi-sistemini-olustur.index') }}">Kurumsal Alarm Çözümleri</a>
              </div>
            </li>

            <li class="mobile-nav-item">
              <div class="mobile-nav-row">
                <a @class(['mobile-nav-link', 'active' => request()->routeIs('urunler-ve-hizmetler.*')]) href="{{ route('urunler-ve-hizmetler.index') }}">
                  <span>Ürün ve Hizmetlerimiz</span>
                </a>
                <button class="mobile-nav-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#mobileUrunlerMenu" aria-controls="mobileUrunlerMenu" aria-expanded="{{ request()->routeIs('urunler-ve-hizmetler.*') ? 'true' : 'false' }}" aria-label="Ürün ve Hizmetlerimiz alt menüsünü aç veya kapat">
                  <span class="mobile-nav-chevron" aria-hidden="true"></span>
                </button>
              </div>
              <div id="mobileUrunlerMenu" @class(['mobile-submenu collapse', 'show' => request()->routeIs('urunler-ve-hizmetler.*')]) data-bs-parent="#mobileNavigationAccordion">
                <a @class(['mobile-submenu-link', 'active' => request()->routeIs('urunler-ve-hizmetler.kamera-sistemleri')]) href="{{ route('urunler-ve-hizmetler.kamera-sistemleri') }}">Kamera Sistemleri</a>
                <a @class(['mobile-submenu-link', 'active' => request()->routeIs('urunler-ve-hizmetler.alarm-sistemleri')]) href="{{ route('urunler-ve-hizmetler.alarm-sistemleri') }}">Alarm Sistemleri</a>
                <a class="mobile-submenu-link" href="{{ route('urunler-ve-hizmetler.index') }}">Yenilikçi Ürünler</a>
                <a class="mobile-submenu-link" href="{{ route('urunler-ve-hizmetler.index') }}">Hizmetlerimiz</a>
                <a class="mobile-submenu-link" href="{{ route('urunler-ve-hizmetler.index') }}">Termal Kamera Çözümleri</a>
              </div>
            </li>

            <li class="mobile-nav-item">
              <a @class(['mobile-nav-link', 'active' => request()->routeIs('online-islemler')]) href="{{ route('online-islemler') }}">
                <span>Online İşlemler</span>
              </a>
            </li>

            <li class="mobile-nav-item">
              <a @class(['mobile-nav-link', 'active' => request()->routeIs('bloglar.*')]) href="{{ route('bloglar.index') }}">
                <span>Bloglar</span>
              </a>
            </li>

            <li class="mobile-nav-item">
              <a @class(['mobile-nav-link', 'active' => request()->routeIs('iletisim')]) href="{{ route('iletisim') }}">
                <span>İletişim</span>
              </a>
            </li>
          </ul>
        </nav>

        <a class="mobile-quote-button quote-button btn btn-primary w-100" href="{{ route('home') }}#ucretsiz-kesif">
          Teklif Al
        </a>
      </div>
    </div>
  </div>
</header>
