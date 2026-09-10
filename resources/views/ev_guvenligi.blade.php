<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="Tepenet ev alarm sistemleri, güvenlik bileşenleri ve ücretsiz keşif hizmeti."
    />
    <title>Ev Alarm Sistemleri | Tepenet Güvenlik</title>

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

  <body class="page-ev-guvenligi">
    @include('partials.navbar')

    <main>
      <section class="hero" id="ucretsiz-kesif-hero" aria-labelledby="page-title">
        <div class="hero__image">
          <img
            src="{{ asset('resimler/ev_guvenligi/banner.png') }}"
            alt="Güvenlik sistemiyle korunan modern ev"
          />
        </div>
        <!--   
        
        <div class="container">
          <div class="hero__content">
            <h1 id="page-title">Tepenet ile Eviniz Güvende!</h1>
            <p>
              Siz uzaktayken aklınız evinizde kalmasın. Evinizi akıllı alarm,
              kamera ve anlık bildirim çözümleriyle koruma altına alın.
            </p>
          </div>
        </div>
        
        
        -->

        <aside id="kesif" class="hero-request" aria-labelledby="quick-request-title">
          <h2 id="quick-request-title">Ücretsiz Keşif</h2>
          <p>
            Evinize uygun sistemi belirlemek için iletişim bilgilerinizi
            bırakın.
          </p>
          @include('partials.hero-discovery-form', [
            'idPrefix' => 'ev-hero-kesif',
            'sourcePage' => 'ev-guvenligi',
            'workplaceDefault' => false,
          ])
        </aside>
      </section>

      <section class="section-space" id="kullanim-alanlari">
        <div class="container">
          <div class="section-heading">
            <span class="section-heading__eyebrow">Ev güvenliği</span>
            <h2>Ev Alarm Sistemleri</h2>
            <h3>Alarm ve Güvenlik Sistemleri Kullanım Alanları</h3>
            <p>
              Evinizde veya dışarıdayken sevdiklerinizi ve yaşam alanınızı
              izinsiz giriş, yangın ve benzeri risklere karşı bütünleşik
              güvenlik çözümleriyle koruyabilirsiniz.
            </p>
          </div>

          <div class="room-tabs">
            <ul class="nav nav-tabs" id="roomTabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="living-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#living-pane"
                  type="button"
                  role="tab"
                  aria-controls="living-pane"
                  aria-selected="true"
                >
                  Oturma Odası
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="kitchen-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#kitchen-pane"
                  type="button"
                  role="tab"
                  aria-controls="kitchen-pane"
                  aria-selected="false"
                >
                  Mutfak
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="outdoor-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#outdoor-pane"
                  type="button"
                  role="tab"
                  aria-controls="outdoor-pane"
                  aria-selected="false"
                >
                  Dış Mekân
                </button>
              </li>
            </ul>

            <div class="tab-content" id="roomTabsContent">
              <div
                class="tab-pane fade show active room-pane"
                id="living-pane"
                role="tabpanel"
                aria-labelledby="living-tab"
                tabindex="0"
              >
                <div class="scene-placeholder">
                  <img
                    src="{{ asset('resimler/ev_guvenligi/tab-evicin.png') }}"
                    alt="Oturma odası alarm sistemi yerleşimi"
                  />
                </div>
                <div class="device-grid row row-cols-1 row-cols-md-2 g-3">
                  <div class="col">
                    <article class="device-card">
                      <div class="device-visual">
                        <img
                          src="{{ asset('resimler/ev_guvenligi/cam_kirilma.png') }}"
                          alt="Akustik cam kırılma dedektörü"
                        />
                      </div>
                      <div>
                        <h3>Akustik Cam Kırılma Dedektörü</h3>
                        <p>
                          Cam kırılmasına özgü ses frekanslarını analiz ederek
                          alarm sistemini uyarır.
                        </p>
                      </div>
                    </article>
                  </div>
                  <div class="col">
                    <article class="device-card">
                      <div class="device-visual">
                        <img
                          src="{{ asset('resimler/ev_guvenligi/manyetik.png') }}"
                          alt="Manyetik kontak"
                        />
                      </div>
                      <div>
                        <h3>Manyetik Kontak</h3>
                        <p>
                          Kapı veya pencerenin izinsiz açıldığını algılayarak
                          sisteme sinyal gönderir.
                        </p>
                      </div>
                    </article>
                  </div>
                  <div class="col">
                    <article class="device-card">
                      <div class="device-visual">
                        <img
                          src="{{ asset('resimler/ev_guvenligi/kamera2.png') }}"
                          alt="Ev güvenlik kamerası"
                        />
                      </div>
                      <div>
                        <h3>Kamera</h3>
                        <p>
                          Canlı görüntüye ve geçmiş kayıtlara web veya mobil
                          cihazlardan erişmenizi sağlar.
                        </p>
                      </div>
                    </article>
                  </div>
                  <div class="col">
                    <article class="device-card">
                      <div class="device-visual">
                        <img
                          src="{{ asset('resimler/ev_guvenligi/hareket.png') }}"
                          alt="Hareket dedektörü"
                        />
                      </div>
                      <div>
                        <h3>Hareket Dedektörü</h3>
                        <p>
                          Korunan alandaki hareketi algılar ve kontrol paneline
                          anında bildirim iletir.
                        </p>
                      </div>
                    </article>
                  </div>
                </div>
              </div>

              <div
                class="tab-pane fade room-pane"
                id="kitchen-pane"
                role="tabpanel"
                aria-labelledby="kitchen-tab"
                tabindex="0"
              >
                <div class="scene-placeholder">
                  <img
                    src="{{ asset('resimler/ev_guvenligi/mutfak.jpg') }}"
                    alt="Mutfak alarm sistemi yerleşimi"
                  />
                </div>
                <div class="device-grid row row-cols-1 row-cols-md-2 g-3">
                  <div class="col">
                    <article class="device-card">
                      <div class="device-visual">
                        <img
                          src="{{ asset('resimler/ev_guvenligi/duman_dedektoru.png') }}"
                          alt="Duman dedektörü"
                        />
                      </div>
                      <div>
                        <h3>Duman Dedektörü</h3>
                        <p>
                          Yangının erken işaretlerinden olan dumanı algılayarak
                          sesli ve merkezi uyarı oluşturur.
                        </p>
                      </div>
                    </article>
                  </div>
                  <div class="col">
                    <article class="device-card">
                      <div class="device-visual">
                        <img
                          src="{{ asset('resimler/ev_guvenligi/gaz.png') }}"
                          alt="Gaz dedektörü"
                        />
                      </div>
                      <div>
                        <h3>Gaz Dedektörü</h3>
                        <p>
                          Olası gaz kaçaklarını sürekli takip eder ve riskli
                          seviyelerde kullanıcıyı uyarır.
                        </p>
                      </div>
                    </article>
                  </div>
                  <div class="col">
                    <article class="device-card">
                      <div class="device-visual">
                        <img
                          src="{{ asset('resimler/ev_guvenligi/manyetik.png') }}"
                          alt="Manyetik kontak"
                        />
                      </div>
                      <div>
                        <h3>Manyetik Kontak</h3>
                        <p>
                          Mutfak kapısı ve pencereleri üzerinden oluşabilecek
                          izinsiz girişleri takip eder.
                        </p>
                      </div>
                    </article>
                  </div>
                  <div class="col">
                    <article class="device-card">
                      <div class="device-visual">
                        <img
                          src="{{ asset('resimler/ev_guvenligi/cam_kirilma.png') }}"
                          alt="Dahili siren"
                        />
                      </div>
                      <div>
                        <h3>Akustik Cam Kırılma Dedektörü</h3>
                        <p>
                          Risk anında güçlü sesli uyarı vererek ev halkının
                          hızlı biçimde haberdar olmasını sağlar.
                        </p>
                      </div>
                    </article>
                  </div>
                </div>
              </div>

              <div
                class="tab-pane fade room-pane"
                id="outdoor-pane"
                role="tabpanel"
                aria-labelledby="outdoor-tab"
                tabindex="0"
              >
                <div class="scene-placeholder">
                  <img
                    src="{{ asset('resimler/ev_guvenligi/dis-mekan.jpg') }}"
                    alt="Dış mekân alarm sistemi yerleşimi"
                  />
                </div>
                <div class="device-grid row row-cols-1 row-cols-md-2 g-3">
                  <div class="col">
                    <article class="device-card">
                      <div class="device-visual">
                        <img
                          src="{{ asset('resimler/ev_guvenligi/dahili_siren.png') }}"
                          alt="Dış ortam sireni"
                        />
                      </div>
                      <div>
                        <h3>Dış Ortam Sireni</h3>
                        <p>
                          Yüksek sesli ve görünür uyarıyla çevreyi
                          bilgilendirir, caydırıcılığı artırır.
                        </p>
                      </div>
                    </article>
                  </div>
                  <div class="col">
                    <article class="device-card">
                      <div class="device-visual">
                        <img
                          src="{{ asset('resimler/ev_guvenligi/kamera.png') }}"
                          alt="Dış mekân güvenlik kamerası"
                        />
                      </div>
                      <div>
                        <h3>Dış Mekân Kamerası</h3>
                        <p>
                          Bahçe ve bina çevresini hava koşullarına dayanıklı
                          yapısıyla sürekli izler.
                        </p>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="installation-section section-space" id="kurulum">
        <div class="container">
          <div class="row align-items-start g-4 g-lg-5">
            <div class="col-12 col-lg-4">
              <h2 class="installation-title">Ev Alarm Sistemleri Kurulumu</h2>
            </div>
            <div class="col-12 col-lg-8 installation-copy">
              <p>
                Ev alarm sistemi yalnızca izinsiz girişlere karşı değil; yangın,
                gaz kaçağı, panik ve acil yardım gerektiren farklı durumlara
                karşı da katmanlı koruma sağlayacak biçimde planlanabilir.
              </p>
              <p>
                Ücretsiz keşif sırasında evin büyüklüğü, giriş noktaları ve
                yaşam alışkanlıkları değerlendirilir. Bu inceleme sonucunda
                kablolu veya kablosuz ürünlerden oluşan, eve özel bir çözüm
                önerilir.
              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="section-space" aria-labelledby="reasons-title">
        <div class="container">
          <div class="row align-items-center g-5">
            <div class="col-12 col-lg-4">
              <h2 class="reasons-title" id="reasons-title">
                Tepenet’i tercih etmeniz için<br />
                <strong>4 güçlü neden!</strong>
              </h2>
              <p class="reasons-copy">
                Güvenilir teknoloji, profesyonel destek ve ihtiyaca göre
                şekillenen çözümlerle ev güvenliğini tek noktadan yönetin.
              </p>
              <a class="reference-cta" href="{{ route('kendi-sistemini-olustur.index') }}"
                >Hemen Teklif Al →</a
              >
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


    </main>

    <a class="floating-discovery" href="#kesif"
      ><span aria-hidden="true">✓</span> Ücretsiz Keşif</a
    >

    @include('partials.footer')

    <script>
      document.querySelectorAll("[data-hero-discovery-form]").forEach((form) => {
        const workplaceToggle = form.querySelector("[data-workplace-toggle]");
        const branchCountWrapper = form.querySelector("[data-branch-count-wrapper]");
        const branchCount = form.querySelector("[data-branch-count]");

        function updateHeroBranchCount() {
          const isVisible = workplaceToggle.checked;
          branchCountWrapper.hidden = !isVisible;
          branchCount.required = isVisible;

          if (!isVisible) {
            branchCount.value = "";
          }
        }

        workplaceToggle.addEventListener("change", updateHeroBranchCount);
        updateHeroBranchCount();
      });

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
