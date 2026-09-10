TEPENET GÜVENLİK
=================

YENİ KENDİ SİSTEMİNİ OLUŞTUR TALEBİ

Müşterinin sistem tercihleri, önerilen başlangıç paketi ve iletişim bilgileri aşağıdadır.

SİSTEM ÖZETİ
-------------
Kullanım Alanı: {{ $location }}
Sistem Tercihi: {{ $systemType }}
Ek Risk Noktası: {{ $hasRisk ? 'Var' : 'Yok' }}
Riskli Kapı / Pencere Sayısı: {{ $hasRisk ? $riskCount : 'Bulunmuyor' }}

ÖNERİLEN BAŞLANGIÇ PAKETİ
-------------------------
@foreach ($recommendedComponents as $component)
{{ $component['name'] }}: {{ $component['quantity'] }} adet
@endforeach

Kesin ürün adedi ve yerleşim planı keşif sonrasında netleştirilmelidir.

İLETİŞİM BİLGİLERİ
------------------
Ad Soyad: {{ $firstName }} {{ $lastName }}
Telefon: {{ $phone }}
E-posta: {{ $email ?? 'Belirtilmedi' }}
İl: {{ $cityLabel }}
Kampanya İletişim İzni: {{ $campaignConsent ? 'Evet' : 'Hayır' }}
KVKK Aydınlatma Metni: Onaylandı

@if ($customerNote)
MÜŞTERİ NOTU
------------
{{ $customerNote }}

@endif
Bu e-posta Tepenet Güvenlik web sitesindeki Kendi Sistemini Oluştur formu tarafından otomatik oluşturuldu.
