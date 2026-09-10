<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light">
    <title>Yeni Kendi Sistemini Oluştur Talebi</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #eef2f7;
            color: #172033;
            font-family: Arial, Helvetica, sans-serif;
        }

        .email-page {
            width: 100%;
            padding: 32px 16px;
            background: #eef2f7;
        }

        .email-card {
            width: 100%;
            max-width: 680px;
            overflow: hidden;
            border: 1px solid #dfe6f0;
            border-radius: 18px;
            background: #ffffff;
            box-shadow: 0 14px 40px rgba(28, 47, 82, 0.08);
        }

        .brand-line {
            height: 6px;
            background: #e31e2f;
            background: linear-gradient(90deg, #0754b8 0%, #503094 52%, #e31e2f 100%);
        }

        .brand-header {
            padding: 22px 36px;
            background: #ffffff;
        }

        .brand-logo {
            display: block;
            width: 230px;
            max-width: 100%;
            height: auto;
            border: 0;
        }

        .hero {
            padding: 34px 36px;
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
            padding: 32px 36px 38px;
        }

        .section {
            margin-bottom: 30px;
        }

        .section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            margin: 0 0 15px;
            color: #172033;
            font-size: 18px;
            line-height: 1.4;
        }

        .summary {
            width: 100%;
            border-collapse: separate;
            border-spacing: 8px;
            margin: -8px;
        }

        .summary td {
            width: 50%;
            padding: 15px;
            border: 1px solid #dce7f5;
            border-radius: 11px;
            background: #f3f7fc;
            vertical-align: top;
        }

        .summary-label {
            display: block;
            margin-bottom: 5px;
            color: #718096;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.7px;
            text-transform: uppercase;
        }

        .summary-value {
            color: #123565;
            font-size: 16px;
            font-weight: 700;
        }

        .details {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            border: 1px solid #e5eaf2;
            border-radius: 12px;
        }

        .details td {
            padding: 13px 16px;
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

        .components {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #e5eaf2;
            border-radius: 12px;
        }

        .components th,
        .components td {
            padding: 12px 15px;
            border-bottom: 1px solid #e5eaf2;
            font-size: 14px;
            line-height: 1.4;
            text-align: left;
        }

        .components th {
            background: #102653;
            color: #ffffff;
            font-size: 12px;
            letter-spacing: 0.4px;
            text-transform: uppercase;
        }

        .components th:last-child,
        .components td:last-child {
            width: 90px;
            text-align: center;
        }

        .components tr:last-child td {
            border-bottom: 0;
        }

        .customer-note,
        .reply-note {
            padding: 15px 17px;
            border-radius: 10px;
            font-size: 13px;
            line-height: 1.65;
        }

        .customer-note {
            border-left: 4px solid #503094;
            background: #f5f1fb;
            color: #41335c;
        }

        .reply-note {
            margin-top: 20px;
            border-left: 4px solid #0754b8;
            background: #eef5ff;
            color: #355071;
        }

        .fine-print {
            margin: 12px 0 0;
            color: #7a879b;
            font-size: 12px;
            line-height: 1.6;
        }

        .footer {
            padding: 22px 36px;
            background: #f8fafc;
            color: #8490a4;
            font-size: 12px;
            line-height: 1.6;
            text-align: center;
        }

        @media only screen and (max-width: 540px) {
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

            .summary td,
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
<body data-template="tepenet-system-builder">
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
                            src="cid:{{ \App\Mail\SystemBuilderRequestMail::LOGO_CONTENT_ID }}"
                            width="230"
                            alt="Tepenet Güvenlik"
                        >
                    </td>
                </tr>
                <tr>
                    <td class="hero">
                        <span class="eyebrow">Sistem Oluşturucu</span>
                        <h1 class="hero-title">Yeni güvenlik sistemi talebi alındı</h1>
                        <p class="hero-copy">
                            Müşterinin adım adım belirlediği sistem tercihleri, önerilen başlangıç paketi
                            ve iletişim bilgileri aşağıda yer alıyor.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td class="content">
                        <div class="section">
                            <h2 class="section-title">Sistem özeti</h2>
                            <table class="summary" role="presentation" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <span class="summary-label">Kullanım Alanı</span>
                                        <span class="summary-value">{{ $location }}</span>
                                    </td>
                                    <td>
                                        <span class="summary-label">Sistem Tercihi</span>
                                        <span class="summary-value">{{ $systemType }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="summary-label">Ek Risk Noktası</span>
                                        <span class="summary-value">{{ $hasRisk ? 'Var' : 'Yok' }}</span>
                                    </td>
                                    <td>
                                        <span class="summary-label">Riskli Kapı / Pencere</span>
                                        <span class="summary-value">{{ $hasRisk ? $riskCount.' adet' : 'Bulunmuyor' }}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="section">
                            <h2 class="section-title">Önerilen başlangıç paketi</h2>
                            <table class="components" cellpadding="0" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Bileşen</th>
                                        <th>Adet</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recommendedComponents as $component)
                                        <tr>
                                            <td>{{ $component['name'] }}</td>
                                            <td>{{ $component['quantity'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p class="fine-print">
                                Bu liste form seçimlerine göre oluşturulan başlangıç önerisidir.
                                Kesin ürün adedi ve yerleşim planı keşif sonrasında netleştirilmelidir.
                            </p>
                        </div>

                        <div class="section">
                            <h2 class="section-title">İletişim bilgileri</h2>
                            <table class="details" role="presentation" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="details-label">Ad Soyad</td>
                                    <td class="details-value">{{ $firstName }} {{ $lastName }}</td>
                                </tr>
                                <tr>
                                    <td class="details-label">Telefon</td>
                                    <td class="details-value">{{ $phone }}</td>
                                </tr>
                                <tr>
                                    <td class="details-label">E-posta</td>
                                    <td class="details-value">{{ $email ?? 'Belirtilmedi' }}</td>
                                </tr>
                                <tr>
                                    <td class="details-label">İl</td>
                                    <td class="details-value">{{ $cityLabel }}</td>
                                </tr>
                                <tr>
                                    <td class="details-label">Kampanya İletişim İzni</td>
                                    <td class="details-value">{{ $campaignConsent ? 'Evet' : 'Hayır' }}</td>
                                </tr>
                                <tr>
                                    <td class="details-label">KVKK Aydınlatma Metni</td>
                                    <td class="details-value">Onaylandı</td>
                                </tr>
                            </table>
                        </div>

                        @if ($customerNote)
                            <div class="section">
                                <h2 class="section-title">Müşteri notu</h2>
                                <div class="customer-note">{!! nl2br(e($customerNote)) !!}</div>
                            </div>
                        @endif

                        @if ($email)
                            <div class="reply-note">
                                Bu e-postayı yanıtladığınızda yanıtınız doğrudan
                                <strong>{{ $email }}</strong> adresine gönderilir.
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="footer">
                        Bu e-posta Tepenet Güvenlik web sitesindeki Kendi Sistemini Oluştur formu tarafından otomatik oluşturuldu.
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
