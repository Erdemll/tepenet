TEPENET GÜVENLİK
=================

YENİ İLETİŞİM FORMU MESAJI

Web sitesi iletişim formundan yeni bir müşteri mesajı gönderildi.

İLETİŞİM BİLGİLERİ
-------------------
Ad Soyad: {{ $firstName }} {{ $lastName }}
E-posta: {{ $email }}
Telefon: +90 {{ $phone }}
İl: {{ $cityLabel }}
İlçe: {{ $district ?? 'Belirtilmedi' }}
Konu: {{ $topicLabel }}
Kampanya İletişim İzni: {{ $campaignConsent ? 'Evet' : 'Hayır' }}
@if ($campaignConsent)
Telefon İzni: {{ $allowPhone ? 'Evet' : 'Hayır' }}
E-posta İzni: {{ $allowEmail ? 'Evet' : 'Hayır' }}
SMS İzni: {{ $allowSms ? 'Evet' : 'Hayır' }}
@endif
KVKK Aydınlatma Metni: Onaylandı

MÜŞTERİ MESAJI
---------------
{{ $customerMessage ?? 'Belirtilmedi' }}

Bu e-postayı yanıtladığınızda yanıtınız doğrudan {{ $email }} adresine gönderilir.

Bu e-posta Tepenet Güvenlik web sitesindeki iletişim formu tarafından otomatik oluşturuldu.
