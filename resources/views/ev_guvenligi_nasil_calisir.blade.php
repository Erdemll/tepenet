<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="Tepenet ev alarm sisteminin alarm anında nasıl çalıştığını ve izleme merkezi sürecini inceleyin."
    />
    <title>Ev Alarm Sistemi Nasıl Çalışır? | Tepenet Güvenlik</title>

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

  <body class="page-ev-guvenligi-nasil-calisir">
    @include('partials.navbar')

    <main>
      <section class="process-hero" aria-labelledby="page-title">
        <div class="process-hero__image">
          <img src="{{ asset('resimler/ev_nelerden/banner.png') }}" alt="Ev alarm sistemi kullanan aile" />
        </div>
        <div class="container">
          <h1 id="page-title">Ev Alarm Sistemi Nasıl Çalışır?</h1>
          <ol class="breadcrumb-list" aria-label="Sayfa yolu">
            <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
            <li><a href="{{ route('ev-guvenligi.index') }}">Ev Güvenliği</a></li>
            <li aria-current="page">Nasıl Çalışır?</li>
          </ol>
        </div>
      </section>

      <section class="process-section" aria-labelledby="process-title">
        <div class="container">
          <div class="row g-4 g-lg-5">
            <div class="col-12 col-lg-3">
              <nav aria-label="Ev güvenliği sayfaları">
                <ul class="process-navigation">
                  <li><a href="{{ route('ev-guvenligi.index') }}">Ev Alarm Sistemleri</a></li>
                  <li><a href="#">Toplu Konut Alarm Sistemleri</a></li>
                  <li>
                    <a
                      class="active"
                      href="{{ route('ev-guvenligi.nasil-calisir') }}"
                      aria-current="page"
                      >Nasıl Çalışır?</a
                    >
                  </li>
                </ul>
              </nav>
            </div>

            <div class="col-12 col-lg-9 process-content">
              <div class="video-frame">
                <iframe
                  width="1106"
                  height="622"
                  src="https://www.youtube.com/embed/1Uscdc6eTWo"
                  title="Kale Alarm Sistem Nasıl Çalışır?"
                  frameborder="0"
                  allow="
                    accelerometer;
                    autoplay;
                    clipboard-write;
                    encrypted-media;
                    gyroscope;
                    picture-in-picture;
                    web-share;
                  "
                  referrerpolicy="strict-origin-when-cross-origin"
                  allowfullscreen
                ></iframe>
              </div>

              <h2 id="process-title">
                Tepenet Ev Alarm Sistemi Nasıl Çalışır?
              </h2>
              <ol class="process-steps">
                <li>
                  Devreye alınan ev alarm sisteminde, dış kapıda bulunan
                  manyetik kontak bileşenlerinin birbirinden ayrılması ile alarm
                  paneline sinyal gider.
                </li>
                <li>
                  Dış kapının açılmasından kaynaklanan uyarı sinyalini
                  durdurabilmek için abonenin 15 saniye (abonenin isteğine göre
                  bu süre azaltıp artırılabilir) içerisinde tuş takımına kendi
                  belirlemiş olduğu şifreyi girmesi gerekmektedir.
                </li>
                <li>
                  Şifre girildikten sonra ev alarm sistemi devre dışı bırakılır
                  (15 saniyelik uyarı sinyali boyunca sirenler devreye
                  girmemektedir).
                </li>
                <li>
                  Gecikmeli bölgeler haricindeki manyetik kontak ve hareketi
                  algılayan hareket dedektörlerinin uyarılması ise alarmları
                  birkaç saniye içerisinde devreye sokmaktadır.
                </li>
                <li>
                  Ev alarmlarının devreye girme sinyali, Alarm İzleme Merkezi
                  temsilcisinin ekranında belirir.
                </li>
                <li>Temsilci vakit kaybetmeden abone ile iletişime geçer.</li>
                <li>
                  Ayrıca alarmın çeşidine göre de polis, itfaiye, ambulans gibi
                  ilgili birimin yönlendirilmesi sağlanır.​​​​
                </li>
              </ol>
            </div>
          </div>
        </div>
      </section>
    </main>

    <a class="floating-discovery" href="{{ route('ev-guvenligi.index') }}#ucretsiz-kesif"
      ><span aria-hidden="true">✓</span> Ücretsiz Keşif</a
    >

    @include('partials.footer')

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
