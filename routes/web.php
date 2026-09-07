<?php

use App\Http\Controllers\Admin\AuthenticatedSessionController;
use App\Http\Controllers\Admin\IsIlaniController as AdminIsIlaniController;
use App\Http\Controllers\IsIlaniController as PublicIsIlaniController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');

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
Route::view('/urunler-ve-hizmetler', 'urunler_ve_hizmetler')->name('urunler-ve-hizmetler.index');
Route::view('/hakkimizda', 'hakkimizda')->name('hakkimizda.index');
Route::view('/hakkimizda/yonetim-kurulu', 'yonetim_kurulu')->name('hakkimizda.yonetim-kurulu');
Route::view('/online-islemler', 'online_islemler')->name('online-islemler');
Route::view('/e-basvuru-portali', 'e_basvuru')->name('e-basvuru');
Route::get('/is-ilanlari', [PublicIsIlaniController::class, 'index'])->name('is-ilanlari');

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
    });
});
