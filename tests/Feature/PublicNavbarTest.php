<?php

it('renders every public navigation destination inside the mobile menu', function () {
    $response = $this->get(route('home'));

    $document = new DOMDocument;
    libxml_use_internal_errors(true);
    $document->loadHTML($response->getContent());
    libxml_clear_errors();

    $mobileMenu = $document->getElementById('mobileMenu');

    expect($mobileMenu)->toBeInstanceOf(DOMElement::class);

    $xpath = new DOMXPath($document);
    $links = [];

    foreach ($xpath->query('.//a[@href]', $mobileMenu) as $link) {
        $links[] = $link->getAttribute('href');
    }

    expect($links)
        ->toContain(route('home'))
        ->toContain(route('hakkimizda.index'))
        ->toContain(route('ev-guvenligi.index'))
        ->toContain(route('ev-guvenligi.nelerden-olusur'))
        ->toContain(route('ev-guvenligi.nasil-calisir'))
        ->toContain(route('is-yeri-guvenligi.index'))
        ->toContain(route('is-yeri-guvenligi.nelerden-olusur'))
        ->toContain(route('is-yeri-guvenligi.nasil-calisir'))
        ->toContain(route('kurumsal-cozumler.index'))
        ->toContain(route('kendi-sistemini-olustur.index'))
        ->toContain(route('urunler-ve-hizmetler.index'))
        ->toContain(route('urunler-ve-hizmetler.kamera-sistemleri'))
        ->toContain(route('urunler-ve-hizmetler.alarm-sistemleri'))
        ->toContain(route('online-islemler'))
        ->toContain(route('bloglar.index'))
        ->toContain(route('iletisim'));
});

it('renders the desktop dropdown groups as collapsible mobile submenus', function () {
    $response = $this->get(route('home'));

    $response
        ->assertSee('id="mobileEvGuvenligiMenu"', false)
        ->assertSee('id="mobileIsYeriGuvenligiMenu"', false)
        ->assertSee('id="mobileKurumsalCozumlerMenu"', false)
        ->assertSee('id="mobileKendiSisteminiOlusturMenu"', false)
        ->assertSee('id="mobileUrunlerMenu"', false);
});
