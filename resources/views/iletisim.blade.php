<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="Tepenet Güvenlik iletişim bilgileri, çağrı merkezi ve iletişim formu."
    />
    <title>İletişim | Tepenet Güvenlik</title>

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

  <body class="page-iletisim">
    @include('partials.navbar')

    <main>
      <section class="contact-hero" aria-labelledby="page-title">
        <div class="container">
          <ol class="contact-breadcrumb" aria-label="Sayfa yolu">
            <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
            <li aria-hidden="true">›</li>
            <li aria-current="page">İletişim</li>
          </ol>

          <div class="contact-hero__heading">
            <span class="contact-hero__icon" aria-hidden="true">
              ☎
            </span>
            <div>
              <span class="contact-eyebrow">Tepenet Güvenlik</span>
              <h1 id="page-title">İletişim</h1>
              <p>Sorularınız, görüşleriniz ve güvenlik ihtiyaçlarınız için bize ulaşın.</p>
            </div>
          </div>
        </div>
      </section>

      <section class="contact-section" aria-label="İletişim bilgileri ve formu">
        <div class="container">
          <div class="row g-4 g-xl-5 align-items-start">
            <div class="col-12 col-lg-5">
              <aside class="contact-info" aria-labelledby="contact-info-title">
                <div class="contact-info__visual">
                  <img
                    src="{{ asset('resimler/ka_iletisim_merkezi_436x666px.jpg') }}"
                    alt="Tepenet müşteri iletişim merkezi temsilcisi"
                  />
                  <span>Size yardımcı olmak için buradayız.</span>
                </div>

                <div class="contact-info__content">
                  <span class="contact-eyebrow">Bize Ulaşın</span>
                  <h2 id="contact-info-title">İletişim Bilgilerimiz</h2>

                  <div class="contact-info__items">
                    <div class="contact-info__item">
                      <span class="contact-info__item-icon" aria-hidden="true">
                        ⌖
                      </span>
                      <div>
                        <h3>Bursa Bölge Müdürlüğü</h3>
                        <p>Yeniceköy Mah. Demokrasi Cad. Orhun Alp. No:20 İnegöl / Bursa</p>
                      </div>
                    </div>

                    <div class="contact-info__item">
                      <span class="contact-info__item-icon" aria-hidden="true">
                        ☎
                      </span>
                      <div>
                        <h3>Çağrı Merkezi</h3>
                        <p>
                          <a href="tel:+902243220370">0224 322 03 70</a><br />
                          <a href="tel:+908505329670">0850 532 96 70</a>
                        </p>
                      </div>
                    </div>

                    <div class="contact-info__item">
                      <span class="contact-info__item-icon" aria-hidden="true">
                        ✉
                      </span>
                      <div>
                        <h3>E-posta</h3>
                        <p><a href="mailto:inegol@tepenetguvenlik.com">inegol@tepenetguvenlik.com</a></p>
                      </div>
                    </div>
                  </div>

                  <p class="contact-info__note">
                    İstanbul ve Ankara şubelerimizin adreslerini sayfanın altındaki iletişim bilgilerinden inceleyebilirsiniz.
                  </p>
                </div>
              </aside>
            </div>

            <div class="col-12 col-lg-7">
              <section class="contact-form-card" aria-labelledby="contact-form-title">
                <span class="contact-eyebrow">Talebinizi İletin</span>
                <h2 id="contact-form-title">İletişim Formu</h2>
                <p class="contact-form-card__intro">
                  Tepenet güvenlik çözümleri hakkında bilgi almak veya kullandığınız sistemle ilgili soru, görüş ve bildirimlerinizi iletmek için formu doldurabilirsiniz.
                </p>

                <form class="contact-form">
                  <div class="row g-3">
                    <div class="col-12 col-md-6">
                      <label for="iletisim-ad">Adınız <span aria-hidden="true">*</span></label>
                      <input
                        class="form-control"
                        id="iletisim-ad"
                        name="ad"
                        type="text"
                        autocomplete="given-name"
                        placeholder="Adınız"
                        required
                      />
                    </div>

                    <div class="col-12 col-md-6">
                      <label for="iletisim-soyad">Soyadınız <span aria-hidden="true">*</span></label>
                      <input
                        class="form-control"
                        id="iletisim-soyad"
                        name="soyad"
                        type="text"
                        autocomplete="family-name"
                        placeholder="Soyadınız"
                        required
                      />
                    </div>

                    <div class="col-12 col-md-6">
                      <label for="iletisim-email">E-posta <span aria-hidden="true">*</span></label>
                      <input
                        class="form-control"
                        id="iletisim-email"
                        name="email"
                        type="email"
                        autocomplete="email"
                        placeholder="ornek@email.com"
                        required
                      />
                    </div>

                    <div class="col-12 col-md-6">
                      <label for="iletisim-telefon">Telefon Numaranız <span aria-hidden="true">*</span></label>
                      <div class="input-group">
                        <span class="input-group-text">+90</span>
                        <input
                          class="form-control"
                          id="iletisim-telefon"
                          name="telefon"
                          type="tel"
                          autocomplete="tel-national"
                          inputmode="numeric"
                          minlength="10"
                          maxlength="10"
                          pattern="5[0-9]{9}"
                          placeholder="5xx xxx xx xx"
                          aria-describedby="iletisim-telefon-yardim"
                          required
                        />
                      </div>
                      <div class="form-text" id="iletisim-telefon-yardim">Başında sıfır olmadan 10 hane giriniz.</div>
                    </div>

                    <div class="col-12 col-md-6">
                      <label for="iletisim-il">İl</label>
                      <select class="form-select" id="iletisim-il" name="il">
                        <option value="" selected>İl Seçiniz</option>
                        <option value="bursa">Bursa</option>
                        <option value="istanbul">İstanbul</option>
                        <option value="ankara">Ankara</option>
                      </select>
                    </div>

                    <div class="col-12 col-md-6">
                      <label for="iletisim-ilce">İlçe</label>
                      <select class="form-select" id="iletisim-ilce" name="ilce" disabled>
                        <option value="" selected>Önce bir il seçiniz</option>
                      </select>
                    </div>

                    <div class="col-12">
                      <label for="iletisim-konu">Konu</label>
                      <select class="form-select" id="iletisim-konu" name="konu">
                        <option value="" selected>Konu Seçiniz</option>
                        <option value="bilgi">Bilgi</option>
                        <option value="memnuniyet">Memnuniyet</option>
                        <option value="oneri">Öneri</option>
                        <option value="sikayet">Şikâyet</option>
                        <option value="talep">Talep</option>
                        <option value="yetkili-servis">Yetkili Servis</option>
                        <option value="yetkili-satici">Yetkili Satıcı</option>
                      </select>
                    </div>

                    <div class="col-12">
                      <label for="iletisim-mesaj">Mesajınız</label>
                      <textarea
                        class="form-control"
                        id="iletisim-mesaj"
                        name="mesaj"
                        rows="5"
                        placeholder="Mesajınızı yazınız"
                      ></textarea>
                    </div>

                    <div class="col-12">
                      <div class="contact-consent">
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            id="iletisim-kampanya"
                            name="kampanya_izni"
                            type="checkbox"
                            aria-controls="iletisim-tercihleri"
                            aria-expanded="false"
                          />
                          <label class="form-check-label" for="iletisim-kampanya">
                            Tepenet Güvenlik’in kampanya ve duyurular hakkında benimle iletişime geçmesine izin veriyorum.
                            <a href="#">Detay</a>
                          </label>
                        </div>

                        <fieldset class="contact-preferences" id="iletisim-tercihleri" hidden>
                          <legend>İletişim Tercihleri</legend>
                          <div class="form-check">
                            <input class="form-check-input" id="tercih-telefon" name="tercih_telefon" type="checkbox" />
                            <label class="form-check-label" for="tercih-telefon">Kampanya ve duyurular için telefonla iletişime izin veriyorum.</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" id="tercih-email" name="tercih_email" type="checkbox" />
                            <label class="form-check-label" for="tercih-email">Kampanya ve duyurular için e-postayla iletişime izin veriyorum.</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" id="tercih-sms" name="tercih_sms" type="checkbox" />
                            <label class="form-check-label" for="tercih-sms">Kampanya ve duyurular için SMS ile iletişime izin veriyorum.</label>
                          </div>
                        </fieldset>

                        <div class="form-check contact-consent__required">
                          <input
                            class="form-check-input"
                            id="iletisim-kvkk"
                            name="kvkk_onayi"
                            type="checkbox"
                            required
                          />
                          <label class="form-check-label" for="iletisim-kvkk">
                            Kişisel verilerin korunmasına ilişkin <a href="#">aydınlatma metnini</a> okudum ve anladım.
                            <span aria-hidden="true">*</span>
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <button class="contact-submit btn" type="button">Gönder <span aria-hidden="true">→</span></button>
                      <p class="contact-form__notice">Form gönderim altyapısı eklendiğinde bu düğme aktif olacaktır.</p>
                    </div>
                  </div>
                </form>
              </section>
            </div>
          </div>
        </div>
      </section>
    </main>

    @include('partials.footer')

    <script>
      const kampanyaIzni = document.getElementById("iletisim-kampanya");
      const iletisimTercihleri = document.getElementById("iletisim-tercihleri");
      const ilSecimi = document.getElementById("iletisim-il");
      const ilceSecimi = document.getElementById("iletisim-ilce");
      const ilceler = {
        bursa: ["İnegöl", "Nilüfer", "Osmangazi"],
        istanbul: ["Ataşehir", "Şişli"],
        ankara: ["Çankaya", "Yenimahalle"],
      };

      kampanyaIzni.addEventListener("change", () => {
        const tercihlerAcik = kampanyaIzni.checked;

        iletisimTercihleri.hidden = !tercihlerAcik;
        kampanyaIzni.setAttribute("aria-expanded", String(tercihlerAcik));

        if (!tercihlerAcik) {
          iletisimTercihleri.querySelectorAll('input[type="checkbox"]').forEach((secim) => {
            secim.checked = false;
          });
        }
      });

      ilSecimi.addEventListener("change", () => {
        const secilenIlceler = ilceler[ilSecimi.value] ?? [];

        ilceSecimi.replaceChildren(new Option("İlçe Seçiniz", ""));
        secilenIlceler.forEach((ilce) => ilceSecimi.add(new Option(ilce, ilce.toLocaleLowerCase("tr-TR"))));
        ilceSecimi.disabled = secilenIlceler.length === 0;
      });
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
