<!doctype html>
<html lang="tr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Online İşlemler | Tepenet Güvenlik</title>
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

<body class="page-online-islemler">
  @include('partials.navbar')

  <main class="online-page">
    <section class="online-hero" aria-labelledby="online-page-title">
      <div class="container">
        <p class="online-hero__eyebrow">Müşteri İşlem Merkezi</p>
        <h1 id="online-page-title">Online İşlemler</h1>
        <p>Hesabınıza giriş yapın veya ilk kullanım için kaydınızı kolayca oluşturun.</p>
      </div>
    </section>

    <section class="online-content">
      <div class="container">
        <div class="online-layout">
          <aside class="online-sidebar" aria-label="Online işlemler giriş seçenekleri">
            <section class="online-card online-login-card" aria-labelledby="online-login-title">
              <div class="online-card__heading">
                <span class="online-card__icon" aria-hidden="true"><i class="fa-solid fa-lock"></i></span>
                <div>
                  <p>Mevcut Müşteri</p>
                  <h2 id="online-login-title">Online İşlemler</h2>
                </div>
              </div>

              <div class="online-field">
                <label for="sinyal_id">Müşteri Numarası</label>
                <input class="form-control" type="text" id="sinyal_id" inputmode="numeric" autocomplete="username" />
              </div>

              <div class="online-field">
                <label for="giris_sifre">Şifre</label>
                <input class="form-control" type="password" id="giris_sifre" autocomplete="current-password" />
              </div>

              <div class="online-login-actions">
                <button type="button" class="online-button">Giriş Yap</button>
                <a href="#">Şifremi Unuttum</a>
              </div>
            </section>

            <section class="online-card online-register-summary" aria-labelledby="online-register-summary-title">
              <div class="online-card__heading">
                <span class="online-card__icon" aria-hidden="true"><i class="fa-solid fa-user-plus"></i></span>
                <div>
                  <p>İlk Kullanım</p>
                  <h2 id="online-register-summary-title">Yeni Kayıt</h2>
                </div>
              </div>
              <p>Online İşlem Merkezi’ne ilk kez giriş yapacaksanız müşteri numaranızla hızlıca kayıt olabilirsiniz.</p>
              <button
                id="registration-toggle"
                type="button"
                class="online-button online-button--wide"
                aria-controls="kart_1 kart_2"
                aria-expanded="false"
              >
                Yeni Kayıt
              </button>
            </section>
          </aside>

          <div class="online-main">
            <section id="kart_1" class="online-card online-intro-card" aria-labelledby="online-welcome-title">
              <p class="online-card__eyebrow">Güvenli ve Kolay Yönetim</p>
              <h2 id="online-welcome-title">Tepenet Güvenlik Online İşlemlere Hoş Geldiniz</h2>
              <p><strong>Online İşlemler</strong> ile aşağıdaki işlemlerinizin tümünü kolaylıkla ve güvenle yapabilirsiniz.</p>
              <img
                src="{{ asset('resimler/online_islemler/detay.png') }}"
                alt="Online İşlemler üzerinden yapılabilen işlemler"
              />
              <div class="online-intro-notes">
                <p><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Sisteme giriş yapmak için giriş bölümündeki alanları doldurmanız yeterlidir.</p>
                <p><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Daha önce kayıt olmadıysanız Yeni Kayıt formuyla hızlıca kaydınızı oluşturabilirsiniz.</p>
              </div>
            </section>

            <section id="kart_2" class="online-card online-register-card" aria-labelledby="online-register-title" hidden>
              <p class="online-card__eyebrow">Online İşlem Merkezi</p>
              <h2 id="online-register-title">Yeni Kayıt</h2>
              <p><strong>Online İşlemler</strong> bölümüne üye olurken sistemde kayıtlı telefon numaranıza onay kodu gelecektir. Lütfen telefon alanına sistemde kayıtlı numaranızı giriniz.</p>

              <form class="online-register-form" onsubmit="event.preventDefault();" action="#" method="post">
                @csrf

                <div class="online-field">
                  <label for="musteri_id">Müşteri Numarası</label>
                  <input
                    class="form-control"
                    type="text"
                    id="musteri_id"
                    name="musteri_id"
                    inputmode="numeric"
                    pattern="[0-9]+"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                    required
                  />
                </div>

                <div class="online-field">
                  <label for="tc">TC / VK Numarası</label>
                  <input
                    class="form-control"
                    type="text"
                    id="tc"
                    name="tc"
                    inputmode="numeric"
                    pattern="[0-9]{10,11}"
                    minlength="10"
                    maxlength="11"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                    required
                  />
                </div>

                <div class="online-field">
                  <label for="mail">E-posta</label>
                  <input class="form-control" type="email" id="mail" name="mail" autocomplete="email" required />
                </div>

                <div class="online-field">
                  <label for="tel">Telefon</label>
                  <input
                    class="form-control"
                    type="tel"
                    id="tel"
                    name="tel"
                    inputmode="tel"
                    placeholder="05XXXXXXXXX"
                    pattern="05[0-9]{9}"
                    minlength="11"
                    maxlength="11"
                    autocomplete="tel"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                    required
                  />
                </div>

                <div class="online-field">
                  <label for="kayit_sifre">Şifre</label>
                  <input class="form-control" type="password" id="kayit_sifre" name="sifre" minlength="8" autocomplete="new-password" required />
                </div>

                <div class="online-field">
                  <label for="sifre_tekrar">Şifre Tekrar</label>
                  <input class="form-control" type="password" id="sifre_tekrar" name="sifre_tekrar" minlength="8" autocomplete="new-password" required />
                </div>

                <p class="online-register-form__notice">Yeni kullanıcı olmadan önce lütfen <a href="#">Aydınlatma Metni</a>’ni okuyunuz. Metne sitedeki bağlantıdan veya mobil uygulamadan her zaman ulaşabilirsiniz.</p>

                <div class="online-consent">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="kullanim_sozlesmesi" required />
                    <label class="form-check-label" for="kullanim_sozlesmesi"><a href="#">Kullanım Sözleşmesi</a>’ni okudum ve onaylıyorum.</label>
                  </div>

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="ticari_ileti" required />
                    <label class="form-check-label" for="ticari_ileti">Tarafıma şirketiniz tarafından ticari elektronik ileti gönderilmesi için <a href="#">burada belirtilen</a> iznim vardır.</label>
                  </div>
                </div>

                <input type="submit" value="Kayıt Ol" class="online-button online-button--wide" />
              </form>
            </section>
          </div>
        </div>
      </div>
    </section>
  </main>

  <a class="floating-discovery" href="{{ route('home') }}#ucretsiz-kesif">
    <span aria-hidden="true">✓</span> Ücretsiz Keşif
  </a>

  @include('partials.footer')

  <script>
    const registrationToggle = document.getElementById('registration-toggle');
    const welcomePanel = document.getElementById('kart_1');
    const registrationPanel = document.getElementById('kart_2');

    registrationToggle.addEventListener('click', () => {
      const isOpeningRegistration = registrationPanel.hidden;

      welcomePanel.hidden = isOpeningRegistration;
      registrationPanel.hidden = !isOpeningRegistration;
      registrationToggle.setAttribute('aria-expanded', String(isOpeningRegistration));
      registrationToggle.textContent = isOpeningRegistration ? 'Tanıtıma Dön' : 'Yeni Kayıt';

      if (isOpeningRegistration) {
        registrationPanel.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  </script>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
</body>

</html>
