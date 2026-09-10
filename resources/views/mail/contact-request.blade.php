<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light">
    <title>Yeni İletişim Formu Mesajı</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f1f4f9;
            color: #172033;
            font-family: Arial, Helvetica, sans-serif;
        }

        .email-page {
            width: 100%;
            padding: 32px 16px;
            background: #f1f4f9;
        }

        .email-card {
            width: 100%;
            max-width: 680px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            background: #ffffff;
            box-shadow: 0 14px 40px rgba(28, 47, 82, 0.08);
        }

        .brand-line {
            height: 6px;
            background: linear-gradient(90deg, #0754b8 0%, #503094 52%, #e31e2f 100%);
        }

        .brand-header {
            padding: 22px 34px;
        }

        .brand-logo {
            display: block;
            width: 230px;
            max-width: 100%;
            height: auto;
            border: 0;
        }

        .hero {
            padding: 34px;
            background: #102653;
        }

        .eyebrow {
            display: inline-block;
            margin-bottom: 14px;
            padding: 7px 11px;
            border-radius: 999px;
            background: #e31e2f;
            color: #ffffff;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .hero-title {
            margin: 0 0 10px;
            color: #ffffff;
            font-size: 28px;
            line-height: 1.25;
        }

        .hero-copy {
            margin: 0;
            color: #cbd6ec;
            font-size: 15px;
            line-height: 1.65;
        }

        .content {
            padding: 32px 34px 36px;
        }

        .section-title {
            margin: 0 0 16px;
            color: #172033;
            font-size: 18px;
            line-height: 1.4;
        }

        .details {
            width: 100%;
            overflow: hidden;
            border: 1px solid #e5eaf2;
            border-spacing: 0;
            border-radius: 12px;
        }

        .details td {
            padding: 14px 16px;
            border-bottom: 1px solid #e5eaf2;
            vertical-align: top;
            font-size: 14px;
            line-height: 1.5;
        }

        .details tr:last-child td {
            border-bottom: 0;
        }

        .details-label {
            width: 38%;
            background: #f8fafc;
            color: #67748b;
            font-weight: 700;
        }

        .details-value {
            color: #172033;
            font-weight: 600;
        }

        .message-box {
            margin-top: 22px;
            padding: 18px;
            border-left: 4px solid #e31e2f;
            border-radius: 0 10px 10px 0;
            background: #fff6f7;
        }

        .message-box h2 {
            margin: 0 0 10px;
            color: #172033;
            font-size: 16px;
        }

        .message-copy {
            margin: 0;
            color: #475569;
            font-size: 14px;
            line-height: 1.7;
            white-space: pre-wrap;
        }

        .reply-note {
            margin-top: 22px;
            padding: 15px 17px;
            border-left: 4px solid #0754b8;
            border-radius: 0 10px 10px 0;
            background: #eef5ff;
            color: #355071;
            font-size: 13px;
            line-height: 1.6;
        }

        .footer {
            padding: 22px 34px;
            background: #f8fafc;
            color: #8490a4;
            font-size: 12px;
            line-height: 1.6;
            text-align: center;
        }

        @media only screen and (max-width: 520px) {
            .email-page {
                padding: 12px 8px;
            }

            .brand-header,
            .hero,
            .content,
            .footer {
                padding-right: 20px;
                padding-left: 20px;
            }

            .hero-title {
                font-size: 23px;
            }

            .details-label,
            .details-value {
                display: block;
                width: auto;
            }

            .details-label {
                padding-bottom: 4px !important;
                border-bottom: 0 !important;
            }

            .details-value {
                padding-top: 4px !important;
            }
        }
    </style>
</head>
<body data-template="tepenet-contact">
<table class="email-page" role="presentation" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <table class="email-card" role="presentation" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="brand-line"></td>
                </tr>
                <tr>
                    <td class="brand-header">
                        <img
                            class="brand-logo"
                            src="cid:{{ \App\Mail\ContactRequestMail::LOGO_CONTENT_ID }}"
                            width="230"
                            alt="Tepenet Güvenlik"
                        >
                    </td>
                </tr>
                <tr>
                    <td class="hero">
                        <span class="eyebrow">Yeni Mesaj</span>
                        <h1 class="hero-title">İletişim formu mesajı alındı</h1>
                        <p class="hero-copy">
                            Web sitesi iletişim formundan yeni bir müşteri mesajı gönderildi.
                            İletişim ve talep ayrıntılarını aşağıda bulabilirsiniz.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td class="content">
                        <h2 class="section-title">İletişim bilgileri</h2>

                        <table class="details" role="presentation" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="details-label">Ad Soyad</td>
                                <td class="details-value">{{ $firstName }} {{ $lastName }}</td>
                            </tr>
                            <tr>
                                <td class="details-label">E-posta</td>
                                <td class="details-value">{{ $email }}</td>
                            </tr>
                            <tr>
                                <td class="details-label">Telefon</td>
                                <td class="details-value">+90 {{ $phone }}</td>
                            </tr>
                            <tr>
                                <td class="details-label">İl</td>
                                <td class="details-value">{{ $cityLabel }}</td>
                            </tr>
                            <tr>
                                <td class="details-label">İlçe</td>
                                <td class="details-value">{{ $district ?? 'Belirtilmedi' }}</td>
                            </tr>
                            <tr>
                                <td class="details-label">Konu</td>
                                <td class="details-value">{{ $topicLabel }}</td>
                            </tr>
                            <tr>
                                <td class="details-label">Kampanya İletişim İzni</td>
                                <td class="details-value">{{ $campaignConsent ? 'Evet' : 'Hayır' }}</td>
                            </tr>
                            @if ($campaignConsent)
                                <tr>
                                    <td class="details-label">Telefon İzni</td>
                                    <td class="details-value">{{ $allowPhone ? 'Evet' : 'Hayır' }}</td>
                                </tr>
                                <tr>
                                    <td class="details-label">E-posta İzni</td>
                                    <td class="details-value">{{ $allowEmail ? 'Evet' : 'Hayır' }}</td>
                                </tr>
                                <tr>
                                    <td class="details-label">SMS İzni</td>
                                    <td class="details-value">{{ $allowSms ? 'Evet' : 'Hayır' }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td class="details-label">KVKK Aydınlatma Metni</td>
                                <td class="details-value">Onaylandı</td>
                            </tr>
                        </table>

                        <div class="message-box">
                            <h2>Müşteri mesajı</h2>
                            <p class="message-copy">{{ $customerMessage ?? 'Belirtilmedi' }}</p>
                        </div>

                        <div class="reply-note">
                            Bu e-postayı yanıtladığınızda yanıtınız doğrudan
                            <strong>{{ $email }}</strong> adresine gönderilir.
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="footer">
                        Bu e-posta Tepenet Güvenlik web sitesindeki iletişim formu tarafından otomatik oluşturuldu.
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
