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
    crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('stil.css') }}" />

  <script
    src="https://kit.fontawesome.com/8d3c119f81.js"
    crossorigin="anonymous"></script>
</head>

<body class="page-index">
  @include('partials.navbar')

  <main>
    <div class="container d-flex justify-content-center">
      <div class="col-5 p-5">
        <div style="background-color: whitesmoke;" class="container-fluid p-4 d-flex flex-column border border-0 rounded-3">
          <h3>Online İşlemler</h3>
          <label class="mt-3" for="sinyal_id">Müşteri Numarası</label>
          <input class="mt-1 form-control" type="text" name="" id="sinyal_id">
          <label class="mt-3" for="sifre">Şifre</label>
          <input class="mt-1 form-control" type="text" name="" id="sifre">
          <div class="d-flex justify-content-between align-items-end mt-3">
            <button class="btn btn-danger">Giriş Yap</button>
            <a href="#" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Şifremi Unuttum</a>
          </div>
        </div>
        <div style="background-color: whitesmoke;" class="container-fluid p-4 d-flex flex-column border border-0 rounded-3 mt-5">
          <h3>Yeni Kayıt</h3>
          <p>Online İşlem Merkezi’ne ilk kez giriş yapacaksanız, aşağıdaki ‘Yeni Kayıt’ butonuna tıklayarak ‘Müşteri numaranız’ ile online işlemler merkezine kayıt olabilirsiniz.</p>
          <button onclick="kart_degistir()" class="btn btn-danger">Yeni Kayıt</button>
        </div>
      </div>
      <div class="col-7 p-5">

        <div id="kart_1" style="background-color: whitesmoke;" class="container-fluid p-4 d-flex flex-column border border-0 rounded-3">
          <h3>Tepenet Güvenlik Online İşlemlere Hoş Geldiniz</h3>
          <h6 class="mt-3"><strong>Online İşlemler</strong> ile aşağıdaki işlemlerinizin tümünü kolaylıkla ve güvenle yapabilirsiniz.</h6>
          <img src="{{ asset('resimler/online_islemler/detay.png') }}" class="img-fluid my-5" alt="">
          <span>Sisteme giriş yapabilmek için; ‘Online İşlemlere Giriş’ bölümündeki alanları doldurmanız yeterlidir.</span>
          <span>Daha önce kayıt olmadıysanız ‘Yeni Kayıt’ sekmesindeki formu doldurarak hızlıca kaydınızı oluşturabilirsiniz.</span>
        </div>

        <div id="kart_2" style="background-color: whitesmoke;" class="d-none container-fluid p-4 d-flex flex-column border border-0 rounded-3">
          <h3>Yeni Kayıt</h3>
          <span class="mt-4"><strong>Online İşlemler</strong> bölümüne üye olurken sistemde kayıtlı telefon numaranıza onay kodu gelecektir.
            Lütfen <strong>‘Telefon’</strong> bilgisi bölümüne sistemde kayıtlı olan numaranızı giriniz.</span>
          <form onsubmit="event.preventDefault();" action="#" method="post">
            @csrf
            <label class="mt-3" for="musteri_id">Müşteri Numarası</label>
            <input
              class="mt-1 form-control"
              type="text"
              id="musteri_id"
              name="musteri_id"
              inputmode="numeric"
              pattern="[0-9]+"
              oninput="this.value = this.value.replace(/[^0-9]/g, '')"
              required />

            <label class="mt-3" for="tc">TC / VK Numarası</label>
            <input
              class="mt-1 form-control"
              type="text"
              id="tc"
              name="tc"
              inputmode="numeric"
              pattern="[0-9]{10,11}"
              minlength="10"
              oninput="this.value = this.value.replace(/[^0-9]/g, '')"
              maxlength="11"
              required />

            <label class="mt-3" for="mail">E-mail</label>
            <input
              class="mt-1 form-control"
              type="email"
              id="mail"
              name="mail"
              autocomplete="email"
              required />

            <label class="mt-3" for="tel">Telefon</label>
            <input
              class="mt-1 form-control"
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
              required />

            <label class="mt-3" for="sifre">Şifre</label>
            <input
              class="mt-1 form-control"
              type="password"
              id="sifre"
              name="sifre"
              minlength="8"
              autocomplete="new-password"
              required />

            <label class="mt-3" for="sifre_tekrar">Şifre Tekrar</label>
            <input
              class="mt-1 form-control"
              type="password"
              id="sifre_tekrar"
              name="sifre_tekrar"
              minlength="8"
              autocomplete="new-password"
              required />

            <span class="mt-5 fw-light">Yeni Kullanıcı/üye olmadan önce lütfen <a style="text-decoration: none;" class="text-danger" href="#">Aydınlatma Metni</a> 'ni okuyunuz. Aydınlatma Metni’ne her zaman sitedeki bu linkten veya Securitas Alarm Mobil Uygulaması üzerinden ulaşabilirsiniz.</span>

            <div class="mt-5 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
              <label class="form-check-label fst-italic" for="exampleCheck1"><a style="text-decoration: none;" class="text-danger" href="#">Kullanım Sözleşmesi</a> 'ni okudum, onaylıyorum.</label>
            </div>

            <div class="mb-3 mt-5 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" required>

              <label class="form-check-label fst-italic" for="exampleCheck1">Tarafıma şirketiniz tarafından ticari elektronik ileti gönderilmesi için <a style="text-decoration: none;" class="text-danger" href="#">burada da belirtilen</a> iznim vardır.</label>
            </div>

            <input type="submit" value="Kayıt Ol" class="btn btn-danger">
          </form>
        </div>
      </div>
    </div>
  </main>

  <a class="floating-discovery" href="#ucretsiz-kesif">
    <span aria-hidden="true">✓</span> Ücretsiz Keşif
  </a>

  @include('partials.footer')

  <script>
    const kart_1 = document.getElementById('kart_1');
    const kart_2 = document.getElementById('kart_2');

    function kart_degistir()
    {
      kart_1.classList.toggle('d-none');
      kart_2.classList.toggle('d-none');
    }
  </script>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
</body>

</html>