TEPENET GÜVENLİK
=================

YENİ ÜCRETSİZ KEŞİF TALEBİ

Web sitesi üzerinden yeni bir müşteri adayı bilgilerini iletti.

TALEP BİLGİLERİ
----------------
Ad Soyad: {{ $firstName }} {{ $lastName }}
Telefon: {{ $phone }}
E-posta: {{ $email ?? 'Belirtilmedi' }}
Ürün Grubu: {{ $productGroupLabel }}
İl: {{ $cityLabel }}
Talep Türü: {{ $isWorkplace ? 'İş yeri' : 'Ev' }}
@if ($isWorkplace)
Şube Sayısı: {{ $branchCount }}
@endif
Kampanya İletişim İzni: {{ $campaignConsent ? 'Evet' : 'Hayır' }}
KVKK Aydınlatma Metni: Onaylandı

Bu e-posta Tepenet Güvenlik web sitesindeki ücretsiz keşif formu tarafından otomatik oluşturuldu.
