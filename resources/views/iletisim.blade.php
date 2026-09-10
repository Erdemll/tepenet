<!doctype html>
<html lang="tr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta
    name="description"
    content="Tepenet Güvenlik iletişim bilgileri, çağrı merkezi ve iletişim formu." />
  <title>İletişim | Tepenet Güvenlik</title>

  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('stil.css') }}" />
  <script
    src="https://kit.fontawesome.com/8d3c119f81.js"
    crossorigin="anonymous"></script>
</head>

<body class="page-iletisim">
  @include('partials.navbar')

  <main>
    <section class="catalog-hero" aria-labelledby="page-title">
      <div class="catalog-hero__image">
        <img src="{{ asset('resimler/iletisim_banner.png') }}" alt="Tepenet Güvenlik iletişim hizmetleri" />
      </div>
      <div class="container">
        <h1 id="page-title">İletişim</h1>
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
                  alt="Tepenet müşteri iletişim merkezi temsilcisi" />
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
            <section class="contact-form-card" id="iletisim-formu" aria-labelledby="contact-form-title">
              <span class="contact-eyebrow">Talebinizi İletin</span>
              <h2 id="contact-form-title">İletişim Formu</h2>
              <p class="contact-form-card__intro">
                Tepenet güvenlik çözümleri hakkında bilgi almak veya kullandığınız sistemle ilgili soru, görüş ve bildirimlerinizi iletmek için formu doldurabilirsiniz.
              </p>

              @if (session('contact_success'))
              <div class="alert alert-success" role="status">
                {{ session('contact_success') }}
              </div>
              @endif

              @if (session('contact_error'))
              <div class="alert alert-danger" role="alert">
                {{ session('contact_error') }}
              </div>
              @endif

              @if ($errors->any())
              <div class="alert alert-danger" role="alert">
                Lütfen işaretli alanları kontrol edin.
              </div>
              @endif

              <form class="contact-form" action="{{ route('iletisim.store') }}" method="post">
                @csrf

                <div class="row g-3">
                  <div class="col-12 col-md-6">
                    <label for="iletisim-ad">Adınız <span aria-hidden="true">*</span></label>
                    <input
                      class="form-control @error('ad') is-invalid @enderror"
                      id="iletisim-ad"
                      name="ad"
                      type="text"
                      autocomplete="given-name"
                      maxlength="100"
                      placeholder="Adınız"
                      value="{{ old('ad') }}"
                      required />
                    @error('ad')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-12 col-md-6">
                    <label for="iletisim-soyad">Soyadınız <span aria-hidden="true">*</span></label>
                    <input
                      class="form-control @error('soyad') is-invalid @enderror"
                      id="iletisim-soyad"
                      name="soyad"
                      type="text"
                      autocomplete="family-name"
                      maxlength="100"
                      placeholder="Soyadınız"
                      value="{{ old('soyad') }}"
                      required />
                    @error('soyad')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-12 col-md-6">
                    <label for="iletisim-email">E-posta <span aria-hidden="true">*</span></label>
                    <input
                      class="form-control @error('email') is-invalid @enderror"
                      id="iletisim-email"
                      name="email"
                      type="email"
                      autocomplete="email"
                      maxlength="255"
                      placeholder="ornek@email.com"
                      value="{{ old('email') }}"
                      required />
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-12 col-md-6">
                    <label for="iletisim-telefon">Telefon Numaranız <span aria-hidden="true">*</span></label>
                    <div class="input-group">
                      <span class="input-group-text">+90</span>
                      <input
                        class="form-control @error('telefon') is-invalid @enderror"
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
                        value="{{ old('telefon') }}"
                        required />
                    </div>
                    <div class="form-text" id="iletisim-telefon-yardim">Başında sıfır olmadan 10 hane giriniz.</div>
                    @error('telefon')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-12 col-md-6">
                    <label for="iletisim-il">İl</label>
                    <select
                      class="form-select @error('il') is-invalid @enderror"
                      id="iletisim-il"
                      name="il"
                      required>
                      <option value="" @selected(!old('il')) disabled>
                        İl Seçiniz
                      </option>

                      @foreach (config('iller') as $value => $label)
                      <option value="{{ $value }}" @selected(old('il')===$value)>
                        {{ $label }}
                      </option>
                      @endforeach
                    </select>
                    @error('il')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-12 col-md-6">
                    <label for="iletisim-ilce">İlçe</label>
                    <input
                      class="form-control @error('ilce') is-invalid @enderror"
                      id="iletisim-ilce"
                      name="ilce"
                      type="text"
                      autocomplete="address-level2"
                      maxlength="100"
                      placeholder="İlçenizi yazın"
                      value="{{ old('ilce') }}" />
                    @error('ilce')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-12">
                    <label for="iletisim-konu">Konu</label>
                    <select class="form-select @error('konu') is-invalid @enderror" id="iletisim-konu" name="konu">
                      <option value="">Konu Seçiniz</option>
                      <option value="bilgi" @selected(old('konu')==='bilgi' )>Bilgi</option>
                      <option value="memnuniyet" @selected(old('konu')==='memnuniyet' )>Memnuniyet</option>
                      <option value="oneri" @selected(old('konu')==='oneri' )>Öneri</option>
                      <option value="sikayet" @selected(old('konu')==='sikayet' )>Şikâyet</option>
                      <option value="talep" @selected(old('konu')==='talep' )>Talep</option>
                      <option value="yetkili-servis" @selected(old('konu')==='yetkili-servis' )>Yetkili Servis</option>
                      <option value="yetkili-satici" @selected(old('konu')==='yetkili-satici' )>Yetkili Satıcı</option>
                    </select>
                    @error('konu')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-12">
                    <label for="iletisim-mesaj">Mesajınız</label>
                    <textarea
                      class="form-control @error('mesaj') is-invalid @enderror"
                      id="iletisim-mesaj"
                      name="mesaj"
                      rows="5"
                      maxlength="5000"
                      placeholder="Mesajınızı yazınız">{{ old('mesaj') }}</textarea>
                    @error('mesaj')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-12">
                    <div class="contact-consent">
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          id="iletisim-kampanya"
                          name="kampanya_izni"
                          type="checkbox"
                          value="1"
                          aria-controls="iletisim-tercihleri"
                          aria-expanded="{{ old('kampanya_izni') ? 'true' : 'false' }}"
                          @checked(old('kampanya_izni')) />
                        <label class="form-check-label" for="iletisim-kampanya">
                          Tepenet Güvenlik’in kampanya ve duyurular hakkında benimle iletişime geçmesine izin veriyorum.
                          <a href="#">Detay</a>
                        </label>
                      </div>

                      <fieldset class="contact-preferences" id="iletisim-tercihleri" @if (! old('kampanya_izni')) hidden @endif>
                        <legend>İletişim Tercihleri</legend>
                        <div class="form-check">
                          <input class="form-check-input" id="tercih-telefon" name="tercih_telefon" type="checkbox" value="1" @checked(old('tercih_telefon')) />
                          <label class="form-check-label" for="tercih-telefon">Kampanya ve duyurular için telefonla iletişime izin veriyorum.</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" id="tercih-email" name="tercih_email" type="checkbox" value="1" @checked(old('tercih_email')) />
                          <label class="form-check-label" for="tercih-email">Kampanya ve duyurular için e-postayla iletişime izin veriyorum.</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" id="tercih-sms" name="tercih_sms" type="checkbox" value="1" @checked(old('tercih_sms')) />
                          <label class="form-check-label" for="tercih-sms">Kampanya ve duyurular için SMS ile iletişime izin veriyorum.</label>
                        </div>
                      </fieldset>

                      <div class="form-check contact-consent__required">
                        <input
                          class="form-check-input @error('kvkk_onayi') is-invalid @enderror"
                          id="iletisim-kvkk"
                          name="kvkk_onayi"
                          type="checkbox"
                          value="1"
                          @checked(old('kvkk_onayi'))
                          required />
                        <label class="form-check-label" for="iletisim-kvkk">
                          Kişisel verilerin korunmasına ilişkin <a href="#">aydınlatma metnini</a> okudum ve anladım.
                          <span aria-hidden="true">*</span>
                        </label>
                        @error('kvkk_onayi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <button class="contact-submit btn" type="submit">Gönder <span aria-hidden="true">→</span></button>
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

  </script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
</body>

</html>
