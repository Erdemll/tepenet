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
          <img
            src="{{ asset('resimler/hakkimizda/banner3.png') }}"
            alt="Ev alarm sistemi kullanan aile"
          />
        </div>
        <div class="container">
          <h1 id="page-title">Hakkımızda</h1>
          <ol class="breadcrumb-list" aria-label="Sayfa yolu">
            <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
            <li><a href="{{ route('hakkimizda.yonetim-kurulu') }}">Yönetim Kurulu</a></li>
          </ol>
        </div>
      </section>

      <section class="process-section" aria-labelledby="process-title">
        <div class="container">
          <div class="row g-4 g-lg-5">
            <div class="col-12 col-lg-3">
              <nav aria-label="Ev güvenliği sayfaları">
                <ul class="process-navigation">
                  <li>
                    <a href="{{ route('hakkimizda.index') }}"
                      >Hakkımızda</a
                    >
                  </li>
                  <li><a class="active" aria-current="page" href="{{ route('hakkimizda.yonetim-kurulu') }}">Yönetim Kurulu</a></li>
                </ul>
              </nav>
            </div>

            <div class="col-12 col-lg-9 process-content">
              <section>
                <div class="container-fluid d-flex align-items-center">
                  <div class="col-6">
                    <h2>GÜRKAN BURAK KARA</h2>
                  </div>
                  <div class="col-6">
                    <img class="img-fluid" src="{{ asset('resimler/hakkimizda/kurucu.jpeg') }}" alt="">
                  </div>
                </div>

                <p>
                  <strong>Kurucu &amp; Yönetim Kurulu Başkanı</strong>
                </p>

                <h3>Tepenet Güvenlik'in Kurucu Vizyonu</h3>

                <p>
                  Gürkan Burak Kara, Tepenet Teknoloji ve Güvenlik
                  Sistemleri'nin kurucusu ve Yönetim Kurulu Başkanı olarak
                  şirketin stratejik yönetimine, büyüme hedeflerine ve kurumsal
                  gelişimine liderlik etmektedir.
                </p>

                <p>
                  Güvenlik sektörünün yalnızca güvenlik ekipmanlarından ibaret
                  olmadığı; teknoloji, insan kaynağı, hızlı müdahale, kesintisiz
                  iletişim ve müşteri memnuniyetinin bir bütün olarak ele
                  alınması gerektiği anlayışıyla hareket eden Kara, Tepenet'in
                  kuruluşundan itibaren teknoloji odaklı ve sürdürülebilir bir
                  güvenlik şirketi oluşturma vizyonunu benimsemiştir.
                </p>

                <h3>Kuruluş Vizyonu</h3>

                <p>
                  Tepenet Güvenlik'in temelinde, bireylerin, işletmelerin ve
                  kurumların güvenlik ihtiyaçlarına modern teknolojiyle cevap
                  verebilen profesyonel bir yapı oluşturma hedefi bulunmaktadır.
                </p>

                <p>
                  Bu doğrultuda şirket; güvenlik sistemleri, alarm çözümleri,
                  kamera sistemleri, alarm izleme, teknik destek, müşteri
                  hizmetleri ve teknoloji tabanlı güvenlik hizmetlerini bir
                  araya getiren kapsamlı bir hizmet anlayışı geliştirmektedir.
                </p>

                <p>
                  Gürkan Burak Kara'nın yönetimindeki temel hedeflerden biri,
                  güvenlik hizmetini yalnızca ürün satışı olarak değil,
                  müşterinin ihtiyacının belirlenmesinden kurulum ve teknik
                  desteğe, izleme hizmetlerinden satış sonrasına kadar devam
                  eden uzun vadeli bir güvenlik çözümü olarak ele almaktır.
                </p>

                <h3>Liderlik ve Yönetim Anlayışı</h3>

                <p>
                  Kara'nın yönetim felsefesinin temelinde beş ana değer
                  bulunmaktadır:
                </p>

                <p>
                  <strong
                    >Güven – Teknoloji – Disiplin – İnsan – Sürekli
                    Gelişim</strong
                  >
                </p>

                <p>
                  Şirket yönetiminde müşteri memnuniyetinin yanı sıra
                  çalışanların gelişimi, operasyonel disiplin, hızlı iletişim ve
                  teknolojik altyapının sürekli geliştirilmesi önem
                  taşımaktadır.
                </p>

                <p>
                  Bu anlayış doğrultusunda Tepenet bünyesinde satış, operasyon,
                  teknik hizmetler, çağrı merkezi, insan kaynakları, bilgi işlem
                  ve yönetim süreçlerinin birbirleriyle koordineli şekilde
                  çalışabileceği kurumsal bir organizasyon yapısının
                  geliştirilmesine önem verilmektedir.
                </p>

                <h3>Teknoloji Odaklı Güvenlik</h3>

                <p>
                  Tepenet'in gelişiminde dijitalleşme önemli bir yere sahiptir.
                </p>

                <p>
                  Müşteri işlemlerinin, iletişim süreçlerinin, teklif ve
                  faturalandırma işlemlerinin ve çeşitli hizmet süreçlerinin
                  dijital platformlara taşınmasıyla daha hızlı, düzenli ve takip
                  edilebilir bir hizmet modeli oluşturulması hedeflenmektedir.
                </p>

                <p>
                  Teknolojinin güvenlik sektöründeki rolünü yakından takip eden
                  Gürkan Burak Kara, Tepenet'in yalnızca bugünün ihtiyaçlarına
                  değil, geleceğin güvenlik teknolojilerine de hazırlıklı olması
                  gerektiği anlayışıyla hareket etmektedir.
                </p>

                <h3>Bölgesel Yapılanma</h3>

                <p>
                  Tepenet Güvenlik'in büyüme stratejisinde bölgesel yapılanma ve
                  hizmet ağının genişletilmesi önemli bir yer tutmaktadır.
                </p>

                <p>
                  Bursa ve İnegöl başta olmak üzere farklı şehirlerde
                  oluşturulan yapılanmalarla müşterilere daha yakın hizmet
                  sunulması, operasyonel kapasitenin artırılması ve bölgesel
                  hizmet kalitesinin yükseltilmesi amaçlanmaktadır.
                </p>

                <p>
                  Bu yapılanma, Tepenet'in gelecekte Türkiye genelinde daha
                  geniş bir güvenlik hizmet ağı oluşturma hedefinin temel
                  adımlarından biridir.
                </p>

                <h3>Müşteri Memnuniyeti</h3>

                <p>
                  Gürkan Burak Kara'nın yönetim anlayışında müşteri ilişkileri,
                  şirketin sürdürülebilir başarısının temel unsurlarından biri
                  olarak görülmektedir.
                </p>

                <p>
                  Tepenet'in hedefi yalnızca yeni müşteriler kazanmak değil,
                  mevcut müşterileriyle uzun yıllara dayanan güven ilişkileri
                  kurmaktır.
                </p>

                <p>
                  Bu nedenle satış öncesi danışmanlıktan kurulum sürecine, alarm
                  izleme hizmetlerinden teknik desteğe ve satış sonrası müşteri
                  hizmetlerine kadar tüm süreçlerin geliştirilmesine önem
                  verilmektedir.
                </p>

                <h3>İnsan Kaynağı ve Kurumsal Kültür</h3>

                <p>
                  Başarılı bir güvenlik şirketinin arkasında güçlü bir ekip
                  olması gerektiğine inanan Gürkan Burak Kara, Tepenet'in
                  kurumsal yapısının geliştirilmesinde insan kaynağına özel önem
                  vermektedir.
                </p>

                <p>
                  Şirket içerisinde görev yapan personelin sorumluluklarının net
                  şekilde belirlenmesi, departmanlar arası iletişimin
                  güçlendirilmesi, çalışanların mesleki gelişiminin
                  desteklenmesi ve kurumsal çalışma kültürünün oluşturulması
                  şirket yönetiminin öncelikleri arasında yer almaktadır.
                </p>

                <h3>Çalışmaları</h3>

                <p>
                  Gürkan Burak Kara'nın Tepenet bünyesindeki çalışmalarının
                  başlıca alanları şunlardır:
                </p>

                <ul>
                  <li>Şirketin stratejik yönetimi</li>
                  <li>Yeni hizmet alanlarının geliştirilmesi</li>
                  <li>Güvenlik teknolojilerinin takip edilmesi</li>
                  <li>Dijital dönüşüm çalışmalarının yürütülmesi</li>
                  <li>Bölgesel yapılanmanın geliştirilmesi</li>
                  <li>Müşteri memnuniyetinin artırılması</li>
                  <li>Operasyonel süreçlerin geliştirilmesi</li>
                  <li>Kurumsal iş ortaklıklarının güçlendirilmesi</li>
                  <li>
                    İnsan kaynaklarının ve yönetim kadrolarının geliştirilmesi
                  </li>
                  <li>Güvenlik hizmetlerinin teknolojiyle bütünleştirilmesi</li>
                </ul>

                <h3>Başarı Anlayışı</h3>

                <p>
                  Gürkan Burak Kara için başarı yalnızca finansal büyüme veya
                  şirketin büyüklüğüyle ölçülmemektedir.
                </p>

                <p>
                  Asıl başarı; müşterilerin Tepenet'e güvenmesi, çalışanların
                  güçlü bir kurum kültürü içerisinde görev yapması, hizmet
                  kalitesinin sürekli geliştirilmesi ve teknolojik gelişmelerin
                  güvenlik hizmetlerine başarıyla entegre edilmesidir.
                </p>

                <p>
                  Bu anlayışla Tepenet'in her geçen gün daha profesyonel, daha
                  teknolojik ve daha erişilebilir bir güvenlik markasına
                  dönüşmesi hedeflenmektedir.
                </p>

                <h3>Gelecek Vizyonu</h3>

                <p>
                  Tepenet Güvenlik'in gelecek vizyonu; Türkiye'nin farklı
                  bölgelerinde hizmet veren, teknolojik altyapısı güçlü,
                  profesyonel insan kaynağına sahip ve müşterilerine uçtan uca
                  güvenlik çözümleri sunabilen güçlü bir marka oluşturmaktır.
                </p>

                <p>Gürkan Burak Kara'nın liderliğinde şirket;</p>

                <p>
                  <strong>
                    daha güçlü teknoloji, daha geniş hizmet ağı, daha
                    profesyonel ekipler ve daha yüksek müşteri memnuniyeti
                  </strong>
                  hedefleri doğrultusunda gelişimini sürdürmektedir.
                </p>

                <h3>Kurucumuzun Liderlik İlkesi</h3>

                <p>Tepenet'in kurucu vizyonunu oluşturan temel anlayış;</p>

                <blockquote>
                  <p>
                    <strong>
                      “Güvenliği yalnızca sağlamak değil, güven duygusunu
                      sürdürülebilir hale getirmek.”
                    </strong>
                  </p>
                </blockquote>

                <p>
                  Tepenet Güvenlik, bu anlayış doğrultusunda teknoloji ve insan
                  gücünü bir araya getirerek müşterilerine güvenli bir gelecek
                  sunmayı amaçlamaktadır.
                </p>

                <p>
                  <strong>GÜRKAN BURAK KARA</strong><br />
                  Kurucu &amp; Yönetim Kurulu Başkanı<br />
                  <strong>TEPENET TEKNOLOJİ VE GÜVENLİK SİSTEMLERİ</strong>
                </p>

                <blockquote>
                  <p>
                    <strong
                      >Güvenle başlayan, teknolojiyle güçlenen bir
                      gelecek.</strong
                    >
                  </p>
                </blockquote>
              </section>
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
