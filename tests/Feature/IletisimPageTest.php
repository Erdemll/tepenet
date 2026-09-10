<?php

it('renders contact details and the complete contact form without a map', function () {
    $response = $this->get(route('iletisim'));

    $response
        ->assertOk()
        ->assertViewIs('iletisim')
        ->assertSee('class="catalog-hero"', false)
        ->assertSee(asset('resimler/iletisim_banner.png'), false)
        ->assertSee('<h1 id="page-title">İletişim</h1>', false)
        ->assertSeeText('İletişim Bilgilerimiz')
        ->assertSeeText('0224 322 03 70')
        ->assertSeeText('0850 532 96 70')
        ->assertSeeText('inegol@tepenetguvenlik.com')
        ->assertSeeText('İletişim Formu')
        ->assertSee('name="ad"', false)
        ->assertSee('name="soyad"', false)
        ->assertSee('name="email"', false)
        ->assertSee('name="telefon"', false)
        ->assertSee('name="il"', false)
        ->assertSee('name="ilce"', false)
        ->assertSee('name="konu"', false)
        ->assertSee('name="mesaj"', false)
        ->assertSee('name="kampanya_izni"', false)
        ->assertSee('name="tercih_telefon"', false)
        ->assertSee('name="tercih_email"', false)
        ->assertSee('name="tercih_sms"', false)
        ->assertSee('name="kvkk_onayi"', false)
        ->assertSee('action="'.route('iletisim.store').'"', false)
        ->assertSee('name="_token"', false)
        ->assertSee('class="contact-submit btn" type="submit"', false)
        ->assertDontSee('<iframe', false);
});

it('links the shared navigation and footer to the contact page', function () {
    $response = $this->get(route('home'));

    $response
        ->assertOk()
        ->assertSee(route('iletisim'), false);
});
