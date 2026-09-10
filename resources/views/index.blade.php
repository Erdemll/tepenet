<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tepenet Güvenlik</title>
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
  <body class="page-index">
    @include('partials.navbar')

    <main>
      <section aria-label="Öne çıkan güvenlik çözümleri">
        <div
          id="carousel-giris"
          class="hero-carousel carousel slide"
          data-bs-ride="carousel"
        >
          <div class="carousel-indicators">
            <button
              type="button"
              data-bs-target="#carousel-giris"
              data-bs-slide-to="0"
              class="active"
              aria-current="true"
              aria-label="Slide 1"
            ></button>
            <button
              type="button"
              data-bs-target="#carousel-giris"
              data-bs-slide-to="1"
              aria-label="Slide 2"
            ></button>
            <button
              type="button"
              data-bs-target="#carousel-giris"
              data-bs-slide-to="2"
              aria-label="Slide 3"
            ></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
              <img
                src="{{ asset('resimler/anasayfa/anasayfa_banner_1.jpeg') }}"
                class="d-block w-100"
                alt="Tepenet ev ve iş yeri güvenlik çözümleri"
              />
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img
                src="{{ asset('resimler/anasayfa/anasayfa_banner_2.jpeg') }}"
                class="d-block w-100"
                alt="Tepenet alarm ve kamera sistemleri"
              />
            </div>
            <div class="carousel-item" data-bs-interval="3000">
              <img
                src="{{ asset('resimler/anasayfa/anasayfa_banner_3.jpeg') }}"
                class="d-block w-100"
                alt="Tepenet alarm ve kamera sistemleri"
              />
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carousel-giris"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carousel-giris"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>

      <section class="intro-section section-space text-center">
        <div class="container position-relative">
          <h2 class="section-title">Neden Tepenet Güvenlik?</h2>
          <div class="intro-copy">
            <p>
              Tepenet Güvenlik, geliştirdiği yüksek
              teknolojiye sahip alarm sistemleri, kamera çözümleri ve 7/24
              izleme hizmetleriyle evinizi ve iş yerinizi kesintisiz korur.
            </p>
            <p>
              Ev güvenliği, iş yeri güvenliği ve akıllı alarm teknolojilerinde
              Türkiye’nin lider markalarından biri olan Tepenet Güvenlik; kaliteye verdiği önem, geniş servis ağı ve kullanıcı
              dostu ara yüzleriyle fark yaratır.
            </p>
          </div>
        </div>
      </section>

      <section class="solutions-section section-space">
        <div class="container">
          <div class="solutions-shell">
            <div class="d-flex justify-content-center align-items-center">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link active"
                    id="home-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#home-tab-pane"
                    type="button"
                    role="tab"
                    aria-controls="home-tab-pane"
                    aria-selected="true"
                  >
                    Alarm Sistemleri
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link"
                    id="profile-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#profile-tab-pane"
                    type="button"
                    role="tab"
                    aria-controls="profile-tab-pane"
                    aria-selected="false"
                  >
                    Kamera Sistemleri
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link"
                    id="contact-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#contact-tab-pane"
                    type="button"
                    role="tab"
                    aria-controls="contact-tab-pane"
                    aria-selected="false"
                  >
                    Alarm İzleme Merkezi
                  </button>
                </li>
              </ul>
            </div>

            <div class="solution-content tab-content" id="myTabContent">
              <div
                class="tab-pane fade show active"
                id="home-tab-pane"
                role="tabpanel"
                aria-labelledby="home-tab"
                tabindex="0"
              >
                <div>
                  <img
                    class="img-fluid"
                    src="{{ asset('resimler/anasayfa/gorsel1.jpeg') }}"
                    alt="Siz yoksanız biz varız güvenlik hizmeti"
                  />
                  <div class="solution-copy">
                    <div>
                      Ev ya da iş yeriniz için alarm sistemi arıyorsanız, Tepenet
                      Alarm ile tanışın.
                    </div>
                    <div>
                      Kamera sistemleri, akıllı alarm çözümleri ve anlık
                      müdahale güvencesiyle sizi, sevdiklerinizi ve
                      değerlerinizi en üst düzeyde koruma altına alın.
                      Güvenlikte fark yaratmak için şimdi Tepenet Alarm’ı tercih
                      edin.
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="profile-tab-pane"
                role="tabpanel"
                aria-labelledby="profile-tab"
                tabindex="0"
              >
                <div>
                  <img
                    class="img-fluid"
                    src="{{ asset('resimler/anasayfa/gorsel2.png') }}"
                    alt="Yedi gün yirmi dört saat kamera güvenliği"
                  />
                  <div class="solution-copy">
                    <div>
                      Ev ya da iş yeriniz için alarm sistemi arıyorsanız, Tepenet
                      Alarm ile tanışın.
                    </div>
                    <div>
                      Kamera sistemleri, akıllı alarm çözümleri ve anlık
                      müdahale güvencesiyle sizi, sevdiklerinizi ve
                      değerlerinizi en üst düzeyde koruma altına alın.
                      Güvenlikte fark yaratmak için şimdi Tepenet Alarm’ı tercih
                      edin.
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="contact-tab-pane"
                role="tabpanel"
                aria-labelledby="contact-tab"
                tabindex="0"
              >
                <div>
                  <img
                    class="img-fluid"
                    src="{{ asset('resimler/anasayfa/gorsel3.png') }}"
                    alt="Alarm izleme merkezi hizmeti"
                  />
                  <div class="solution-copy">
                    <div>
                      Ev ya da iş yeriniz için alarm sistemi arıyorsanız, Tepenet
                      Alarm ile tanışın.
                    </div>
                    <div>
                      Kamera sistemleri, akıllı alarm çözümleri ve anlık
                      müdahale güvencesiyle sizi, sevdiklerinizi ve
                      değerlerinizi en üst düzeyde koruma altına alın.
                      Güvenlikte fark yaratmak için şimdi Tepenet Alarm’ı tercih
                      edin.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="audience-section section-space">
        <div class="container">
          <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4">
              <article class="audience-card card">
                <div class="audience-card__visual">
                  <img
                    src="{{ asset('resimler/ev-icin.png.webp') }}"
                    alt="Ev güvenlik sistemi"
                  />
                </div>
                <div class="card-body">
                  <h3 class="card-title">Eviniz için</h3>
                  <p class="card-text">
                    Sevdiklerinizi ve yaşam alanınızı akıllı alarm çözümleriyle
                    günün her saati koruyun.
                  </p>
                  <a class="audience-card__link" href="{{ route('ev-guvenligi.index') }}"
                    >Çözümleri inceleyin →</a
                  >
                </div>
              </article>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
              <article class="audience-card card">
                <div class="audience-card__visual">
                  <img
                    src="{{ asset('resimler/is-yeri-icin.png.webp') }}"
                    alt="İş yeri güvenlik sistemi"
                  />
                </div>
                <div class="card-body">
                  <h3 class="card-title">İş yeriniz için</h3>
                  <p class="card-text">
                    İşletmenizi kamera, alarm ve anlık müdahale hizmetleriyle
                    kesintisiz güvence altına alın.
                  </p>
                  <a class="audience-card__link" href="{{ route('is-yeri-guvenligi.index') }}"
                    >Çözümleri inceleyin →</a
                  >
                </div>
              </article>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
              <article class="audience-card card">
                <div class="audience-card__visual">
                  <img
                    src="{{ asset('resimler/kendi-kaleni-yarat.png.webp') }}"
                    alt="Kişiselleştirilebilir güvenlik sistemi"
                  />
                </div>
                <div class="card-body">
                  <h3 class="card-title">Kendi sisteminizi oluşturun</h3>
                  <p class="card-text">
                    Alanınıza ve beklentinize göre güvenlik ürünlerini bir araya
                    getirerek size özel sistemi kurun.
                  </p>
                  <a class="audience-card__link" href="{{ route('kendi-sistemini-olustur.index') }}"
                    >Sisteminizi oluşturun →</a
                  >
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>

      <section class="reasons-section section-space" id="neden-tepenet">
        <div class="container">
          <div class="row align-items-center g-5">
            <div class="col-12 col-lg-4">
              <h2 class="reasons-title">
                Tepenet’i tercih etmeniz için<br />
                <strong>4 güçlü neden!</strong>
              </h2>
              <p class="reasons-copy">
                Güvenilir teknoloji, profesyonel destek, hızlı müdahale ve
                ihtiyacınıza özel çözümlerle yaşam alanlarınızı koruyoruz.
              </p>
              <a class="reference-cta" href="#ucretsiz-kesif">
                Hemen Teklif Al →
              </a>
            </div>
            <div class="col-12 col-lg-8">
              <ul class="reasons-list">
                <li>
                  <span class="reason-icon">✓</span> Güvenilir güvenlik
                  teknolojisi
                </li>
                <li>
                  <span class="reason-icon">TR</span> Geniş hizmet ve destek ağı
                </li>
                <li>
                  <span class="reason-icon">₺</span> İhtiyaca uygun fiyat
                  seçenekleri
                </li>
                <li>
                  <span class="reason-icon">7/24</span> Tek telefonla hızlı
                  destek
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <section class="blog-section" aria-labelledby="blog-title">
        <div class="container">
          <div class="blog-section__header">
            <h2 id="blog-title">Tepenet Blog</h2>
            <a class="blog-section__all" href="{{ route('bloglar.index') }}"
              >Tüm yazıları görüntüleyin →</a
            >
          </div>
          <div class="row row-cols-1 row-cols-md-2 row-cols-xl-5 g-4">
            <div class="col">
              <article class="blog-card card">
                <div class="blog-card__visual">
                  <img 
                    src="{{ asset('resimler/anasayfa/urun1-removebg-preview.png') }}"
                    alt="Alarm kontrol paneli"
                  />
                </div>
                <div class="card-body">
                  <h3 class="card-title">Alarm Sistemleri Nasıl Çalışır?</h3>
                  <p class="card-text">
                    Alarm sistemlerinin temel bileşenlerini ve çalışma mantığını
                    keşfedin.
                  </p>
                  <a class="blog-card__link" href="#">Devamını okuyun →</a>
                </div>
              </article>
            </div>
            <div class="col">
              <article class="blog-card card">
                <div class="blog-card__visual">
                  <img
                    src="{{ asset('resimler/anasayfa/urun2-removebg-preview.png') }}"
                    alt="Dahili alarm sireni"
                  />
                </div>
                <div class="card-body">
                  <h3 class="card-title">Dahili Siren Neden Önemlidir?</h3>
                  <p class="card-text">
                    Evinizde ve iş yerinizde sesli uyarının güvenliğe katkısını
                    öğrenin.
                  </p>
                  <a class="blog-card__link" href="#">Devamını okuyun →</a>
                </div>
              </article>
            </div>
            <div class="col">
              <article class="blog-card card">
                <div class="blog-card__visual">
                  <img
                    src="{{ asset('resimler/anasayfa/urun3-removebg-preview.png') }}"
                    alt="Dış ortam alarm sireni"
                  />
                </div>
                <div class="card-body">
                  <h3 class="card-title">Dış Ortam Sireni Ne İşe Yarar?</h3>
                  <p class="card-text">
                    Dış ortam sirenlerinin caydırıcılık ve hızlı bildirim
                    avantajlarını inceleyin.
                  </p>
                  <a class="blog-card__link" href="#">Devamını okuyun →</a>
                </div>
              </article>
            </div>
            
          </div>
        </div>
      </section>

      <section
        class="discovery-section"
        id="ucretsiz-kesif"
        aria-labelledby="discovery-title"
      >
        <div class="container">
          <div class="discovery-shell">
            <div class="row g-0">
              <div class="col-12 col-lg-4">
                <div class="discovery-visual">
                  <img
                    src="{{ asset('resimler/ka_iletisim_merkezi_436x666px.jpg') }}"
                    alt="Tepenet müşteri hizmetleri temsilcisi"
                  />
                </div>
              </div>
              <div class="col-12 col-lg-8">
                <div class="discovery-content">
                  <p class="discovery-kicker">Ücretsiz Keşif</p>
                  <h2 class="discovery-title" id="discovery-title">
                    Hazır mısınız?
                  </h2>
                  <p class="discovery-intro">
                    Eviniz veya iş yeriniz için en uygun alarm sistemini
                    birlikte belirlemek üzere bilgilerinizi bırakın.
                  </p>

                  @if (session('discovery_success'))
                    <div class="alert alert-success" role="status">
                      {{ session('discovery_success') }}
                    </div>
                  @endif

                  @if (session('discovery_error'))
                    <div class="alert alert-danger" role="alert">
                      {{ session('discovery_error') }}
                    </div>
                  @endif

                  @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                      Lütfen işaretli alanları kontrol edin.
                    </div>
                  @endif

                  <form
                    class="discovery-form"
                    action="{{ route('discovery.store') }}"
                    method="post"
                  >
                    @csrf
                    <div class="row g-3">
                      <div class="col-12 col-md-6">
                        <label class="visually-hidden" for="kesif-ad"
                          >Adınız</label
                        >
                        <input
                          class="form-control @error('ad') is-invalid @enderror"
                          id="kesif-ad"
                          name="ad"
                          type="text"
                          placeholder="Adınız"
                          autocomplete="given-name"
                          value="{{ old('ad') }}"
                          required
                        />
                        @error('ad')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="visually-hidden" for="kesif-soyad"
                          >Soyadınız</label
                        >
                        <input
                          class="form-control @error('soyad') is-invalid @enderror"
                          id="kesif-soyad"
                          name="soyad"
                          type="text"
                          placeholder="Soyadınız"
                          autocomplete="family-name"
                          value="{{ old('soyad') }}"
                          required
                        />
                        @error('soyad')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="visually-hidden" for="kesif-telefon"
                          >Telefon numaranız</label
                        >
                        <input
                          class="form-control @error('telefon') is-invalid @enderror"
                          id="kesif-telefon"
                          name="telefon"
                          type="tel"
                          inputmode="tel"
                          placeholder="Telefon Numaranız"
                          autocomplete="tel"
                          aria-describedby="telefon-yardim"
                          value="{{ old('telefon') }}"
                          required
                        />
                        <div class="form-text" id="telefon-yardim">
                          Örnek: 5xx xxx xx xx
                        </div>
                        @error('telefon')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="visually-hidden" for="kesif-email"
                          >E-posta adresiniz</label
                        >
                        <input
                          class="form-control @error('email') is-invalid @enderror"
                          id="kesif-email"
                          name="email"
                          type="email"
                          placeholder="E-Posta"
                          autocomplete="email"
                          value="{{ old('email') }}"
                        />
                        @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="visually-hidden" for="urun-grubu"
                          >Ürün grubu</label
                        >
                        <select
                          class="form-select @error('urun_grubu') is-invalid @enderror"
                          id="urun-grubu"
                          name="urun_grubu"
                          required
                        >
                          <option value="" @selected(! old('urun_grubu')) disabled>
                            Ürün Grubu Seçiniz
                          </option>
                          <option value="kamera" @selected(old('urun_grubu') === 'kamera')>Kamera Sistemleri</option>
                          <option value="alarm" @selected(old('urun_grubu') === 'alarm')>Alarm Sistemleri</option>
                          <option value="diger" @selected(old('urun_grubu') === 'diger')>Diğer</option>
                        </select>
                        @error('urun_grubu')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="visually-hidden" for="kesif-il"
                          >İl seçiniz</label
                        >
                        <select
                          class="form-select @error('il') is-invalid @enderror"
                          id="kesif-il"
                          name="il"
                          required
                        >
                          <option value="" @selected(! old('il')) disabled>İl Seçiniz</option>
                          <option value="bursa" @selected(old('il') === 'bursa')>Bursa</option>
                          <option value="istanbul" @selected(old('il') === 'istanbul')>İstanbul</option>
                          <option value="ankara" @selected(old('il') === 'ankara')>Ankara</option>
                        </select>
                        @error('il')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-12">
                        <div class="form-check mt-2">
                          <input
                            class="form-check-input"
                            id="isyeri-talebi"
                            name="isyeri_talebi"
                            type="checkbox"
                            value="1"
                            @checked(old('isyeri_talebi'))
                          />
                          <label class="form-check-label" for="isyeri-talebi"
                            >Ücretsiz keşif talebiniz iş yeri için mi?</label
                          >
                        </div>
                      </div>
                      <div class="col-12" id="sube-sayisi-wrapper" hidden>
                        <label class="visually-hidden" for="sube-sayisi"
                          >Şube sayısı</label
                        >
                        <input
                          class="form-control @error('sube_sayisi') is-invalid @enderror"
                          id="sube-sayisi"
                          name="sube_sayisi"
                          type="number"
                          min="1"
                          placeholder="Şube Sayısı"
                          value="{{ old('sube_sayisi') }}"
                        />
                        @error('sube_sayisi')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-12">
                        <div class="form-check mt-2">
                          <input
                            class="form-check-input"
                            id="kampanya-izni"
                            name="kampanya_izni"
                            type="checkbox"
                            value="1"
                            @checked(old('kampanya_izni'))
                          />
                          <label class="form-check-label" for="kampanya-izni">
                            Tepenet Güvenlik’in kampanya ve duyurular için
                            benimle iletişime geçmesine izin veriyorum.
                            <a href="#">Detay</a>
                          </label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-check">
                          <input
                            class="form-check-input @error('kvkk_onayi') is-invalid @enderror"
                            id="kvkk-onayi"
                            name="kvkk_onayi"
                            type="checkbox"
                            value="1"
                            @checked(old('kvkk_onayi'))
                            required
                          />
                          <label class="form-check-label" for="kvkk-onayi">
                            Kişisel verilerin korunmasına ilişkin
                            <a href="#">aydınlatma metnini</a> okudum ve
                            anladım. <span class="text-danger">*</span>
                          </label>
                          @error('kvkk_onayi')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-12 mt-4">
                        <button class="discovery-submit btn" type="submit">
                          Gönder →
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <a class="floating-discovery" href="#ucretsiz-kesif">
      <span aria-hidden="true">✓</span>
      <span class="floating-discovery__label">Ücretsiz Keşif</span>
    </a>

    @include('partials.footer')

    <script>
      const isYeriTalebi = document.getElementById("isyeri-talebi");
      const subeSayisiWrapper = document.getElementById("sube-sayisi-wrapper");
      const subeSayisi = document.getElementById("sube-sayisi");

      function updateSubeSayisi() {
        const isVisible = isYeriTalebi.checked;
        subeSayisiWrapper.hidden = !isVisible;
        subeSayisi.required = isVisible;

        if (!isVisible) {
          subeSayisi.value = "";
        }
      }

      isYeriTalebi.addEventListener("change", updateSubeSayisi);
      updateSubeSayisi();
    </script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
