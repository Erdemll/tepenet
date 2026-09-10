<?php

use App\Http\Controllers\Admin\AuthenticatedSessionController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\IsIlaniController as AdminIsIlaniController;
use App\Http\Controllers\Admin\UrunController as AdminUrunController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\DiscoveryRequestController;
use App\Http\Controllers\IsIlaniController as PublicIsIlaniController;
use App\Http\Controllers\SystemBuilderRequestController;
use App\Http\Controllers\UrunController as PublicUrunController;
use App\Http\Controllers\UrunKategoriController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');
Route::post('/ucretsiz-kesif', DiscoveryRequestController::class)
    ->middleware('throttle:3,1')
    ->name('discovery.store');

Route::prefix('ev-guvenligi')->name('ev-guvenligi.')->group(function (): void {
    Route::view('/', 'ev_guvenligi')->name('index');
    Route::view('/nelerden-olusur', 'ev_guvenligi_nelerden_olusur')->name('nelerden-olusur');
    Route::view('/nasil-calisir', 'ev_guvenligi_nasil_calisir')->name('nasil-calisir');
});

Route::prefix('is-yeri-guvenligi')->name('is-yeri-guvenligi.')->group(function (): void {
    Route::view('/', 'is_yeri_guvenligi')->name('index');
    Route::view('/nelerden-olusur', 'is_yeri_guvenligi_nelerden_olusur')->name('nelerden-olusur');
    Route::view('/nasil-calisir', 'is_yeri_guvenligi_nasil_calisir')->name('nasil-calisir');
});

Route::view('/kurumsal-cozumler', 'kurumsal_cozumler')->name('kurumsal-cozumler.index');
Route::view('/kendi-sistemini-olustur', 'kendi_sistemini_olustur')->name('kendi-sistemini-olustur.index');
Route::post('/kendi-sistemini-olustur', SystemBuilderRequestController::class)
    ->middleware('throttle:3,1')
    ->name('kendi-sistemini-olustur.store');

Route::prefix('urunler-ve-hizmetler')->name('urunler-ve-hizmetler.')->group(function (): void {
    Route::view('/', 'urunler_ve_hizmetler')->name('index');
    Route::view('/alarm-sistemleri', 'alarm_sistemleri')->name('alarm-sistemleri');
    Route::view('/kamera-sistemleri', 'kamera_sistemleri')->name('kamera-sistemleri');
    Route::get('/{sistem}/{urunKategori:slug}', [UrunKategoriController::class, 'show'])
        ->whereIn('sistem', ['alarm-sistemleri', 'kamera-sistemleri'])
        ->name('kategori');
    Route::get('/{sistem}/{urunKategori:slug}/{urun:slug}', [PublicUrunController::class, 'show'])
        ->whereIn('sistem', ['alarm-sistemleri', 'kamera-sistemleri'])
        ->scopeBindings()
        ->name('urun-detay');
});

Route::view('/hakkimizda', 'hakkimizda')->name('hakkimizda.index');
Route::view('/hakkimizda/yonetim-kurulu', 'yonetim_kurulu')->name('hakkimizda.yonetim-kurulu');
Route::view('/online-islemler', 'online_islemler')->name('online-islemler');
Route::view('/e-basvuru-portali', 'e_basvuru')->name('e-basvuru');
Route::view('/iletisim', 'iletisim')->name('iletisim');
Route::post('/iletisim', ContactRequestController::class)
    ->middleware('throttle:3,1')
    ->name('iletisim.store');
Route::get('/is-ilanlari', [PublicIsIlaniController::class, 'index'])->name('is-ilanlari');
//Route::get('/bloglar', [BlogController::class, 'index'])->name('bloglar.index');
//Route::get('/bloglar/{blog}', [BlogController::class, 'show'])->name('bloglar.show');

Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');

    Route::middleware(['auth', 'can:access-admin'])->group(function (): void {
        Route::view('/', 'admin.dashboard')->name('dashboard');
        Route::resource('is-ilanlari', AdminIsIlaniController::class)
            ->except('show')
            ->parameters(['is-ilanlari' => 'isIlani']);
        Route::resource('urunler', AdminUrunController::class)
            ->except('show')
            ->parameters(['urunler' => 'urun']);
        Route::resource('bloglar', AdminBlogController::class)
            ->except('show')
            ->parameters(['bloglar' => 'blog']);
    });
});
