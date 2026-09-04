<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="Tepenet ihtiyaç belirleme aracıyla eviniz veya iş yeriniz için uygun alarm sistemi bileşenlerini oluşturun."
    />
    <title>Kendi Sistemini Oluştur | Tepenet Güvenlik</title>
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
  <body class="page-kendi-sistemini-olustur">
    @include('partials.navbar')

    <main>
      <section
        class="builder-section"
        id="sistem-olusturucu"
        aria-labelledby="page-title"
      >
        <div class="container">
          <div class="builder-shell">
            <header class="builder-heading">
              <h1 id="page-title">Kendi Sistemini Oluştur</h1>
              <p>
                Tepenet güvenlik çözümleriyle ihtiyacınıza uygun sistemi adım
                adım belirleyin.
              </p>
            </header>

            <div
              class="builder-progress-wrap"
              aria-label="Sistem oluşturma ilerlemesi"
            >
              <ol class="builder-progress">
                <li class="is-current" data-progress-step="1">
                  <span class="builder-progress__marker">1</span
                  ><span class="visually-hidden">Başlangıç</span>
                </li>
                <li data-progress-step="2">
                  <span class="builder-progress__marker">2</span
                  ><span class="visually-hidden">Kullanım alanı</span>
                </li>
                <li data-progress-step="3">
                  <span class="builder-progress__marker">3</span
                  ><span class="visually-hidden">Risk noktası</span>
                </li>
                <li data-progress-step="4">
                  <span class="builder-progress__marker">4</span
                  ><span class="visually-hidden">Kapı ve pencere sayısı</span>
                </li>
                <li data-progress-step="5">
                  <span class="builder-progress__marker">5</span
                  ><span class="visually-hidden">Sistem tercihi</span>
                </li>
                <li data-progress-step="6">
                  <span class="builder-progress__marker">6</span
                  ><span class="visually-hidden"
                    >Risk bulunan alan ihtiyaç listesi</span
                  >
                </li>
                <li data-progress-step="7">
                  <span class="builder-progress__marker">7</span
                  ><span class="visually-hidden">Standart ihtiyaç listesi</span>
                </li>
                <li data-progress-step="8">
                  <span class="builder-progress__marker">8</span
                  ><span class="visually-hidden">İletişim formu</span>
                </li>
                <li data-progress-step="9">
                  <span class="builder-progress__marker">9</span
                  ><span class="visually-hidden">Tamamlandı</span>
                </li>
              </ol>
            </div>

            <div class="builder-stage" aria-live="polite">
              <section
                class="builder-step"
                data-builder-step="1"
                aria-labelledby="adim-1-baslik"
              >
                <h2 id="adim-1-baslik">
                  Güvenlik ihtiyacınızı birlikte belirleyelim
                </h2>
                <div class="builder-visual">
                  <img
                    src="{{ asset('resimler/olusturma/1.png') }}"
                    alt="Alarm sistemi ihtiyaç analizi"
                  />
                </div>
                <p class="builder-step__lead">
                  Evinizin veya iş yerinizin güvenlik ihtiyaçlarını anlamak için
                  hazırladığımız kısa soruları yanıtlayın.
                </p>
                <div class="builder-actions">
                  <button
                    class="builder-button btn"
                    type="button"
                    data-builder-next
                  >
                    Şimdi Başlayın →
                  </button>
                </div>
              </section>

              <section
                class="builder-step"
                data-builder-step="2"
                aria-labelledby="adim-2-baslik"
                hidden
              >
                <h2 id="adim-2-baslik">
                  Alarm sistemini neresi için düşünüyorsunuz?
                </h2>
                <div class="builder-visual">
                  <img
                    src="{{ asset('resimler/olusturma/2.png') }}"
                    alt="Ev ve iş yeri seçenekleri"
                  />
                </div>
                <div
                  class="builder-choices"
                  role="radiogroup"
                  aria-labelledby="adim-2-baslik"
                >
                  <label class="builder-choice">
                    <input type="radio" name="kullanim_alani" value="Ev" />
                    <span>Ev</span>
                  </label>
                  <label class="builder-choice">
                    <input type="radio" name="kullanim_alani" value="İş Yeri" />
                    <span>İş Yeri</span>
                  </label>
                </div>
                <p
                  class="builder-error"
                  data-step-error
                  aria-live="assertive"
                ></p>
                <div class="builder-actions">
                  <button
                    class="builder-button builder-button--secondary btn"
                    type="button"
                    data-builder-back
                  >
                    ← Geri
                  </button>
                  <button
                    class="builder-button btn"
                    type="button"
                    data-builder-next
                  >
                    Devam →
                  </button>
                </div>
              </section>

              <section
                class="builder-step"
                data-builder-step="3"
                aria-labelledby="adim-3-baslik"
                hidden
              >
                <h2 id="adim-3-baslik">
                  Giriş kapısı dışında tehlikeli bir nokta var mı?
                </h2>
                <div class="builder-visual">
                  <img
                    src="{{ asset('resimler/olusturma/3.png') }}"
                    alt="Riskli kapı ve pencere noktaları"
                  />
                </div>
                <div
                  class="builder-choices"
                  role="radiogroup"
                  aria-labelledby="adim-3-baslik"
                >
                  <label class="builder-choice">
                    <input type="radio" name="risk_noktasi" value="Evet" />
                    <span>Evet</span>
                  </label>
                  <label class="builder-choice">
                    <input type="radio" name="risk_noktasi" value="Hayır" />
                    <span>Hayır</span>
                  </label>
                </div>
                <p
                  class="builder-error"
                  data-step-error
                  aria-live="assertive"
                ></p>
                <div class="builder-actions">
                  <button
                    class="builder-button builder-button--secondary btn"
                    type="button"
                    data-builder-back
                  >
                    ← Geri
                  </button>
                  <button
                    class="builder-button btn"
                    type="button"
                    data-builder-next
                  >
                    Devam →
                  </button>
                </div>
              </section>

              <section
                class="builder-step"
                data-builder-step="4"
                aria-labelledby="adim-4-baslik"
                hidden
              >
                <h2 id="adim-4-baslik">
                  Giriş kapısı hariç riskli kapı ve pencere sayısı nedir?
                </h2>
                <div class="builder-visual">
                  <img
                    src="{{ asset('resimler/olusturma/3.png') }}"
                    alt="Korunması gereken ek giriş noktaları"
                  />
                </div>
                <div class="builder-number">
                  <label for="riskli-nokta-sayisi"
                    >Kapı ve pencere sayısı</label
                  >
                  <input
                    class="form-control"
                    id="riskli-nokta-sayisi"
                    name="riskli_nokta_sayisi"
                    type="number"
                    min="1"
                    max="50"
                    inputmode="numeric"
                    placeholder="Örneğin: 3"
                  />
                </div>
                <p
                  class="builder-error"
                  data-step-error
                  aria-live="assertive"
                ></p>
                <div class="builder-actions">
                  <button
                    class="builder-button builder-button--secondary btn"
                    type="button"
                    data-builder-back
                  >
                    ← Geri
                  </button>
                  <button
                    class="builder-button btn"
                    type="button"
                    data-builder-next
                  >
                    Devam →
                  </button>
                </div>
              </section>

              <section
                class="builder-step"
                data-builder-step="5"
                aria-labelledby="adim-5-baslik"
                hidden
              >
                <h2 id="adim-5-baslik">Sistem tercihiniz hangisi?</h2>
                <div class="builder-visual">
                  <img
                    src="{{ asset('resimler/olusturma/5.png') }}"
                    alt="Kablolu ve kablosuz alarm sistemi seçenekleri"
                  />
                </div>
                <div
                  class="builder-choices"
                  role="radiogroup"
                  aria-labelledby="adim-5-baslik"
                >
                  <label class="builder-choice">
                    <input type="radio" name="sistem_tercihi" value="Kablolu" />
                    <span>Kablolu</span>
                  </label>
                  <label class="builder-choice">
                    <input
                      type="radio"
                      name="sistem_tercihi"
                      value="Kablosuz"
                    />
                    <span>Kablosuz</span>
                  </label>
                </div>
                <p
                  class="builder-error"
                  data-step-error
                  aria-live="assertive"
                ></p>
                <div class="builder-actions">
                  <button
                    class="builder-button builder-button--secondary btn"
                    type="button"
                    data-builder-back
                  >
                    ← Geri
                  </button>
                  <button
                    class="builder-button btn"
                    type="button"
                    data-builder-next
                  >
                    İhtiyaç Listesini Oluştur →
                  </button>
                </div>
              </section>

              <section
                class="builder-step"
                data-builder-step="6"
                aria-labelledby="adim-6-baslik"
                hidden
              >
                <h2 id="adim-6-baslik">
                  Risk noktalarınıza göre ihtiyaç listeniz
                </h2>
                <p class="builder-step__lead">
                  Seçimlerinize göre oluşturulan başlangıç paketi aşağıdadır.
                </p>
                <div class="recommendation-card">
                  <p class="recommendation-card__meta">
                    <span data-output="location">—</span> ·
                    <span data-output="system">—</span> sistem
                  </p>
                  <ul class="recommendation-list">
                    <li><span>Alarm paneli</span><strong>1 adet</strong></li>
                    <li><span>Tuş takımı</span><strong>1 adet</strong></li>
                    <li>
                      <span>Manyetik kontak</span
                      ><strong
                        ><span data-output="contact-count">1</span> adet</strong
                      >
                    </li>
                    <li><span>Dahili siren</span><strong>1 adet</strong></li>
                    <li><span>Harici siren</span><strong>1 adet</strong></li>
                    <li>
                      <span>Hareket dedektörü</span><strong>1 adet</strong>
                    </li>
                  </ul>
                </div>
                <p class="builder-step__lead">
                  Kesin ürün adedi, ücretsiz keşif sırasında mekânın fiziksel
                  koşullarına göre netleştirilir.
                </p>
                <div class="builder-actions">
                  <button
                    class="builder-button builder-button--secondary btn"
                    type="button"
                    data-builder-back
                  >
                    ← Geri
                  </button>
                  <button
                    class="builder-button btn"
                    type="button"
                    data-builder-next
                  >
                    Teklif Formuna Geç →
                  </button>
                </div>
              </section>

              <section
                class="builder-step"
                data-builder-step="7"
                aria-labelledby="adim-7-baslik"
                hidden
              >
                <h2 id="adim-7-baslik">Standart ihtiyaç listeniz</h2>
                <p class="builder-step__lead">
                  Belirttiğiniz koşullara göre başlangıç paketi aşağıdaki
                  bileşenlerden oluşabilir.
                </p>
                <div class="recommendation-card">
                  <p class="recommendation-card__meta">
                    <span data-output="location">—</span> ·
                    <span data-output="system">—</span> sistem
                  </p>
                  <ul class="recommendation-list">
                    <li><span>Alarm paneli</span><strong>1 adet</strong></li>
                    <li><span>Tuş takımı</span><strong>1 adet</strong></li>
                    <li><span>Manyetik kontak</span><strong>1 adet</strong></li>
                    <li><span>Dahili siren</span><strong>1 adet</strong></li>
                    <li><span>Harici siren</span><strong>1 adet</strong></li>
                    <li>
                      <span>Hareket dedektörü</span><strong>1 adet</strong>
                    </li>
                  </ul>
                </div>
                <p class="builder-step__lead">
                  Kesin ürün seçimi ve yerleşim planı, ücretsiz keşif sonrasında
                  belirlenir.
                </p>
                <div class="builder-actions">
                  <button
                    class="builder-button builder-button--secondary btn"
                    type="button"
                    data-builder-back
                  >
                    ← Geri
                  </button>
                  <button
                    class="builder-button btn"
                    type="button"
                    data-builder-next
                  >
                    Teklif Formuna Geç →
                  </button>
                </div>
              </section>

              <section
                class="builder-step"
                data-builder-step="8"
                id="ucretsiz-kesif"
                aria-labelledby="adim-8-baslik"
                hidden
              >
                <h2 id="adim-8-baslik">Size Ulaşalım</h2>
                <p class="builder-step__lead">
                  Size özel teklif hazırlayabilmemiz için iletişim bilgilerinizi
                  ve varsa notlarınızı paylaşın.
                </p>
                <form class="builder-form" action="#" method="post" novalidate>
                  <input type="hidden" id="talep-alani" name="talep_alani" />
                  <input type="hidden" id="talep-risk" name="risk_durumu" />
                  <input
                    type="hidden"
                    id="talep-risk-sayisi"
                    name="riskli_nokta_sayisi"
                  />
                  <input
                    type="hidden"
                    id="talep-sistem"
                    name="sistem_tercihi"
                  />
                  <div class="row g-3">
                    <div class="col-12 col-md-6">
                      <label class="visually-hidden" for="kesif-ad"
                        >Adınız</label
                      >
                      <input
                        class="form-control"
                        id="kesif-ad"
                        name="ad"
                        type="text"
                        placeholder="Adınız"
                        autocomplete="given-name"
                        required
                      />
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="visually-hidden" for="kesif-soyad"
                        >Soyadınız</label
                      >
                      <input
                        class="form-control"
                        id="kesif-soyad"
                        name="soyad"
                        type="text"
                        placeholder="Soyadınız"
                        autocomplete="family-name"
                        required
                      />
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="visually-hidden" for="kesif-telefon"
                        >Telefon numaranız</label
                      >
                      <input
                        class="form-control"
                        id="kesif-telefon"
                        name="telefon"
                        type="tel"
                        inputmode="tel"
                        placeholder="Telefon Numaranız"
                        autocomplete="tel"
                        required
                      />
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="visually-hidden" for="kesif-email"
                        >E-posta adresiniz</label
                      >
                      <input
                        class="form-control"
                        id="kesif-email"
                        name="email"
                        type="email"
                        placeholder="E-Posta"
                        autocomplete="email"
                      />
                    </div>
                    <div class="col-12">
                      <label class="visually-hidden" for="kesif-il"
                        >İl seçiniz</label
                      >
                      <select
                        class="form-select"
                        id="kesif-il"
                        name="il"
                        required
                      >
                        <option value="" selected disabled>İl Seçiniz</option>
                        <option value="bursa">Bursa</option>
                        <option value="istanbul">İstanbul</option>
                        <option value="ankara">Ankara</option>
                      </select>
                    </div>
                    <div class="col-12">
                      <label class="visually-hidden" for="kesif-not"
                        >Eklemek istediğiniz not</label
                      >
                      <textarea
                        class="form-control"
                        id="kesif-not"
                        name="not"
                        placeholder="Eklemek istediğiniz not"
                      ></textarea>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          id="kampanya-izni"
                          name="kampanya_izni"
                          type="checkbox"
                        />
                        <label class="form-check-label" for="kampanya-izni"
                          >Tepenet Güvenlik’in kampanya ve duyurular için
                          benimle iletişime geçmesine izin veriyorum.
                          <a href="#">Detay</a></label
                        >
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          id="kvkk-onayi"
                          name="kvkk_onayi"
                          type="checkbox"
                          required
                        />
                        <label class="form-check-label" for="kvkk-onayi"
                          >Kişisel verilerin korunmasına ilişkin
                          <a href="#">aydınlatma metnini</a> okudum ve anladım.
                          <span class="text-danger">*</span></label
                        >
                      </div>
                    </div>
                  </div>
                  <p
                    class="builder-error"
                    data-form-error
                    aria-live="assertive"
                  ></p>
                  <div class="builder-actions">
                    <button
                      class="builder-button builder-button--secondary btn"
                      type="button"
                      data-builder-back
                    >
                      ← Geri
                    </button>
                    <button class="builder-button btn" type="submit">
                      Talebi Tamamla →
                    </button>
                  </div>
                </form>
              </section>

              <section
                class="builder-step"
                data-builder-step="9"
                aria-labelledby="adim-9-baslik"
                hidden
              >
                <div class="builder-complete-icon" aria-hidden="true">✓</div>
                <h2 id="adim-9-baslik">Talebiniz hazırlandı</h2>
                <p class="builder-step__lead">
                  Seçimleriniz ve iletişim bilgileriniz forma eklendi. Form bir
                  sunucu adresine bağlandığında talebiniz Tepenet ekibine
                  iletilecektir.
                </p>
                <div class="builder-actions">
                  <button
                    class="builder-button btn"
                    type="button"
                    data-builder-restart
                  >
                    Başa Dön
                  </button>
                </div>
              </section>
            </div>
          </div>
        </div>
      </section>

      <section class="builder-content" aria-labelledby="builder-content-title">
        <div class="container">
          <div class="builder-content__intro">
            <h2 id="builder-content-title">Kendi Sistemini Oluştur</h2>
            <p>
              Ev veya iş yeriniz için ihtiyacınıza uygun alarm sistemini seçmek,
              kısa bir değerlendirmeyle daha kolay hâle gelir. Dokuz adımlı bu
              araç kullanım alanınızı, riskli giriş noktalarını ve altyapı
              tercihinizi değerlendirerek başlangıç ihtiyaç listenizi oluşturur.
              Son ürün ve yerleşim planı profesyonel keşif sonrasında
              netleştirilir.
            </p>
          </div>

          <div class="row row-cols-1 row-cols-lg-2 g-4">
            <div class="col">
              <article>
                <h3>Tepenet Alarm Sistemleri</h3>
                <p>
                  Kablolu ve kablosuz seçeneklerle planlanabilen alarm
                  sistemleri; panel, tuş takımı, manyetik kontak, dahili ve
                  harici siren ile hareket dedektörü gibi temel bileşenlerden
                  oluşur. İhtiyaca göre yangın, gaz, su baskını ve kamera
                  çözümleri sisteme eklenebilir.
                </p>
              </article>
            </div>
            <div class="col">
              <article>
                <h3>Doğru İhtiyaç Analizi</h3>
                <p>
                  Sistem oluşturucunun amacı gereksiz ekipman eklemek değil,
                  korunacak alanın risklerini görünür hâle getirmektir. Kapı ve
                  pencere sayısı, kullanım şekli ve iletişim altyapısı birlikte
                  değerlendirilerek daha dengeli bir başlangıç planı hazırlanır.
                </p>
              </article>
            </div>
            <div class="col">
              <article>
                <h3>Tepenet Destek Merkezi</h3>
                <p>
                  Sorularınızı iletmek ve seçiminizi uzman görüşüyle
                  netleştirmek için iletişim formunu kullanabilirsiniz.
                  Talebiniz alındıktan sonra ekip, paylaştığınız telefon
                  numarası üzerinden sizinle iletişim kurabilir.
                </p>
              </article>
            </div>
            <div class="col">
              <article>
                <h3>Tepenet Güvenlik Kameraları</h3>
                <p>
                  İç ve dış mekâna uygun kamera seçenekleri; görüş açısı, gece
                  performansı, kayıt kapasitesi ve çevresel dayanım gibi
                  ölçütlere göre belirlenir. Mobil erişim destekli çözümler
                  canlı görüntüye ve geçmiş kayıtlara ulaşmayı kolaylaştırır.
                </p>
              </article>
            </div>
          </div>
        </div>
      </section>
    </main>

    <a class="floating-discovery" href="#sistem-olusturucu">
      <span aria-hidden="true">✓</span> Sistemini Oluştur
    </a>

    @include('partials.footer')

    <script>
      const builder = document.getElementById("sistem-olusturucu");
      const steps = [...document.querySelectorAll("[data-builder-step]")];
      const progressItems = [
        ...document.querySelectorAll("[data-progress-step]"),
      ];
      const contactForm = document.querySelector(".builder-form");
      const riskCountInput = document.getElementById("riskli-nokta-sayisi");
      let currentStep = 1;

      function selectedValue(name) {
        return (
          document.querySelector(`input[name="${name}"]:checked`)?.value || ""
        );
      }

      function builderState() {
        const hasRisk = selectedValue("risk_noktasi") === "Evet";
        return {
          location: selectedValue("kullanim_alani"),
          hasRisk,
          riskCount: hasRisk ? Number(riskCountInput.value) || 0 : 0,
          system: selectedValue("sistem_tercihi"),
        };
      }

      function setError(message) {
        const error = steps
          .find((step) => Number(step.dataset.builderStep) === currentStep)
          ?.querySelector("[data-step-error]");
        if (error) error.textContent = message;
      }

      function validateCurrentStep() {
        setError("");

        if (currentStep === 2 && !selectedValue("kullanim_alani")) {
          setError("Lütfen kullanım alanını seçin.");
          return false;
        }

        if (currentStep === 3 && !selectedValue("risk_noktasi")) {
          setError("Lütfen riskli nokta durumunu seçin.");
          return false;
        }

        if (
          currentStep === 4 &&
          (!riskCountInput.value || Number(riskCountInput.value) < 1)
        ) {
          setError(
            "Lütfen en az 1 olacak şekilde kapı ve pencere sayısını girin.",
          );
          riskCountInput.focus();
          return false;
        }

        if (currentStep === 5 && !selectedValue("sistem_tercihi")) {
          setError("Lütfen kablolu veya kablosuz sistem tercihini seçin.");
          return false;
        }

        return true;
      }

      function nextStep(step) {
        const state = builderState();
        if (step === 1) return 2;
        if (step === 2) return 3;
        if (step === 3) return state.hasRisk ? 4 : 5;
        if (step === 4) return 5;
        if (step === 5) return state.hasRisk ? 6 : 7;
        if (step === 6 || step === 7) return 8;
        return step;
      }

      function previousStep(step) {
        const state = builderState();
        if (step === 2) return 1;
        if (step === 3) return 2;
        if (step === 4) return 3;
        if (step === 5) return state.hasRisk ? 4 : 3;
        if (step === 6 || step === 7) return 5;
        if (step === 8) return state.hasRisk ? 6 : 7;
        if (step === 9) return 8;
        return 1;
      }

      function updateRecommendation() {
        const state = builderState();
        document
          .querySelectorAll('[data-output="location"]')
          .forEach((element) => {
            element.textContent = state.location;
          });
        document
          .querySelectorAll('[data-output="system"]')
          .forEach((element) => {
            element.textContent = state.system;
          });
        document
          .querySelectorAll('[data-output="contact-count"]')
          .forEach((element) => {
            element.textContent = String(1 + state.riskCount);
          });

        document.getElementById("talep-alani").value = state.location;
        document.getElementById("talep-risk").value = state.hasRisk
          ? "Evet"
          : "Hayır";
        document.getElementById("talep-risk-sayisi").value = String(
          state.riskCount,
        );
        document.getElementById("talep-sistem").value = state.system;
      }

      function showStep(stepNumber, moveFocus = true) {
        currentStep = stepNumber;
        steps.forEach((step) => {
          step.hidden = Number(step.dataset.builderStep) !== stepNumber;
        });
        progressItems.forEach((item) => {
          const itemStep = Number(item.dataset.progressStep);
          item.classList.toggle("is-current", itemStep === stepNumber);
          item.classList.toggle("is-complete", itemStep < stepNumber);
          if (itemStep === stepNumber)
            item.setAttribute("aria-current", "step");
          else item.removeAttribute("aria-current");
        });

        if ([6, 7, 8].includes(stepNumber)) updateRecommendation();

        if (moveFocus) {
          builder.scrollIntoView({ behavior: "smooth", block: "start" });
          const heading = steps
            .find((step) => Number(step.dataset.builderStep) === stepNumber)
            ?.querySelector("h2");
          if (heading) {
            heading.setAttribute("tabindex", "-1");
            window.setTimeout(
              () => heading.focus({ preventScroll: true }),
              250,
            );
          }
        }
      }

      builder.addEventListener("click", (event) => {
        const nextButton = event.target.closest("[data-builder-next]");
        const backButton = event.target.closest("[data-builder-back]");
        const restartButton = event.target.closest("[data-builder-restart]");

        if (nextButton) {
          if (validateCurrentStep()) showStep(nextStep(currentStep));
        }

        if (backButton) showStep(previousStep(currentStep));

        if (restartButton) {
          contactForm.reset();
          riskCountInput.value = "";
          document
            .querySelectorAll(".builder-choice input")
            .forEach((input) => {
              input.checked = false;
            });
          document
            .querySelectorAll("[data-step-error], [data-form-error]")
            .forEach((element) => {
              element.textContent = "";
            });
          showStep(1);
        }
      });

      builder.addEventListener("change", (event) => {
        if (event.target.matches('input[type="radio"]')) setError("");
        if (
          event.target.name === "risk_noktasi" &&
          event.target.value === "Hayır"
        ) {
          riskCountInput.value = "";
        }
      });

      contactForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const formError = contactForm.querySelector("[data-form-error]");
        formError.textContent = "";

        if (!contactForm.checkValidity()) {
          formError.textContent = "Lütfen zorunlu alanları eksiksiz doldurun.";
          contactForm.reportValidity();
          return;
        }

        showStep(9);
      });

      showStep(1, false);
    </script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
