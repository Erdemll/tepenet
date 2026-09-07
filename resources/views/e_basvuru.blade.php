<!doctype html>
<html lang="tr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta
    name="description"
    content="Tepenet iş ilanlarını, kariyer olanaklarını ve işe alım sürecini inceleyin; güvenlik sektöründe kariyerinize yön verin." />
  <title>E-Başvuru Portalı | Tepenet Güvenlik</title>

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

<body class="page-e-basvuru">
  @include('partials.navbar')

  <main>
    <section class="e-application-hero" aria-labelledby="e-application-title">
      <div class="container">
        <span class="eyebrow">Tepenet Kariyer</span>
        <h1 id="e-application-title">E-Başvuru Portalı</h1>
        <p>
          Daha güvenli bir gelecek için siz de Tepenet ekibine katılabilir,
          kariyerinize güvenlik sektöründe yön verebilirsiniz.
        </p>
      </div>
    </section>

    <section id="pozisyonlar" class="e-application-section e-application-positions" aria-labelledby="positions-title">
      <div class="container">
        <div class="e-application-section__heading">
          <span class="eyebrow">Açık Pozisyonlar</span>
          <h2 id="positions-title">Size uygun kariyer yolunu seçin</h2>
          <p>Deneyiminize ve hedeflerinize uygun çalışma alanını inceleyerek başvuru sürecini başlatın.</p>
        </div>

        <div class="row g-4">
          <div class="col-12 col-md-6 col-lg-4">
            <a class="e-position-card" href="{{ route('is-ilanlari') }}">
              <div class="e-position-card__media" data-image-slot="Özel güvenlik görevlisi görseli">
                <img src="{{ asset('resimler/basvuru/guvenlik_personeli.png') }}" alt="">
              </div>
              <div class="e-position-card__body">
                <h3>Özel güvenlik görevlisi</h3>
                <p>Görev alanında düzeni koruyan, riskleri gözlemleyen ve güvenliğin sürekliliğine katkı sağlayan ekip üyesidir.</p>
                <span class="e-position-card__link">İlanları inceleyin <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
              </div>
            </a>
          </div>

          <div class="col-12 col-md-6 col-lg-4">
            <a class="e-position-card" href="{{ route('is-ilanlari') }}">
              <div class="e-position-card__media" data-image-slot="Özel güvenlik yöneticisi görseli">
                <img src="{{ asset('resimler/basvuru/guvenlik_amiri.png') }}" alt="">
              </div>
              <div class="e-position-card__body">
                <h3>Özel güvenlik yöneticisi</h3>
                <p>Saha ekibinin koordinasyonunu, görev planını ve hizmet standartlarının uygulanmasını yöneten ekip lideridir.</p>
                <span class="e-position-card__link">İlanları inceleyin <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
              </div>
            </a>
          </div>

          <div class="col-12 col-md-6 col-lg-4">
            <a class="e-position-card" href="{{ route('is-ilanlari') }}">
              <div class="e-position-card__media" data-image-slot="İdari birimler görseli">
                <img src="{{ asset('resimler/basvuru/idari_birimler.jpg') }}" alt="">
              </div>
              <div class="e-position-card__body">
                <h3>İdari birimler</h3>
                <p>Operasyonların planlı ve verimli ilerlemesine uzmanlık alanlarıyla destek veren merkez ekipleridir.</p>
                <span class="e-position-card__link">İlanları inceleyin <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="e-application-section e-application-feature">
      <div class="container">
        <div class="row g-4 g-lg-5 align-items-center">
          <div class="col-12 col-lg-6">
            <div class="e-application-media e-application-media--video" data-image-slot="Çalışan yaşam döngüsü videosu">
              <img src="{{ asset('resimler/basvuru/yasam.png') }}" alt="">
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <span class="eyebrow">Birlikte Gelişim</span>
            <h2>Çalışan yaşam döngüsü</h2>
            <p>
              Çalışanlarımızın mutluluğunu ve gelişimini merkeze alıyoruz. Eğitim ve gelişim olanaklarıyla
              ekip arkadaşlarımızın uzmanlıklarını güçlendirmelerini, sorumluluklarında ilerlemelerini ve
              kariyer hedeflerine güvenle yaklaşmalarını destekliyoruz.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="e-application-section e-application-feature e-application-feature--muted">
      <div class="container">
        <div class="row g-4 g-lg-5 align-items-center">
          <div class="col-12 col-lg-6 order-lg-2">
            <div class="e-application-media" data-image-slot="Özel güvenlik görevlisi görseli">
             <img src="{{ asset('resimler/basvuru/personel.png') }}" alt="">
            </div>
          </div>
          <div class="col-12 col-lg-6 order-lg-1">
            <span class="eyebrow">Mesleğe İlk Adım</span>
            <h2>Özel güvenlik görevlisi nasıl olunur?</h2>
            <p>
              Özel güvenlik alanında görev almak isteyen adayların ilgili mevzuatta belirtilen koşulları
              karşılaması, gerekli eğitimi tamamlaması ve geçerli özel güvenlik kimlik kartına sahip olması gerekir.
              Pozisyona göre silahlı veya silahsız görev şartları ile ek belge talepleri değişebilir.
            </p>
            <a class="e-application-text-link" href="#sikca-sorulan-sorular">Merak edilenleri inceleyin <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </section>

    <section class="e-application-section e-application-feature">
      <div class="container">
        <div class="row g-4 g-lg-5 align-items-center">
          <div class="col-12 col-lg-6">
            <div class="e-application-media e-application-media--video" data-image-slot="Tepenet kariyer videosu">
              <img src="{{ asset('resimler/basvuru/kariyer.png') }}" alt="">
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <span class="eyebrow">Tepenet'te Kariyer</span>
            <h2>Neden bizimle çalışmalısınız?</h2>
            <ul class="e-career-benefits">
              <li>Kariyer planlarını adil ve ölçülebilir bir performans yaklaşımıyla destekliyoruz.</li>
              <li>Kişisel ve mesleki gelişime yönelik eğitim fırsatları sunuyoruz.</li>
              <li>Açık iletişimi ve şeffaf yönetim anlayışını önemsiyoruz.</li>
              <li>İş sağlığı, güvenliği ve toplumsal sorumluluk konularını önceliklendiriyoruz.</li>
              <li>İşe alım sürecini anlaşılır, verimli ve aday odaklı biçimde yürütüyoruz.</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="e-application-section e-application-values" aria-labelledby="values-title">
      <div class="container">
        <div class="e-application-section__heading">
          <span class="eyebrow">Bizi Tanıyın</span>
          <h2 id="values-title">Birlikte çalışırken önem verdiklerimiz</h2>
        </div>

        <div class="row g-4">
          <div class="col-12 col-md-4">
            <article class="e-info-card">
              <div class="e-info-card__icon"><i class="fa-regular fa-thumbs-up" aria-hidden="true"></i></div>
              <h3>Değerlerimiz</h3>
              <p>Güven, sorumluluk, dikkat ve yardımlaşma; müşterilerimizle ve çalışma arkadaşlarımızla kurduğumuz ilişkilere yön verir.</p>
              <a href="{{ route('hakkimizda.index') }}">Daha fazla bilgi <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            </article>
          </div>
          <div class="col-12 col-md-4">
            <article class="e-info-card">
              <div class="e-info-card__icon"><i class="fa-solid fa-timeline" aria-hidden="true"></i></div>
              <h3>Yolculuğumuz</h3>
              <p>Güvenlik alanındaki uzmanlık birikimimizi yeni nesil teknolojiler ve insan odaklı hizmet anlayışıyla geleceğe taşıyoruz.</p>
              <a href="{{ route('hakkimizda.index') }}">Daha fazla bilgi <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            </article>
          </div>
          <div class="col-12 col-md-4">
            <article class="e-info-card">
              <div class="e-info-card__icon"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i></div>
              <h3>Stratejimiz</h3>
              <p>Güçlü iş birlikleri kuruyor, değişen ihtiyaçları izliyor ve teknoloji destekli güvenlik çözümlerini sürekli geliştiriyoruz.</p>
              <a href="{{ route('hakkimizda.index') }}">Daha fazla bilgi <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            </article>
          </div>
        </div>
      </div>
    </section>

    <section id="ise-alim-sureci" class="e-application-section e-recruitment" aria-labelledby="recruitment-title">
      <div class="container">
        <div class="row g-4 g-lg-5">
          <div class="col-12 col-lg-5">
            <div class="e-recruitment__intro">
              <span class="eyebrow">Süreç</span>
              <h2 id="recruitment-title">İşe alım sürecinin adımları</h2>
              <p>Başvurudan göreve başlamaya kadar her aşamada sizi bilgilendiren açık bir süreç izliyoruz.</p>
            </div>
          </div>
          <div class="col-12 col-lg-7">
            <ol class="e-recruitment-steps">
              <li>
                <span class="e-recruitment-steps__number">01</span>
                <div><h3>Başvuru</h3><p>Uygun pozisyonu seçerek çevrim içi başvurunuzu tamamlayın.</p></div>
              </li>
              <li>
                <span class="e-recruitment-steps__number">02</span>
                <div><h3>Aşamalı mülakat</h3><p>İlk değerlendirme olumluysa telefon veya yüz yüze görüşmeye davet edilirsiniz.</p></div>
              </li>
              <li>
                <span class="e-recruitment-steps__number">03</span>
                <div><h3>Aday değerlendirme</h3><p>Pozisyonun gerekliliklerine göre yetkinlik ve kişilik değerlendirmeleri uygulanabilir.</p></div>
              </li>
              <li>
                <span class="e-recruitment-steps__number">04</span>
                <div><h3>Teklif</h3><p>Değerlendirmeyi başarıyla tamamladığınızda çalışma koşulları ve teklif sizinle paylaşılır.</p></div>
              </li>
              <li>
                <span class="e-recruitment-steps__number">05</span>
                <div><h3>İşe başlama</h3><p>Gerekli işlemlerin ardından oryantasyon süreciniz başlar ve Tepenet ekibine katılırsınız.</p></div>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section id="sikca-sorulan-sorular" class="e-application-section e-application-faq" aria-labelledby="faq-title">
      <div class="container">
        <div class="e-application-section__heading">
          <span class="eyebrow">Yardım</span>
          <h2 id="faq-title">Sıkça sorulan sorular</h2>
          <p>İş başvurusu ve değerlendirme süreci hakkında en çok merak edilen konuları inceleyin.</p>
        </div>

        <div class="accordion e-application-accordion" id="applicationFaq">
          <div class="accordion-item">
            <h3 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="true" aria-controls="faqOne">Tepenet'e nasıl iş başvurusu yapabilirim?</button>
            </h3>
            <div id="faqOne" class="accordion-collapse collapse show" data-bs-parent="#applicationFaq"><div class="accordion-body">Açık pozisyonlar arasından size uygun alanı seçip çevrim içi formu tamamlayabilirsiniz. Başvurunuz olumlu değerlendirildiğinde sizinle iletişime geçilir.</div></div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">Hangi pozisyonlar için işe alım yapılıyor?</button></h3>
            <div id="faqTwo" class="accordion-collapse collapse" data-bs-parent="#applicationFaq"><div class="accordion-body">Güvenlik görevlisi, saha yöneticisi ve farklı idari uzmanlık alanlarında ihtiyaç oluşabilir. İlanlar şehir, proje ve çalışma modeline göre değişir.</div></div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">Güvenlik görevlisi olmak için hangi belgeler gerekir?</button></h3>
            <div id="faqThree" class="accordion-collapse collapse" data-bs-parent="#applicationFaq"><div class="accordion-body">Pozisyona uygun silahlı veya silahsız özel güvenlik kimlik kartı temel şarttır. İlanın kapsamına göre adli sicil kaydı, sağlık raporu ve ek belgeler istenebilir.</div></div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFour" aria-expanded="false" aria-controls="faqFour">Deneyimi olmayan adaylar başvurabilir mi?</button></h3>
            <div id="faqFour" class="accordion-collapse collapse" data-bs-parent="#applicationFaq"><div class="accordion-body">İlan koşullarını karşılayan deneyimsiz adaylar da uygun pozisyonlara başvurabilir. Oryantasyon ve gelişim programları yeni ekip arkadaşlarının uyumunu destekler.</div></div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFive" aria-expanded="false" aria-controls="faqFive">İşe alım süreci nasıl ilerler?</button></h3>
            <div id="faqFive" class="accordion-collapse collapse" data-bs-parent="#applicationFaq"><div class="accordion-body">Başvurular ön değerlendirmeden geçirilir. Uygun adaylar görüşme ve gerekli kontrollerin ardından teklif ve işe giriş aşamalarına ilerler.</div></div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqSix" aria-expanded="false" aria-controls="faqSix">Eğitim alacak mıyım?</button></h3>
            <div id="faqSix" class="accordion-collapse collapse" data-bs-parent="#applicationFaq"><div class="accordion-body">Görevin kapsamına göre işe başlamadan önce ve çalışma süresince mesleki bilgi ile becerilerinizi geliştiren eğitimlere katılabilirsiniz.</div></div>
          </div>
        </div>
      </div>
    </section>

    <section class="e-application-section e-application-details" aria-labelledby="know-us-title">
      <div class="container">
        <div class="e-application-section__heading">
          <span class="eyebrow">Kurum Kültürü</span>
          <h2 id="know-us-title">Bizi daha yakından tanıyın</h2>
          <p>Tepenet'teki çalışma yaşamı, insan kaynakları yaklaşımı ve gelişim olanakları hakkında bilgi alın.</p>
        </div>
        <div class="row g-4 g-lg-5 align-items-start">
          <div class="col-12 col-lg-4">
            <div class="e-application-media e-application-media--portrait" data-image-slot="Tepenet çalışanları görseli"><img src="{{ asset('resimler/basvuru/araba.png') }}" alt=""></div>
          </div>
          <div class="col-12 col-lg-8">
            <div class="accordion e-application-accordion e-application-accordion--plain" id="companyAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#companyOne" aria-expanded="true" aria-controls="companyOne">Çalışan destek yaklaşımımız</button></h3>
                <div id="companyOne" class="accordion-collapse collapse show" data-bs-parent="#companyAccordion"><div class="accordion-body">Dayanışmayı güçlendiren, çalışanların farklı yaşam dönemlerindeki ihtiyaçlarını gözeten ve kapsayıcı bir çalışma ortamını destekleyen uygulamalar geliştiriyoruz.</div></div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#companyTwo" aria-expanded="false" aria-controls="companyTwo">İnsan kaynakları politikamız</button></h3>
                <div id="companyTwo" class="accordion-collapse collapse" data-bs-parent="#companyAccordion"><div class="accordion-body">Doğru yeteneği doğru rolle buluşturmayı, çalışan potansiyelini verimli biçimde değerlendirmeyi ve sürdürülebilir gelişimi amaçlıyoruz.</div></div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#companyThree" aria-expanded="false" aria-controls="companyThree">Eğitim ve gelişim</button></h3>
                <div id="companyThree" class="accordion-collapse collapse" data-bs-parent="#companyAccordion"><div class="accordion-body">Mesleki uzmanlığı ileri taşıyan eğitimleri kişisel gelişim olanaklarıyla bir araya getirerek yetkin ve güçlü ekipler oluşturuyoruz.</div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="e-application-section e-application-blog" aria-labelledby="career-content-title">
      <div class="container">
        <div class="e-application-section__heading">
          <span class="eyebrow">Kariyer Rehberi</span>
          <h2 id="career-content-title">Güvenlik sektörünü keşfedin</h2>
          <p>Mesleğe, sorumluluklara ve kişisel gelişime ilişkin öne çıkan başlıkları inceleyin.</p>
        </div>
        <div class="row g-4 g-lg-5 align-items-start">
          <div class="col-12 col-lg-4">
            <div class="e-application-media e-application-media--portrait" data-image-slot="Kariyer rehberi görseli"><img src="{{ asset('resimler/basvuru/personel2.png') }}" alt=""></div>
          </div>
          <div class="col-12 col-lg-8">
            <div class="accordion e-application-accordion e-application-accordion--plain" id="careerAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#careerOne" aria-expanded="true" aria-controls="careerOne">Özel güvenlik görevlisinin temel özellikleri</button></h3>
                <div id="careerOne" class="accordion-collapse collapse show" data-bs-parent="#careerAccordion"><div class="accordion-body">Dikkat, sorumluluk, doğru iletişim ve soğukkanlılık; güvenlik hizmetinde görev alan profesyoneller için öne çıkan niteliklerdir.</div></div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#careerTwo" aria-expanded="false" aria-controls="careerTwo">Yetki ve sorumluluklar nelerdir?</button></h3>
                <div id="careerTwo" class="accordion-collapse collapse" data-bs-parent="#careerAccordion"><div class="accordion-body">Özel güvenlik görevlilerinin yetki ve sorumlulukları yürürlükteki mevzuat, görev alanı ve hizmet verilen projenin prosedürleri çerçevesinde belirlenir.</div></div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#careerThree" aria-expanded="false" aria-controls="careerThree">Kariyerinizde nasıl gelişebilirsiniz?</button></h3>
                <div id="careerThree" class="accordion-collapse collapse" data-bs-parent="#careerAccordion"><div class="accordion-body">Düzenli eğitim, saha deneyimi, güncel mevzuat bilgisi ve güçlü iletişim becerileri kariyerinizde yeni sorumluluklara hazırlanmanıza yardımcı olur.</div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  @include('partials.footer')

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
</body>

</html>
