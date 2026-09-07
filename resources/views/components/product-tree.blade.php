@props(['activeSlug' => null])

<nav class="product-tree" aria-label="Ürün kategorileri menüsü">
  <h2 class="product-tree__title">Tepenet Ürünler</h2>
  <ul>
    <li id="alarm-sistemleri">
      <a class="product-tree__branch" href="{{ route('urunler-ve-hizmetler.alarm-sistemleri') }}">Alarm Sistemleri</a>
      <ul class="product-tree__children" id="alarm-alt-kategoriler">
        <li>
          <a
            href="{{ route('urunler-ve-hizmetler.kategori', ['sistem' => 'alarm-sistemleri', 'urunKategori' => 'kablolu-alarm-sistemi']) }}"
            @if ($activeSlug === 'kablolu-alarm-sistemi') aria-current="page" @endif
          >Kablolu Alarm Sistemi</a>
        </li>
        <li>
          <a
            href="{{ route('urunler-ve-hizmetler.kategori', ['sistem' => 'alarm-sistemleri', 'urunKategori' => 'kablosuz-alarm-sistemi']) }}"
            @if ($activeSlug === 'kablosuz-alarm-sistemi') aria-current="page" @endif
          >Kablosuz Alarm Sistemi</a>
        </li>
      </ul>
    </li>
    <li id="kamera-sistemleri">
      <a class="product-tree__branch" href="{{ route('urunler-ve-hizmetler.kamera-sistemleri') }}">Kamera Sistemleri</a>
      <ul class="product-tree__children" id="kamera-alt-kategoriler">
        <li>
          <a
            href="{{ route('urunler-ve-hizmetler.kategori', ['sistem' => 'kamera-sistemleri', 'urunKategori' => 'hd-kamera-sistemleri']) }}"
            @if ($activeSlug === 'hd-kamera-sistemleri') aria-current="page" @endif
          >HD Güvenlik Kamerası Sistemleri</a>
        </li>
        <li>
          <a
            href="{{ route('urunler-ve-hizmetler.kategori', ['sistem' => 'kamera-sistemleri', 'urunKategori' => 'ip-kamera-sistemleri']) }}"
            @if ($activeSlug === 'ip-kamera-sistemleri') aria-current="page" @endif
          >IP Kamera Sistemleri</a>
        </li>
      </ul>
    </li>
  </ul>
</nav>
