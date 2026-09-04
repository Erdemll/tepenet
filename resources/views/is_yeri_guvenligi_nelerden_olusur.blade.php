<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="İş yeri alarm sistemini oluşturan panel, dedektör, siren ve iletişim modüllerini inceleyin."
    />
    <title>İş Yeri Alarm Sistemi Nelerden Oluşur? | Tepenet Güvenlik</title>

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

  <body class="page-is-yeri-guvenligi-nelerden-olusur">
    @include('partials.navbar')

    <main>
      <section class="catalog-hero" aria-labelledby="page-title">
        <div class="catalog-hero__image">
          <img src="{{ asset('resimler/is_guvenligi/20221209_ka_banner.png') }}" alt="İş yeri alarm sistemi bileşenleri ve modern çalışma alanı" />
        </div>
        <div class="container">
          <h1 id="page-title">İş Yeri Alarm Sistemleri Nelerden Oluşur?</h1>
        </div>
      </section>

      <section class="components-section" aria-labelledby="components-title">
        <div class="container">
          <div class="components-intro">
            <h2 id="components-title">İş Yeri Alarm Sistemi <strong>Nelerden Oluşur?</strong></h2>
            <p class="components-intro__lead">Standart bir kablolu iş yeri alarm sistemi paketinde şu temel parçalar bulunur:</p>
            <ul class="package-list">
              <li>Alarm paneli</li>
              <li>Şifre paneli</li>
              <li>Manyetik kontak</li>
              <li>Hareket dedektörü</li>
              <li>Dahili ve harici siren</li>
              <li>Trafo ve yedek akü</li>
            </ul>
            <p>
              Sistem, işletmenin ihtiyacına göre kablolu veya kablosuz biçimde
              kurulabilir. GSM/GPRS ve internet modülleri sayesinde alarm
              sinyalleri izleme merkezine farklı iletişim kanalları üzerinden
              hızlı ve ekonomik biçimde ulaştırılabilir.
            </p>
            <p>
              Her iş yerinin büyüklüğü, giriş noktaları, çalışma düzeni ve riskleri
              farklıdır. Ücretsiz keşif sonrasında standart pakete eklenmesi
              önerilen ürünler belirlenir ve işletmeye ayrıntılı biçimde açıklanır.
            </p>
          </div>

          <div class="components-grid row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/sifre-paneli_0.png') }}" alt="Şifre paneli" /></div>
                <div class="component-card__body"><h3>Şifre Paneli</h3><p>Alarmı kullanıcı koduyla açıp kapatmaya ve sistemi yönetmeye yarar. Kısayol tuşları üzerinden panik, yangın veya sağlık bildirimi gönderilebilir.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/alarm-paneli_0.png') }}" alt="Alarm paneli" /></div>
                <div class="component-card__body"><h3>Alarm Paneli</h3><p>Sensörlerden gelen bilgileri değerlendiren ana kontrol birimidir. Sirenleri çalıştırır ve olay bilgisini alarm izleme merkezine iletir.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/haraket-dedektoru.png') }}" alt="PIR hareket dedektörü" /></div>
                <div class="component-card__body"><h3>Hareket Dedektörü (PIR)</h3><p>Korunan alandaki hareketi algılayıp panele sinyal gönderir. Evcil hayvan bulunan evler için uygun algılama seçenekleri tercih edilebilir.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/manyetik-kontak.png') }}" alt="Manyetik kontak" /></div>
                <div class="component-card__body"><h3>Manyetik Kontak</h3><p>Kapı ve pencere gibi açılır noktalardaki hareketi izler. Sistem aktifken izinsiz açılma algılandığında alarm panelini uyarır.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/acil-durum-butonu.png') }}" alt="Acil durum butonu" /></div>
                <div class="component-card__body"><h3>Acil Durum Butonu</h3><p>Tehdit veya acil yardım gerektiren bir durumda tek dokunuşla alarm izleme merkezine panik sinyali gönderilmesini sağlar.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/gaz-dedektoru.png') }}" alt="Gaz dedektörü" /></div>
                <div class="component-card__body"><h3>Gaz Dedektörü</h3><p>Bulunduğu ortamda gaz kaçağı belirtilerini takip eder. Riskli bir seviye algıladığında sistem durumundan bağımsız olarak uyarı oluşturabilir.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/duman-dedektor.png') }}" alt="Duman dedektörü" /></div>
                <div class="component-card__body"><h3>Duman Dedektörü</h3><p>Yangının erken belirtilerinden olan dumanı algılar ve hızlı müdahale için sesli ya da merkezi bildirim sürecini başlatır.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/uzaktan-kumanda.png') }}" alt="Alarm sistemi uzaktan kumandası" /></div>
                <div class="component-card__body"><h3>Uzaktan Kumanda</h3><p>Şifre paneline gitmeden sistemi açıp kapatmayı kolaylaştırır. Uygun modellerde acil durum bildirimi için ayrı bir tuş da bulunabilir.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/harici-siren.png') }}" alt="Harici alarm sireni" /></div>
                <div class="component-card__body"><h3>Harici Siren</h3><p>Alarmı dış çevreye güçlü ses ve ışıkla duyurur. Dışarıdan görülebilen konumu sayesinde caydırıcılığı destekler.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/aku.png') }}" alt="Alarm sistemi yedek aküsü" /></div>
                <div class="component-card__body"><h3>Akü</h3><p>Elektrik kesintisi veya enerji hattına müdahale durumunda sistemin belirli bir süre çalışmaya devam etmesine yardımcı olur.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/network.png') }}" alt="İnternet network modülü" /></div>
                <div class="component-card__body"><h3>İnternet (Network) Modülü</h3><p>Alarm panelinin internet üzerinden haberleşmesini ve desteklenen sistemlerde mobil ya da web arayüzünden uzaktan kontrol edilmesini sağlar.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/gsm.png') }}" alt="GSM GPRS iletişim modülü" /></div>
                <div class="component-card__body"><h3>GSM/GPRS Modülü</h3><p>Sabit telefon hattının bulunmadığı alanlarda mobil şebeke üzerinden alarm panelinin iletişim kurmasına imkân verir.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/cam-kirilma.png') }}" alt="Cam kırılma dedektörü" /></div>
                <div class="component-card__body"><h3>Cam Kırılma Dedektörü</h3><p>Cam kırılmasına özgü sesleri analiz ederek alarm üretir. Konfigürasyona göre ana alarm kapalıyken de koruma sağlayabilir.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/siren.png') }}" alt="Dahili alarm sireni" /></div>
                <div class="component-card__body"><h3>Dahili Siren</h3><p>İç mekânda yüksek sesli uyarı vererek kullanıcıları tehlikeden haberdar eder ve izinsiz girişe karşı caydırıcılık sağlar.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/darbe.png') }}" alt="Darbe dedektörü" /></div>
                <div class="component-card__body"><h3>Darbe Dedektörü</h3><p>Kasa ve benzeri yüzeylerdeki delme, kesme, titreşim veya zorla açma girişimlerini algılamak üzere kullanılır.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/isi.png') }}" alt="Isı dedektörü" /></div>
                <div class="component-card__body"><h3>Isı Dedektörü</h3><p>Ortam sıcaklığındaki hızlı artışı veya belirlenen eşik değerinin aşılmasını algılayarak yangın riskine karşı uyarı verir.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/karbon.png') }}" alt="Karbonmonoksit dedektörü" /></div>
                <div class="component-card__body"><h3>Karbonmonoksit Dedektörü</h3><p>Renksiz ve kokusuz karbonmonoksit gazını takip eder, tehlikeli yoğunluk algılandığında hızlı uyarı oluşturur.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/su-baskini.png') }}" alt="Su baskını dedektörü" /></div>
                <div class="component-card__body"><h3>Su Baskını Dedektörü</h3><p>Zemin seviyesinde su veya nem algıladığında alarm durumunu başlatarak olası hasara erken müdahale edilmesine yardımcı olur.</p></div>
              </article>
            </div>
            <div class="col">
              <article class="component-card">
                <div class="component-visual"><img src="{{ asset('resimler/ev_nelerden/yangin-butonu.jpg') }}" alt="Yangın alarm butonu" /></div>
                <div class="component-card__body"><h3>Yangın Butonu</h3><p>Yangın fark edildiğinde kullanıcı tarafından devreye alınarak çevreye ve alarm izleme merkezine manuel uyarı gönderir.</p></div>
              </article>
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
