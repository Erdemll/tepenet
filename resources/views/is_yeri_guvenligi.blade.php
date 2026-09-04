<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="Tepenet iş yeri alarm sistemleri, iç ve dış mekân güvenlik bileşenleri ve ücretsiz keşif hizmeti."
    />
    <title>İş Yeri Alarm Sistemleri | Tepenet Güvenlik</title>

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

  <body class="page-is-yeri-guvenligi">
    @include('partials.navbar')

    <main>
      <section class="hero" aria-labelledby="page-title">
        <div class="hero__image">
          <img src="{{ asset('resimler/is_guvenligi/ana_banner.png') }}" alt="Güvenlik sistemiyle korunan modern iş yeri" />
        </div>
        

        <aside class="hero-request" aria-labelledby="quick-request-title">
          <h2 id="quick-request-title">Ücretsiz Keşif</h2>
          <p>İş yerinize uygun sistemi belirlemek için iletişim bilgilerinizi bırakın.</p>
          <form action="#" method="post">
            <div class="mb-3">
              <label class="visually-hidden" for="hizli-ad">Adınız</label>
              <input class="form-control" id="hizli-ad" name="ad" type="text" placeholder="Adınız" autocomplete="given-name" required />
            </div>
            <div class="mb-3">
              <label class="visually-hidden" for="hizli-telefon">Telefon numaranız</label>
              <input class="form-control" id="hizli-telefon" name="telefon" type="tel" placeholder="Telefon Numaranız" autocomplete="tel" required />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" id="hizli-kvkk" name="kvkk_onayi" type="checkbox" required />
              <label class="form-check-label" for="hizli-kvkk">
                <a href="#">Aydınlatma metnini</a> okudum ve anladım.
              </label>
            </div>
            <button class="submit-button btn" type="submit">Talep Oluştur →</button>
          </form>
        </aside>
      </section>

      <section class="section-space" id="kullanim-alanlari">
        <div class="container">
          <div class="section-heading">
            <span class="section-heading__eyebrow">İş yeri güvenliği</span>
            <h2>İş Yeri Alarm Sistemleri</h2>
            <h3>İş Yeri Alarm ve Güvenlik Sistemleri Kullanım Alanları</h3>
            <p>
              İş yerinizi, çalışanlarınızı ve ticari varlıklarınızı izinsiz giriş,
              yangın ve benzeri risklere karşı bütünleşik güvenlik çözümleriyle
              günün her saati koruma altına alabilirsiniz.
            </p>
          </div>

          <div class="room-tabs">
            <ul class="nav nav-tabs" id="roomTabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="indoor-tab" data-bs-toggle="tab" data-bs-target="#indoor-pane" type="button" role="tab" aria-controls="indoor-pane" aria-selected="true">İç Mekân</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="outdoor-tab" data-bs-toggle="tab" data-bs-target="#outdoor-pane" type="button" role="tab" aria-controls="outdoor-pane" aria-selected="false">Dış Mekân</button>
              </li>
            </ul>

            <div class="tab-content" id="roomTabsContent">
              <div class="tab-pane fade show active room-pane" id="indoor-pane" role="tabpanel" aria-labelledby="indoor-tab" tabindex="0">
                <div class="scene-placeholder">
                  <img src="{{ asset('resimler/is_guvenligi/ofisici.jpg') }}" alt="İş yeri iç mekân alarm sistemi yerleşimi" />
                </div>
                <div class="device-grid row row-cols-1 row-cols-md-2 g-3">
                  <div class="col">
                    <article class="device-card">
                      <div class="device-visual"><img src="{{ asset('resimler/ev_guvenligi/cam_kirilma.png') }}" alt="Akustik cam kırılma dedektörü" /></div>
                      <div><h3>Akustik Cam Kırılma Dedektörü</h3><p>Cam kırılmasına özgü ses frekanslarını analiz ederek alarm sistemini uyarır.</p></div>
                    </article>
                  </div>
                  <div class="col">
                    <article class="device-card">
                      <div class="device-visual"><img src="{{ asset('resimler/ev_guvenligi/manyetik.png') }}" alt="Manyetik kontak" /></div>
                      <div><h3>Manyetik Kontak</h3><p>Kapı veya pencerenin izinsiz açıldığını algılayarak sisteme sinyal gönderir.</p></div>
                    </article>
                  </div>
                  <div class="col">
                    <article class="device-card">
                      <div class="device-visual"><img src="{{ asset('resimler/ev_guvenligi/kamera2.png') }}" alt="İş yeri güvenlik kamerası" /></div>
                      <div><h3>Kamera</h3><p>İş yerinizi uzaktan izlemenize, canlı görüntülere ve geçmiş kayıtlara erişmenize yardımcı olur.</p></div>
                    </article>
                  </div>
                  <div class="col">
                    <article class="device-card">
                      <div class="device-visual"><img src="{{ asset('resimler/ev_guvenligi/duman_dedektoru.png') }}" alt="Duman dedektörü" /></div>
                      <div><h3>Duman Dedektörü</h3><p>Yangının erken belirtilerinden olan dumanı algılayarak alarm merkezine ve kullanıcıya uyarı iletir.</p></div>
                    </article>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade room-pane" id="outdoor-pane" role="tabpanel" aria-labelledby="outdoor-tab" tabindex="0">
                <div class="scene-placeholder">
                  <img src="{{ asset('resimler/is_guvenligi/eczane.jpg') }}" alt="İş yeri dış mekân alarm sistemi yerleşimi" />
                </div>
                <div class="device-grid row row-cols-1 row-cols-md-2 g-3">
                  <div class="col">
                    <article class="device-card">
                      <div class="device-visual"><img src="{{ asset('resimler/ev_guvenligi/dahili_siren.png') }}" alt="Dahili siren" /></div>
                      <div><h3>Dahili Siren</h3><p>Alarm anında güçlü bir sesli uyarı oluşturarak iş yerindekileri haberdar eder ve caydırıcılık sağlar.</p></div>
                    </article>
                  </div>
                  <div class="col">
                    <article class="device-card">
                      <div class="device-visual"><img src="{{ asset('resimler/ev_guvenligi/kamera.png') }}" alt="İş yeri güvenlik kamerası" /></div>
                      <div><h3>Kamera</h3><p>Girişleri ve iş yerinin çevresini kayıt altına alarak olayların uzaktan takip edilmesini kolaylaştırır.</p></div>
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
              <h2 class="installation-title">İş Yeri Alarm Sistemleri</h2>
            </div>
            <div class="col-12 col-lg-8 installation-copy">
              <p>
                İş yeri alarm sistemleri yalnızca hırsızlık girişimlerine karşı
                değil; yangın, gaz kaçağı, sağlık sorunları, panik ve tehdit gibi
                acil durumlara karşı da katmanlı koruma sunacak şekilde planlanabilir.
              </p>
              <p>
                Ücretsiz keşif sırasında iş yerinin fiziksel yapısı, giriş ve
                çıkış noktaları ile çalışma düzeni değerlendirilir. İnceleme
                sonucunda ihtiyaca göre kablolu ya da kablosuz bileşenlerden
                oluşan iş yerine özel bir güvenlik çözümü hazırlanır.
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
                şekillenen çözümlerle iş yeri güvenliğini tek noktadan yönetin.
              </p>
              <a class="reference-cta" href="#ucretsiz-kesif">Hemen Teklif Al →</a>
            </div>
            <div class="col-12 col-lg-8">
              <ul class="reasons-list">
                <li><span class="reason-icon">✓</span> Güvenilir güvenlik teknolojisi</li>
                <li><span class="reason-icon">TR</span> Geniş hizmet ve destek ağı</li>
                <li><span class="reason-icon">₺</span> İhtiyaca uygun fiyat seçenekleri</li>
                <li><span class="reason-icon">7/24</span> Tek telefonla hızlı destek</li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <section class="discovery-section section-space" id="ucretsiz-kesif" aria-labelledby="discovery-title">
        <div class="container">
          <div class="discovery-shell">
            <div class="row g-0">
              <div class="col-12 col-lg-4">
                <div class="discovery-visual">
                  <img src="{{ asset('resimler/ev_guvenligi/genel-teklif-form_0.png') }}" alt="İş yeri güvenliği için Tepenet müşteri temsilcisi" />
                </div>
              </div>
              <div class="col-12 col-lg-8">
                <div class="discovery-content">
                  <p class="discovery-kicker">Ücretsiz Keşfe</p>
                  <h2 class="discovery-title" id="discovery-title">Hazır mısınız?</h2>
                  <p class="discovery-intro">
                    İş yeriniz için en uygun alarm sistemini birlikte belirlemek
                    üzere bilgilerinizi bırakın.
                  </p>

                  <form action="#" method="post">
                    <div class="row g-3">
                      <div class="col-12 col-md-6">
                        <label class="visually-hidden" for="kesif-ad">Adınız</label>
                        <input class="form-control" id="kesif-ad" name="ad" type="text" placeholder="Adınız" autocomplete="given-name" required />
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="visually-hidden" for="kesif-soyad">Soyadınız</label>
                        <input class="form-control" id="kesif-soyad" name="soyad" type="text" placeholder="Soyadınız" autocomplete="family-name" required />
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="visually-hidden" for="kesif-telefon">Telefon numaranız</label>
                        <input class="form-control" id="kesif-telefon" name="telefon" type="tel" placeholder="Telefon Numaranız" autocomplete="tel" required />
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="visually-hidden" for="kesif-email">E-posta adresiniz</label>
                        <input class="form-control" id="kesif-email" name="email" type="email" placeholder="E-Posta" autocomplete="email" />
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="visually-hidden" for="urun-grubu">Ürün grubu</label>
                        <select class="form-select" id="urun-grubu" name="urun_grubu" required>
                          <option value="" selected disabled>Ürün Grubu Seçiniz</option>
                          <option value="alarm">Alarm Sistemleri</option>
                          <option value="kamera">Kamera Sistemleri</option>
                          <option value="diger">Diğer</option>
                        </select>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="visually-hidden" for="kesif-il">İl seçiniz</label>
                        <select class="form-select" id="kesif-il" name="il" required>
                          <option value="" selected disabled>İl Seçiniz</option>
                          <option value="bursa">Bursa</option>
                          <option value="istanbul">İstanbul</option>
                          <option value="ankara">Ankara</option>
                        </select>
                      </div>
                      <div class="col-12">
                        <div class="form-check mt-2">
                          <input class="form-check-input" id="isyeri-talebi" name="isyeri_talebi" type="checkbox" checked />
                          <label class="form-check-label" for="isyeri-talebi">Bu keşif talebi iş yeri içindir.</label>
                        </div>
                      </div>
                      <div class="col-12" id="sube-sayisi-wrapper">
                        <label class="visually-hidden" for="sube-sayisi">Şube sayısı</label>
                        <input class="form-control" id="sube-sayisi" name="sube_sayisi" type="number" min="1" placeholder="Şube Sayısı" />
                      </div>
                      <div class="col-12">
                        <div class="form-check mt-2">
                          <input class="form-check-input" id="kampanya-izni" name="kampanya_izni" type="checkbox" />
                          <label class="form-check-label" for="kampanya-izni">
                            Tepenet Güvenlik’in kampanya ve duyurular için benimle iletişime geçmesine izin veriyorum. <a href="#">Detay</a>
                          </label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" id="kvkk-onayi" name="kvkk_onayi" type="checkbox" required />
                          <label class="form-check-label" for="kvkk-onayi">
                            Kişisel verilerin korunmasına ilişkin <a href="#">aydınlatma metnini</a> okudum ve anladım. <span class="text-danger">*</span>
                          </label>
                        </div>
                      </div>
                      <div class="col-12 mt-4">
                        <button class="submit-button btn" type="submit">Gönder →</button>
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

    <a class="floating-discovery" href="#ucretsiz-kesif"><span aria-hidden="true">✓</span> Ücretsiz Keşif</a>

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
