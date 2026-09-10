TEPENET GÜVENLİK
=================

YENİ ÜCRETSİZ KEŞİF TALEBİ

Web sitesi üzerinden yeni bir müşteri adayı bilgilerini iletti.

TALEP BİLGİLERİ
----------------
Ad Soyad: {{ $firstName }} {{ $lastName }}
Telefon: {{ $phone }}
E-posta: {{ $email ?? 'Belirtilmedi' }}
@if ($companyName !== null)
Firma Adı: {{ $companyName }}
Kurum Türü: {{ $organizationTypeLabel }}
@else
Ürün Grubu: {{ $productGroupLabel }}
@endif
İl: {{ $cityLabel }}
@if ($companyName === null)
Talep Türü: {{ $isWorkplace ? 'İş yeri' : 'Ev' }}
@endif
@if ($isWorkplace)
Şube Sayısı: {{ $branchCount }}
@endif
Kampanya İletişim İzni: {{ $campaignConsent ? 'Evet' : 'Hayır' }}
KVKK Aydınlatma Metni: Onaylandı

Bu e-posta Tepenet Güvenlik web sitesindeki ücretsiz keşif formu tarafından otomatik oluşturuldu.
