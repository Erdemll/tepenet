<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="Tepenet kurumsal güvenlik çözümleri; kamera, video analiz, geçiş kontrolü, yangın algılama ve çevre güvenlik sistemleri."
    />
    <title>Kurumsal Güvenlik Çözümleri | Tepenet Güvenlik</title>

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

  <body class="page-kurumsal-cozumler">
    @include('partials.navbar')

<main>
      <section class="hero corporate-hero" id="ucretsiz-kesif" aria-labelledby="page-title">
        <div class="hero__image">
          <img src="{{ asset('resimler/kurumsal/kurumsal-çözümler-slider.png.webp') }}" alt="Kurumsal güvenlik çözümleriyle korunan modern işletme" />
        </div>

        <aside class="hero-request" aria-labelledby="callback-title">
          <h2 id="callback-title">Sizi Arayalım</h2>
          <p>İşletmenize en uygun güvenlik çözümünü birlikte belirlemek için bilgilerinizi bırakın.</p>
          <form action="#" method="post">
            <div class="row g-2">
              <div class="col-12">
                <label class="visually-hidden" for="kurumsal-telefon">Telefon numaranız</label>
                <input class="form-control" id="kurumsal-telefon" name="telefon" type="tel" placeholder="Telefon Numaranız" autocomplete="tel" required />
              </div>
              <div class="col-12 col-sm-6">
                <label class="visually-hidden" for="kurumsal-ad">Adınız</label>
                <input class="form-control" id="kurumsal-ad" name="ad" type="text" placeholder="Adınız" autocomplete="given-name" required />
              </div>
              <div class="col-12 col-sm-6">
                <label class="visually-hidden" for="kurumsal-soyad">Soyadınız</label>
                <input class="form-control" id="kurumsal-soyad" name="soyad" type="text" placeholder="Soyadınız" autocomplete="family-name" required />
              </div>
              <div class="col-12 col-sm-6">
                <label class="visually-hidden" for="kurumsal-il">İl seçiniz</label>
                <select class="form-select" id="kurumsal-il" name="il" required>
                  <option value="" selected disabled>İl Seçiniz</option>
                  <option value="bursa">Bursa</option>
                  <option value="istanbul">İstanbul</option>
                  <option value="ankara">Ankara</option>
                </select>
              </div>
              <div class="col-12 col-sm-6">
                <label class="visually-hidden" for="kurumsal-email">E-posta adresiniz</label>
                <input class="form-control" id="kurumsal-email" name="email" type="email" placeholder="E-Posta" autocomplete="email" />
              </div>
              <div class="col-12">
                <label class="visually-hidden" for="kurumsal-firma">Firma adı</label>
                <input class="form-control" id="kurumsal-firma" name="firma_adi" type="text" placeholder="Firma Adı" autocomplete="organization" required />
              </div>
              <div class="col-12 col-sm-7">
                <label class="visually-hidden" for="kurum-turu">Kurum türü</label>
                <select class="form-select" id="kurum-turu" name="kurum_turu" required>
                  <option value="" selected disabled>Kurum Türü Seçiniz</option>
                  <option value="magaza">Mağaza / Perakende</option>
                  <option value="ofis">Ofis</option>
                  <option value="fabrika">Fabrika / Üretim</option>
                  <option value="otel">Otel / Konaklama</option>
                  <option value="diger">Diğer</option>
                </select>
              </div>
              <div class="col-12 col-sm-5">
                <label class="visually-hidden" for="kurumsal-sube">Şube sayısı</label>
                <input class="form-control" id="kurumsal-sube" name="sube_sayisi" type="number" min="1" placeholder="Şube Sayısı" required />
              </div>
              <div class="col-12">
                <div class="form-check mt-1">
                  <input class="form-check-input" id="kurumsal-kampanya" name="kampanya_izni" type="checkbox" />
                  <label class="form-check-label" for="kurumsal-kampanya">
                    Kampanya ve duyurular için benimle iletişime geçilmesine izin veriyorum. <a href="#">Detay</a>
                  </label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" id="kurumsal-kvkk" name="kvkk_onayi" type="checkbox" required />
                  <label class="form-check-label" for="kurumsal-kvkk">
                    Kişisel verilerin korunmasına ilişkin <a href="#">aydınlatma metnini</a> okudum ve anladım.
                  </label>
                </div>
              </div>
              <div class="col-12">
                <button class="submit-button btn" type="submit">Gönder →</button>
              </div>
            </div>
          </form>
        </aside>
      </section>

      <section class="corporate-solutions" aria-labelledby="solutions-title">
        <div class="container">
          <div class="corporate-heading">
            <h2 id="solutions-title">Kurumsal Çözümler</h2>
            <p>Siz uzaktayken aklınız işinizde kalmasın.</p>
          </div>

          <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3 g-lg-4">
            <div class="col">
              <a class="solution-card" href="#kamera-panel" data-bs-toggle="collapse" aria-expanded="false" aria-controls="kamera-panel">
                <span class="solution-icon"><img src="" alt="" /><span class="solution-icon__placeholder">KS</span></span>
                <h3>Kamera Sistemleri</h3>
              </a>
            </div>
            <div class="col">
              <a class="solution-card" href="#video-analiz-panel" data-bs-toggle="collapse" aria-expanded="false" aria-controls="video-analiz-panel">
                <span class="solution-icon"><img src="" alt="" /><span class="solution-icon__placeholder">VA</span></span>
                <h3>Video Analiz</h3>
              </a>
            </div>
            <div class="col">
              <a class="solution-card" href="#gecis-kontrol-panel" data-bs-toggle="collapse" aria-expanded="false" aria-controls="gecis-kontrol-panel">
                <span class="solution-icon"><img src="" alt="" /><span class="solution-icon__placeholder">GK</span></span>
                <h3>Geçiş Kontrol Sistemleri</h3>
              </a>
            </div>
            <div class="col">
              <a class="solution-card" href="#yangin-panel" data-bs-toggle="collapse" aria-expanded="false" aria-controls="yangin-panel">
                <span class="solution-icon"><img src="" alt="" /><span class="solution-icon__placeholder">YA</span></span>
                <h3>Yangın Algılama Sistemleri</h3>
              </a>
            </div>
            <div class="col">
              <a class="solution-card" href="#cevre-panel" data-bs-toggle="collapse" aria-expanded="false" aria-controls="cevre-panel">
                <span class="solution-icon"><img src="" alt="" /><span class="solution-icon__placeholder">ÇG</span></span>
                <h3>Çevre Güvenlik Sistemleri</h3>
              </a>
            </div>
            <div class="col">
              <a class="solution-card" href="#anons-panel" data-bs-toggle="collapse" aria-expanded="false" aria-controls="anons-panel">
                <span class="solution-icon"><img src="" alt="" /><span class="solution-icon__placeholder">AA</span></span>
                <h3>Acil Anons ve Seslendirme Sistemleri</h3>
              </a>
            </div>
            <div class="col">
              <a class="solution-card" href="#intercom-panel" data-bs-toggle="collapse" aria-expanded="false" aria-controls="intercom-panel">
                <span class="solution-icon"><img src="" alt="" /><span class="solution-icon__placeholder">GI</span></span>
                <h3>Görüntülü Intercom Sistemleri</h3>
              </a>
            </div>
            <div class="col">
              <a class="solution-card" href="#arac-gecis-panel" data-bs-toggle="collapse" aria-expanded="false" aria-controls="arac-gecis-panel">
                <span class="solution-icon"><img src="" alt="" /><span class="solution-icon__placeholder">AG</span></span>
                <h3>Araç Geçiş Sistemleri: Plaka, OGS ve HGS</h3>
              </a>
            </div>
            <div class="col">
              <a class="solution-card" href="#otopark-panel" data-bs-toggle="collapse" aria-expanded="false" aria-controls="otopark-panel">
                <span class="solution-icon"><img src="" alt="" /><span class="solution-icon__placeholder">OB</span></span>
                <h3>Otopark Bilet Verme ve Bariyer Sistemi</h3>
              </a>
            </div>
            <div class="col">
              <a class="solution-card" href="#ic-ortam-panel" data-bs-toggle="collapse" aria-expanded="false" aria-controls="ic-ortam-panel">
                <span class="solution-icon"><img src="" alt="" /><span class="solution-icon__placeholder">İO</span></span>
                <h3>İç Ortam Tedbirleri</h3>
              </a>
            </div>
            <div class="col">
              <a class="solution-card" href="#emanet-panel" data-bs-toggle="collapse" aria-expanded="false" aria-controls="emanet-panel">
                <span class="solution-icon"><img src="" alt="" /><span class="solution-icon__placeholder">ED</span></span>
                <h3>Resepsiyon Emanet Dolabı</h3>
              </a>
            </div>
            <div class="col">
              <a class="solution-card" href="#otel-panel" data-bs-toggle="collapse" aria-expanded="false" aria-controls="otel-panel">
                <span class="solution-icon"><img src="" alt="" /><span class="solution-icon__placeholder">OE</span></span>
                <h3>Otel Oda Ekipmanları</h3>
              </a>
            </div>
          </div>
        </div>
      </section>

      <section class="solution-details" aria-label="Kurumsal çözüm detayları">
        <div class="container">
          <div class="accordion solution-accordion" id="solutionAccordion">
            <article class="accordion-item" id="kamera-sistemleri">
              <h2 class="accordion-header" id="kamera-baslik">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kamera-panel" aria-expanded="false" aria-controls="kamera-panel">Kamera Sistemleri</button>
              </h2>
              <div class="accordion-collapse collapse" id="kamera-panel" aria-labelledby="kamera-baslik" data-bs-parent="#solutionAccordion">
                <div class="accordion-body">
                  <div class="solution-detail">
                   <!--  <div class="solution-detail__visual"><img src="" alt="Kurumsal kamera sistemleri" /></div> -->
                    <div class="solution-detail__copy">
                      <h3>Kamera Sistemleri</h3>
                      <p>Kamera çözümleri, olayların nasıl gerçekleştiğine ilişkin görüntülü kayıt oluştururken tesisin hem yerinden hem de uzaktan izlenmesine yardımcı olur.</p>
                      <ul class="solution-features">
                        <li>Görüntülerin günün her saati kaydedilmesi</li>
                        <li>Yüksek çözünürlüklü görüntü kalitesi</li>
                        <li>Kayıtlara güvenli uzaktan erişim</li>
                        <li>Video ile alarm doğrulama ve uzaktan devriye desteği</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </article>

            <article class="accordion-item" id="video-analiz">
              <h2 class="accordion-header" id="video-analiz-baslik">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#video-analiz-panel" aria-expanded="false" aria-controls="video-analiz-panel">Video Analiz</button>
              </h2>
              <div class="accordion-collapse collapse" id="video-analiz-panel" aria-labelledby="video-analiz-baslik" data-bs-parent="#solutionAccordion">
                <div class="accordion-body">
                  <div class="solution-detail">
                    <div class="solution-detail__visual"><img src="{{ asset('resimler/kurumsal/video-analiz.jpg') }}" alt="Kurumsal video analiz sistemi" /></div>
                    <div class="solution-detail__copy">
                      <h3>Video Analiz</h3>
                      <p>Gelişmiş görüntü analiz yazılımları olası tehditleri belirleyerek güvenlik operatörlerini uyarır ve daha hızlı, daha isabetli karar verilmesini destekler.</p>
                      <p>Çok sayıda görüntünün yalnızca insan gözüyle kesintisiz takip edilmesinde zamanla oluşan dikkat kaybını azaltır; CCTV altyapısının daha etkin kullanılmasına ve personel kaynaklarının verimli yönetilmesine katkı sağlar.</p>
                    </div>
                  </div>
                </div>
              </div>
            </article>

            <article class="accordion-item" id="gecis-kontrol">
              <h2 class="accordion-header" id="gecis-kontrol-baslik">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gecis-kontrol-panel" aria-expanded="false" aria-controls="gecis-kontrol-panel">Geçiş Kontrol Sistemleri</button>
              </h2>
              <div class="accordion-collapse collapse" id="gecis-kontrol-panel" aria-labelledby="gecis-kontrol-baslik" data-bs-parent="#solutionAccordion">
                <div class="accordion-body">
                  <div class="solution-detail">
                    <div class="solution-detail__visual"><img src="{{ asset('resimler/kurumsal/guvenlik.jpg') }}" alt="Kurumsal geçiş kontrol sistemi" /></div>
                    <div class="solution-detail__copy">
                      <h3>Geçiş Kontrol Sistemleri</h3>
                      <p>Binalarda ve yoğun kullanılan alanlarda giriş çıkışları denetler, yetkisiz kişilerin kritik bölgelere erişimini sınırlar ve geçiş bilgilerinin elektronik ortamda raporlanmasını sağlar.</p>
                      <p>Elde edilen kayıtlar bina güvenliğini güçlendirmenin yanında çalışma saatlerinin değerlendirilmesine de somut veri sunar.</p>
                    </div>
                  </div>
                </div>
              </div>
            </article>

            <article class="accordion-item" id="yangin-algilama">
              <h2 class="accordion-header" id="yangin-baslik">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#yangin-panel" aria-expanded="false" aria-controls="yangin-panel">Yangın Algılama Sistemleri</button>
              </h2>
              <div class="accordion-collapse collapse" id="yangin-panel" aria-labelledby="yangin-baslik" data-bs-parent="#solutionAccordion">
                <div class="accordion-body">
                  <div class="solution-detail">
                    <div class="solution-detail__visual"><img src="{{ asset('resimler/kurumsal/Alarm-Sistemleri.jpg') }}" alt="Kurumsal yangın algılama sistemi" /></div>
                    <div class="solution-detail__copy">
                      <h3>Yangın Algılama Sistemleri</h3>
                      <p>Farklı sensörlerden aldığı bilgilerle yangının başlangıç aşamasını algılar ve erken müdahale sürecini başlatır.</p>
                      <p>Önceden belirlenen tahliye senaryosuna göre elektrik, asansör, yangın kapıları, turnikeler, garaj bariyerleri ve diğer geçiş ekipmanlarıyla birlikte çalışarak binanın güvenli biçimde boşaltılmasını kolaylaştırabilir.</p>
                    </div>
                  </div>
                </div>
              </div>
            </article>

            <article class="accordion-item" id="cevre-guvenlik">
              <h2 class="accordion-header" id="cevre-baslik">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cevre-panel" aria-expanded="false" aria-controls="cevre-panel">Çevre Güvenlik Sistemleri</button>
              </h2>
              <div class="accordion-collapse collapse" id="cevre-panel" aria-labelledby="cevre-baslik" data-bs-parent="#solutionAccordion">
                <div class="accordion-body">
                  <div class="solution-detail">
                    <div class="solution-detail__visual"><img src="{{ asset('resimler/kurumsal/cevre-guvenlik-sistemleri_0.jpg') }}" alt="Tesis çevre güvenlik sistemi" /></div>
                    <div class="solution-detail__copy">
                      <h3>Çevre Güvenlik Sistemleri</h3>
                      <p>Çit üstü ve yer altı algılama çözümleriyle tesis sınırındaki izinsiz geçiş girişimlerinin erken aşamada belirlenmesini amaçlar.</p>
                      <p>Özellikle yüksek güvenlik ihtiyacı bulunan fabrikalarda, kampüslerde ve kamu tesislerinde katmanlı çevre koruması sağlar.</p>
                    </div>
                  </div>
                </div>
              </div>
            </article>

            <article class="accordion-item" id="acil-anons">
              <h2 class="accordion-header" id="anons-baslik">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#anons-panel" aria-expanded="false" aria-controls="anons-panel">Acil Anons ve Seslendirme Sistemleri</button>
              </h2>
              <div class="accordion-collapse collapse" id="anons-panel" aria-labelledby="anons-baslik" data-bs-parent="#solutionAccordion">
                <div class="accordion-body">
                  <div class="solution-detail">
                    <div class="solution-detail__visual"><img src="{{ asset('resimler/kurumsal/acil-anons-sistemleri_0.jpg') }}" alt="Acil anons ve seslendirme sistemi" /></div>
                    <div class="solution-detail__copy">
                      <h3>Acil Anons ve Seslendirme Sistemleri</h3>
                      <p>Acil durumlarda tesis genelinde hızlı bilgilendirme yapılmasını ve tahliye sürecinin yönetilmesini sağlar. Günlük kullanımda müzik yayını ve genel bilgilendirme amacıyla da değerlendirilebilir.</p>
                    </div>
                  </div>
                </div>
              </div>
            </article>

            <article class="accordion-item" id="goruntulu-intercom">
              <h2 class="accordion-header" id="intercom-baslik">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#intercom-panel" aria-expanded="false" aria-controls="intercom-panel">Görüntülü Intercom Sistemleri</button>
              </h2>
              <div class="accordion-collapse collapse" id="intercom-panel" aria-labelledby="intercom-baslik" data-bs-parent="#solutionAccordion">
                <div class="accordion-body">
                  <div class="solution-detail">
                    <div class="solution-detail__visual"><img src="{{ asset('resimler/kurumsal/goruntulu-intercom_0.jpg') }}" alt="Görüntülü intercom sistemi" /></div>
                    <div class="solution-detail__copy">
                      <h3>Görüntülü Intercom Sistemleri</h3>
                      <p>Karşılıklı görüntülü ve sesli iletişim kurarak ziyaretçi kontrolünü destekler. Güvenliğin yanında kullanım kolaylığı sunduğu için akıllı bina projelerinde sıkça tercih edilir.</p>
                    </div>
                  </div>
                </div>
              </div>
            </article>

            <article class="accordion-item" id="arac-gecis">
              <h2 class="accordion-header" id="arac-gecis-baslik">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#arac-gecis-panel" aria-expanded="false" aria-controls="arac-gecis-panel">Araç Geçiş Sistemleri: Plaka, OGS ve HGS</button>
              </h2>
              <div class="accordion-collapse collapse" id="arac-gecis-panel" aria-labelledby="arac-gecis-baslik" data-bs-parent="#solutionAccordion">
                <div class="accordion-body">
                  <div class="solution-detail">
                    <div class="solution-detail__visual"><img src="{{ asset('resimler/kurumsal/otopark-arac-gecis-sistemleri.jpg') }}" alt="Plaka OGS ve HGS araç geçiş sistemi" /></div>
                    <div class="solution-detail__copy">
                      <h3>OGS ve HGS Tabanlı Araç Geçiş Sistemleri</h3>
                      <p>Site ve tesislerdeki araç giriş çıkışlarını kontrol altına alarak yetkili araçların hızlı ve düzenli biçimde geçmesini sağlar.</p>
                      <ul class="solution-features">
                        <li>Bariyer ve yol engelleyici gibi fiziksel geçiş ekipmanları</li>
                        <li>Plaka tanıma, OGS ve HGS tabanlı kontrol çözümleri</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </article>

            <article class="accordion-item" id="otopark-bariyer">
              <h2 class="accordion-header" id="otopark-baslik">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#otopark-panel" aria-expanded="false" aria-controls="otopark-panel">Otopark Bilet Verme ve Bariyer Sistemi</button>
              </h2>
              <div class="accordion-collapse collapse" id="otopark-panel" aria-labelledby="otopark-baslik" data-bs-parent="#solutionAccordion">
                <div class="accordion-body">
                  <div class="solution-detail">
                    <div class="solution-detail__visual"><img src="{{ asset('resimler/kurumsal/otopark-bilet-verme.jpg') }}" alt="Otopark bilet ve bariyer sistemi" /></div>
                    <div class="solution-detail__copy">
                      <h3>Otopark Bilet Verme ve Bariyer Sistemleri</h3>
                      <p>Bina, site ve kampüs girişlerinde kartlı geçiş veya RFID gibi doğrulama yöntemleriyle yetkili araçların beklemeden geçmesini sağlar.</p>
                      <p>Otopark bariyerleri; elektromekanik ya da hidrolik yol kesiciler, mantar bariyerler ve diğer geçiş engelleyicilerle entegre edilebilir.</p>
                    </div>
                  </div>
                </div>
              </div>
            </article>

            <article class="accordion-item" id="ic-ortam">
              <h2 class="accordion-header" id="ic-ortam-baslik">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ic-ortam-panel" aria-expanded="false" aria-controls="ic-ortam-panel">İç Ortam Tedbirleri</button>
              </h2>
              <div class="accordion-collapse collapse" id="ic-ortam-panel" aria-labelledby="ic-ortam-baslik" data-bs-parent="#solutionAccordion">
                <div class="accordion-body">
                  <div class="solution-detail">
                   <div class="solution-detail__copy">
                      <h3>İç Ortam Tedbirleri</h3>
                      <p>İşletmenin faaliyet alanı, iç mekân kullanımı ve risk profiline göre kritik bölgeler için özel güvenlik tedbirleri planlanır.</p>
                    </div>
                  </div>
                </div>
              </div>
            </article>

            <article class="accordion-item" id="otel-ekipmanlari">
              <h2 class="accordion-header" id="otel-baslik">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#otel-panel" aria-expanded="false" aria-controls="otel-panel">Otel Oda Ekipmanları</button>
              </h2>
              <div class="accordion-collapse collapse" id="otel-panel" aria-labelledby="otel-baslik" data-bs-parent="#solutionAccordion">
                <div class="accordion-body">
                  <div class="solution-detail">
                    <div class="solution-detail__copy">
                      <h3>Otel Oda Ekipmanları</h3>
                      <p>Konaklama tesislerinde oda güvenliği ve misafir kullanımına yönelik ekipmanlar, tesisin operasyonel ihtiyaçlarına göre belirlenir.</p>
                    </div>
                  </div>
                </div>
              </div>
            </article>

            <article class="accordion-item" id="resepsiyon-emanet">
              <h2 class="accordion-header" id="emanet-baslik">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#emanet-panel" aria-expanded="false" aria-controls="emanet-panel">Resepsiyon Emanet Dolabı</button>
              </h2>
              <div class="accordion-collapse collapse" id="emanet-panel" aria-labelledby="emanet-baslik" data-bs-parent="#solutionAccordion">
                <div class="accordion-body">
                  <div class="solution-detail">
                    <div class="solution-detail__copy">
                      <h3>Resepsiyon Emanet Dolabı</h3>
                      <p>Resepsiyona teslim edilen değerli eşyaların kontrollü, düzenli ve güvenli biçimde saklanmasına yardımcı olan kurumsal çözümdür.</p>
                    </div>
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
      </section>
    </main>

    <a class="floating-discovery" href="#ucretsiz-kesif"><span aria-hidden="true">✓</span> Ücretsiz Keşif</a>

    @include('partials.footer')

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
