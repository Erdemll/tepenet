<?php

use App\Mail\DiscoveryRequestMail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Exceptions;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportException;

function validDiscoveryRequestPayload(array $overrides = []): array
{
    return array_replace([
        'ad' => 'Ayşe',
        'soyad' => 'Yılmaz',
        'telefon' => '0532 123 45 67',
        'email' => 'ayse@example.com',
        'urun_grubu' => 'kamera',
        'il' => 'bursa',
        'isyeri_talebi' => '1',
        'sube_sayisi' => '3',
        'kampanya_izni' => '1',
        'kvkk_onayi' => '1',
    ], $overrides);
}

function validCorporateDiscoveryRequestPayload(array $overrides = []): array
{
    $payload = validDiscoveryRequestPayload();
    unset($payload['urun_grubu'], $payload['isyeri_talebi']);

    return array_replace($payload, [
        'source_page' => 'kurumsal-cozumler',
        'il' => 'izmir',
        'firma_adi' => 'Tepenet Test AŞ',
        'kurum_turu' => 'fabrika',
        'sube_sayisi' => '12',
    ], $overrides);
}

it('renders the discovery form with its post endpoint and csrf protection', function () {
    $response = $this->get(route('home'));

    $response
        ->assertOk()
        ->assertSee('action="'.route('discovery.store').'"', false)
        ->assertSee('name="_token"', false)
        ->assertSee('name="kvkk_onayi"', false);
});

it('renders every discovery field in the security page hero form', function (
    string $routeName,
    string $sourcePage,
    bool $expectsWorkplaceSelected,
) {
    $response = $this->get(route($routeName));

    $document = new DOMDocument;
    libxml_use_internal_errors(true);
    $document->loadHTML($response->getContent());
    libxml_clear_errors();

    $xpath = new DOMXPath($document);
    $form = $xpath->query('//form[@data-hero-discovery-form]')->item(0);

    expect($form)->toBeInstanceOf(DOMElement::class);
    expect($form->getAttribute('action'))->toBe(route('discovery.store'));
    expect(strtolower($form->getAttribute('method')))->toBe('post');

    $fieldNames = [];

    foreach ($xpath->query('.//input[@name] | .//select[@name]', $form) as $field) {
        $fieldNames[] = $field->getAttribute('name');
    }

    expect($fieldNames)
        ->toContain('_token')
        ->toContain('source_page')
        ->toContain('ad')
        ->toContain('soyad')
        ->toContain('telefon')
        ->toContain('email')
        ->toContain('urun_grubu')
        ->toContain('il')
        ->toContain('isyeri_talebi')
        ->toContain('sube_sayisi')
        ->toContain('kampanya_izni')
        ->toContain('kvkk_onayi');

    $sourceInput = $xpath->query('.//input[@name="source_page"]', $form)->item(0);
    $workplaceInput = $xpath->query('.//input[@name="isyeri_talebi"]', $form)->item(0);

    expect($sourceInput?->getAttribute('value'))->toBe($sourcePage);
    expect($workplaceInput?->hasAttribute('checked'))->toBe($expectsWorkplaceSelected);
})->with([
    'home security' => ['ev-guvenligi.index', 'ev-guvenligi', false],
    'workplace security' => ['is-yeri-guvenligi.index', 'is-yeri-guvenligi', true],
]);

it('renders every discovery field in the security components page form', function (
    string $routeName,
    string $sourcePage,
    bool $expectsWorkplaceSelected,
) {
    $response = $this->get(route($routeName));

    $document = new DOMDocument;
    libxml_use_internal_errors(true);
    $document->loadHTML($response->getContent());
    libxml_clear_errors();

    $xpath = new DOMXPath($document);
    $form = $xpath->query('//form[@data-discovery-section-form]')->item(0);

    expect($form)->toBeInstanceOf(DOMElement::class);
    expect($form->getAttribute('action'))->toBe(route('discovery.store'));

    $fieldNames = [];

    foreach ($xpath->query('.//input[@name] | .//select[@name]', $form) as $field) {
        $fieldNames[] = $field->getAttribute('name');
    }

    expect($fieldNames)
        ->toContain('_token')
        ->toContain('source_page')
        ->toContain('ad')
        ->toContain('soyad')
        ->toContain('telefon')
        ->toContain('email')
        ->toContain('urun_grubu')
        ->toContain('il')
        ->toContain('isyeri_talebi')
        ->toContain('sube_sayisi')
        ->toContain('kampanya_izni')
        ->toContain('kvkk_onayi');

    $sourceInput = $xpath->query('.//input[@name="source_page"]', $form)->item(0);
    $workplaceInput = $xpath->query('.//input[@name="isyeri_talebi"]', $form)->item(0);

    expect($sourceInput?->getAttribute('value'))->toBe($sourcePage);
    expect($workplaceInput?->hasAttribute('checked'))->toBe($expectsWorkplaceSelected);
})->with([
    'home security components' => [
        'ev-guvenligi.nelerden-olusur',
        'ev-guvenligi-nelerden-olusur',
        false,
    ],
    'workplace security components' => [
        'is-yeri-guvenligi.nelerden-olusur',
        'is-yeri-guvenligi-nelerden-olusur',
        true,
    ],
]);

it('renders the corporate discovery form with all corporate fields', function () {
    $response = $this->get(route('kurumsal-cozumler.index'));

    $document = new DOMDocument;
    libxml_use_internal_errors(true);
    $document->loadHTML($response->getContent());
    libxml_clear_errors();

    $xpath = new DOMXPath($document);
    $form = $xpath->query('//form[@data-corporate-discovery-form]')->item(0);

    expect($form)->toBeInstanceOf(DOMElement::class);
    expect($form->getAttribute('action'))->toBe(route('discovery.store'));
    expect(strtolower($form->getAttribute('method')))->toBe('post');

    $fieldNames = [];

    foreach ($xpath->query('.//input[@name] | .//select[@name]', $form) as $field) {
        $fieldNames[] = $field->getAttribute('name');
    }

    expect($fieldNames)
        ->toContain('_token')
        ->toContain('source_page')
        ->toContain('ad')
        ->toContain('soyad')
        ->toContain('telefon')
        ->toContain('email')
        ->toContain('firma_adi')
        ->toContain('kurum_turu')
        ->toContain('sube_sayisi')
        ->toContain('kampanya_izni')
        ->toContain('kvkk_onayi');

    $sourceInput = $xpath->query('.//input[@name="source_page"]', $form)->item(0);
    $renderedCities = [];

    foreach ($xpath->query('.//select[@name="il"]/option[@value != ""]', $form) as $option) {
        $renderedCities[$option->getAttribute('value')] = trim($option->textContent);
    }

    expect($sourceInput?->getAttribute('value'))->toBe('kurumsal-cozumler');
    expect($renderedCities)
        ->toHaveCount(81)
        ->toBe(Config::array('iller'));
});

it('sends a valid discovery request to the configured recipient', function () {
    config()->set('mail.discovery.to', 'info@tepenetguvenlik.com');
    Mail::fake();

    $response = $this->post(route('discovery.store'), validDiscoveryRequestPayload());

    $response
        ->assertRedirect(route('home').'#ucretsiz-kesif')
        ->assertSessionHas(
            'discovery_success',
            'Talebiniz alındı. Ekibimiz en kısa sürede sizinle iletişime geçecek.',
        );
    Mail::assertSent(DiscoveryRequestMail::class, function (DiscoveryRequestMail $mail): bool {
        return $mail->hasTo('info@tepenetguvenlik.com')
            && $mail->firstName === 'Ayşe'
            && $mail->lastName === 'Yılmaz'
            && $mail->phone === '0532 123 45 67'
            && $mail->email === 'ayse@example.com'
            && $mail->productGroup === 'kamera'
            && $mail->city === 'bursa'
            && $mail->isWorkplace
            && $mail->branchCount === 3
            && $mail->campaignConsent;
    });
});

it('sends every corporate discovery field to the configured recipient', function () {
    config()->set('mail.discovery.to', 'info@tepenetguvenlik.com');
    Mail::fake();

    $response = $this->post(route('discovery.store'), validCorporateDiscoveryRequestPayload());

    $response
        ->assertRedirect(route('kurumsal-cozumler.index').'#ucretsiz-kesif')
        ->assertSessionHas('discovery_success');
    Mail::assertSent(DiscoveryRequestMail::class, function (DiscoveryRequestMail $mail): bool {
        return $mail->hasTo('info@tepenetguvenlik.com')
            && $mail->firstName === 'Ayşe'
            && $mail->lastName === 'Yılmaz'
            && $mail->phone === '0532 123 45 67'
            && $mail->email === 'ayse@example.com'
            && $mail->productGroup === 'diger'
            && $mail->city === 'izmir'
            && $mail->isWorkplace
            && $mail->branchCount === 12
            && $mail->campaignConsent
            && $mail->companyName === 'Tepenet Test AŞ'
            && $mail->organizationType === 'fabrika';
    });
});

it('returns a request submitted from a security page to the same form', function (
    string $sourcePage,
    string $routeName,
    string $isWorkplace,
    string $fragment,
) {
    Mail::fake();

    $payload = validDiscoveryRequestPayload([
        'source_page' => $sourcePage,
        'isyeri_talebi' => $isWorkplace,
    ]);

    if ($isWorkplace === '0') {
        unset($payload['sube_sayisi']);
    }

    $response = $this->post(route('discovery.store'), $payload);

    $response
        ->assertRedirect(route($routeName).$fragment)
        ->assertSessionHas('discovery_success');
    Mail::assertSent(DiscoveryRequestMail::class);
})->with([
    'home security' => ['ev-guvenligi', 'ev-guvenligi.index', '0', '#ucretsiz-kesif-hero'],
    'home security components' => [
        'ev-guvenligi-nelerden-olusur',
        'ev-guvenligi.nelerden-olusur',
        '0',
        '#ucretsiz-kesif',
    ],
    'workplace security' => ['is-yeri-guvenligi', 'is-yeri-guvenligi.index', '1', '#ucretsiz-kesif-hero'],
    'workplace security components' => [
        'is-yeri-guvenligi-nelerden-olusur',
        'is-yeri-guvenligi.nelerden-olusur',
        '1',
        '#ucretsiz-kesif',
    ],
]);

it('rejects an empty discovery request without sending mail', function () {
    Mail::fake();

    $response = $this->from(route('home'))->post(route('discovery.store'));

    $response
        ->assertRedirect(route('home'))
        ->assertSessionHasErrors([
            'ad' => 'Lütfen adınızı girin.',
            'soyad' => 'Lütfen soyadınızı girin.',
            'telefon' => 'Lütfen telefon numaranızı girin.',
            'urun_grubu' => 'Lütfen bir ürün grubu seçin.',
            'il' => 'Lütfen bir il seçin.',
            'kvkk_onayi' => 'Devam etmek için aydınlatma metnini onaylayın.',
        ]);
    Mail::assertNothingOutgoing();
});

it('rejects invalid discovery request values without sending mail', function (
    string $field,
    mixed $value,
    string $message,
) {
    Mail::fake();

    $response = $this
        ->from(route('home'))
        ->post(route('discovery.store'), validDiscoveryRequestPayload([$field => $value]));

    $response
        ->assertRedirect(route('home'))
        ->assertSessionHasErrors([$field => $message]);
    Mail::assertNothingOutgoing();
})->with([
    'long first name' => ['ad', str_repeat('a', 101), 'Ad en fazla 100 karakter olabilir.'],
    'long last name' => ['soyad', str_repeat('a', 101), 'Soyad en fazla 100 karakter olabilir.'],
    'invalid phone' => ['telefon', 'telefon-degil', 'Lütfen geçerli bir telefon numarası girin.'],
    'long phone' => ['telefon', str_repeat('5', 21), 'Telefon numarası en fazla 20 karakter olabilir.'],
    'invalid email' => ['email', 'gecersiz-adres', 'Lütfen geçerli bir e-posta adresi girin.'],
    'unknown source page' => ['source_page', 'harici-site', 'Kaynak sayfa bilgisi geçersiz.'],
    'unknown product group' => ['urun_grubu', 'bilinmeyen', 'Lütfen geçerli bir ürün grubu seçin.'],
    'unknown city' => ['il', 'yurt-disi', 'Lütfen geçerli bir il seçin.'],
    'declined privacy notice' => ['kvkk_onayi', '0', 'Devam etmek için aydınlatma metnini onaylayın.'],
]);

it('rejects incomplete or invalid corporate details without sending mail', function (
    string $field,
    mixed $value,
    string $message,
) {
    Mail::fake();
    $payload = validCorporateDiscoveryRequestPayload();

    if ($value === null) {
        unset($payload[$field]);
    } else {
        $payload[$field] = $value;
    }

    $response = $this
        ->from(route('kurumsal-cozumler.index'))
        ->post(route('discovery.store'), $payload);

    $response
        ->assertRedirect(route('kurumsal-cozumler.index'))
        ->assertSessionHasErrors([$field => $message]);
    Mail::assertNothingOutgoing();
})->with([
    'missing company name' => ['firma_adi', null, 'Lütfen firma adını girin.'],
    'long company name' => ['firma_adi', str_repeat('a', 151), 'Firma adı en fazla 150 karakter olabilir.'],
    'missing organization type' => ['kurum_turu', null, 'Lütfen kurum türünü seçin.'],
    'unknown organization type' => ['kurum_turu', 'bilinmeyen', 'Lütfen geçerli bir kurum türü seçin.'],
]);

it('requires a valid branch count for workplace requests', function (mixed $branchCount, string $message) {
    Mail::fake();
    $payload = validDiscoveryRequestPayload();

    if ($branchCount === null) {
        unset($payload['sube_sayisi']);
    } else {
        $payload['sube_sayisi'] = $branchCount;
    }

    $response = $this->from(route('home'))->post(route('discovery.store'), $payload);

    $response
        ->assertRedirect(route('home'))
        ->assertSessionHasErrors(['sube_sayisi' => $message]);
    Mail::assertNothingOutgoing();
})->with([
    'missing branch count' => [null, 'İş yeri talepleri için şube sayısını girin.'],
    'non-integer branch count' => ['bir', 'Şube sayısı tam sayı olmalıdır.'],
    'branch count below one' => ['0', 'Şube sayısı en az 1 olmalıdır.'],
    'branch count above limit' => ['10001', 'Şube sayısı en fazla 10.000 olabilir.'],
]);

it('excludes branch count and normalizes unchecked consent fields for home requests', function () {
    Mail::fake();
    $payload = validDiscoveryRequestPayload([
        'isyeri_talebi' => '0',
        'sube_sayisi' => '999',
        'kampanya_izni' => '0',
    ]);

    $response = $this->post(route('discovery.store'), $payload);

    $response->assertRedirect(route('home').'#ucretsiz-kesif');
    Mail::assertSent(DiscoveryRequestMail::class, function (DiscoveryRequestMail $mail): bool {
        return ! $mail->isWorkplace
            && $mail->branchCount === null
            && ! $mail->campaignConsent;
    });
});

it('reports delivery failures and returns a safe message to the discovery form', function () {
    config()->set('mail.discovery.to', 'info@tepenetguvenlik.com');
    Exceptions::fake();
    Mail::shouldReceive('to')
        ->once()
        ->with('info@tepenetguvenlik.com')
        ->andThrow(new TransportException('Resend ulaşılamadı.'));

    $response = $this->post(route('discovery.store'), validDiscoveryRequestPayload());

    $response
        ->assertRedirect(route('home').'#ucretsiz-kesif')
        ->assertSessionHas('discovery_error', 'Talebiniz şu anda gönderilemedi. Lütfen daha sonra tekrar deneyin.')
        ->assertSessionHasInput('ad', 'Ayşe')
        ->assertSessionHas(
            '_old_input',
            fn (array $oldInput): bool => ! array_key_exists('kvkk_onayi', $oldInput),
        );
    Exceptions::assertReported(TransportException::class);
});

it('limits discovery requests to three submissions per minute', function () {
    Mail::fake();

    foreach (range(1, 3) as $attempt) {
        $this->post(route('discovery.store'), validDiscoveryRequestPayload([
            'email' => "ayse{$attempt}@example.com",
        ]))->assertRedirect(route('home').'#ucretsiz-kesif');
    }

    $this->post(route('discovery.store'), validDiscoveryRequestPayload())
        ->assertTooManyRequests();
    Mail::assertSentTimes(DiscoveryRequestMail::class, 3);
});
