<?php

it('renders each public page from its named route', function (string $routeName, string $viewName) {
    $response = $this->get(route($routeName));

    $response->assertOk();
    $response->assertViewIs($viewName);
})->with([
    'home' => ['home', 'index'],
    'home security' => ['ev-guvenligi.index', 'ev_guvenligi'],
    'home security components' => ['ev-guvenligi.nelerden-olusur', 'ev_guvenligi_nelerden_olusur'],
    'how home security works' => ['ev-guvenligi.nasil-calisir', 'ev_guvenligi_nasil_calisir'],
    'workplace security' => ['is-yeri-guvenligi.index', 'is_yeri_guvenligi'],
    'workplace security components' => ['is-yeri-guvenligi.nelerden-olusur', 'is_yeri_guvenligi_nelerden_olusur'],
    'how workplace security works' => ['is-yeri-guvenligi.nasil-calisir', 'is_yeri_guvenligi_nasil_calisir'],
    'corporate solutions' => ['kurumsal-cozumler.index', 'kurumsal_cozumler'],
    'system builder' => ['kendi-sistemini-olustur.index', 'kendi_sistemini_olustur'],
    'products and services' => ['urunler-ve-hizmetler.index', 'urunler_ve_hizmetler'],
    'about' => ['hakkimizda.index', 'hakkimizda'],
    'board of directors' => ['hakkimizda.yonetim-kurulu', 'yonetim_kurulu'],
    'job application portal' => ['e-basvuru', 'e_basvuru'],
    'job listings' => ['is-ilanlari', 'is_ilanlari'],
]);
