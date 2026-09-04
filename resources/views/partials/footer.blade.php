<footer class="site-footer" id="site-footer">
  <div class="container">
    <div class="row g-5">
      <div class="col-12 col-lg-6">
        <a class="site-footer__brand" href="{{ route('home') }}">
          <img src="{{ asset('logo.png') }}" alt="Tepenet Güvenlik" />
        </a>

        <div class="site-footer__locations">
          <p class="site-footer__location">
            <strong
              ><i class="fa-solid fa-location-dot"></i> BURSA BÖLGE
              MÜDÜRLÜĞÜ</strong
            >
            <br />
            Yeniceköy Mah. Demokrasi Cad. Orhun Alp. No:20 İnegöl / Bursa
            <br />
            <i class="fa-solid fa-phone"></i> 0224 322 03 70 <br />
            <a href="mailto:inegol@tepenetguvenlik.com"
              ><i class="fa-regular fa-envelope"></i>
              inegol@tepenetguvenlik.com</a
            >
          </p>
          <p class="site-footer__location">
            <strong
              ><i class="fa-solid fa-location-dot"></i> İSTANBUL LEVENT
              ŞUBESİ</strong
            >
            <br />
            Esentepe Mah. Talatpaşa Cad. No:5 Şişli / İstanbul
            <br />
            <i class="fa-solid fa-phone"></i> 0850 532 96 70 <br />
            <a href="mailto:levent@tepenetguvenlik.com"
              ><i class="fa-regular fa-envelope"></i>
              levent@tepenetguvenlik.com</a
            >
          </p>

          <p class="site-footer__location">
            <strong
              ><i class="fa-solid fa-location-dot"></i> İSTANBUL NİDAKULE
              ŞUBESİ</strong
            >
            <br />
            Barbaros Mah. Begonya Sok. No:1 Ataşehir / İstanbul
            <br />
            <i class="fa-solid fa-phone"></i> 0850 532 96 70<br />
            <a href="mailto:nidakule@tepenetguvenlik.com"
              ><i class="fa-regular fa-envelope"></i>
              nidakule@tepenetguvenlik.com</a
            >
          </p>

          <p class="site-footer__location">
            <strong
              ><i class="fa-solid fa-location-dot"></i> ANKARA ÇANKAYA
              ŞUBESİ</strong
            >
            <br />
            Beştepe Mah. 31. Sok. Yenimahalle / Ankara
            <br />
            <i class="fa-solid fa-phone"></i> 0850 532 96 70<br />
            <a href="mailto:bestepe@tepenetguvenlik.com"
              ><i class="fa-regular fa-envelope"></i>
              bestepe@tepenetguvenlik.com</a
            >
          </p>
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <h4>Hızlı Erişim</h4>
        <ul>
          <li><a href="{{ route('ev-guvenligi.index') }}">Ev için</a></li>
          <li><a href="{{ route('is-yeri-guvenligi.index') }}">İş yeri için</a></li>
          <li><a href="{{ route('kurumsal-cozumler.index') }}">Kurumsal çözümler</a></li>
          <li><a href="{{ route('online-islemler') }}">Online İşlemler</a></li>
        </ul>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <h4>Kurumsal</h4>
        <ul>
          <li><a href="{{ route('hakkimizda.index') }}">Hakkımızda</a></li>
          <li><a href="{{ route('hakkimizda.yonetim-kurulu') }}">Yönetim Kurulu</a></li>
           <li><a href="{{ route('e-basvuru') }}">E-Başvuru Portalı</a></li>
          <li><a href="{{ route('is-ilanlari') }}">İş İlanları</a></li>
        </ul>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <h4>Ürünler</h4>
        <ul>
          <li><a href="{{ route('urunler-ve-hizmetler.index') }}#kamera-sistemleri">Kamera Sistemleri</a></li>
          <li><a href="{{ route('urunler-ve-hizmetler.index') }}#alarm-sistemleri">Alarm Sistemleri</a></li>
          <li><a href="{{ route('urunler-ve-hizmetler.index') }}">Hizmetlerimiz</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
