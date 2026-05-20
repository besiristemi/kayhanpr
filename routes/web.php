<?php

use App\Http\Controllers\AyarController;
use App\Http\Controllers\CozumortakController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MesajController;
use App\Http\Controllers\SayfaController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SorularController;
use App\Http\Controllers\UrunlerController;
use App\Http\Controllers\YaziController;
use App\Http\Controllers\YonetimController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('panel', [HomeController::class, 'index'])->name('panel');
    Route::resource('ayarlar', AyarController::class);
    Route::resource('kategoriler', KategoriController::class);
    Route::resource('yazilar', YaziController::class);
    Route::resource('sliderler', SliderController::class);
    Route::resource('sayfalar', SayfaController::class);
    Route::resource('mesajlar', MesajController::class);
    Route::resource('urunler', UrunlerController::class);
    Route::resource('cozumortak', CozumortakController::class);
    Route::resource('sorular', SorularController::class);

    Route::get('kullanicilar', [YonetimController::class, 'kullanicilar'])->name('kullanici.index');
    Route::get('kullaniciekle', [YonetimController::class, 'kullaniciekle'])->name('kullanici.ekle');
    Route::post('kullanicikayit', [YonetimController::class, 'kullanicikayit'])->name('kullanici.kayit');
    Route::get('kullaniciduzenle/{id}', [YonetimController::class, 'kullaniciduzenle'])->name('kullanici.duzenle');
    Route::post('kullaniciguncelle/{id}', [YonetimController::class, 'kullaniciguncelle'])->name('kullanici.guncelle');
    Route::delete('kullanicisil/{id}', [YonetimController::class, 'kullanicisil'])->name('kullanici.sil');
    Route::get('onayla/{id}', [YonetimController::class, 'onayla'])->name('mesaj.onayla');
    Route::get('onaykaldir/{id}', [YonetimController::class, 'onaykaldir'])->name('mesaj.onaykaldir');
    Route::get('hakkimizdaekle', [YonetimController::class, 'hakkimizda'])->name('hakkimizdaekle');
    Route::post('hakkimizdagir/{id}', [YonetimController::class, 'hakkimizdagir'])->name('hakkimizda.gir');
    Route::get('yonetim', [YonetimController::class, 'index'])->name('yonetim.index');
    Route::post('smsonay', [MesajController::class, 'smsgonder'])->name('smsonay');
});

Route::get('cikis', [YonetimController::class, 'cikis'])->name('yonetim.cikis')->middleware('auth');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('katalog', [\App\Http\Controllers\KatalogController::class, 'index'])->name('katalog.index');
Route::get('katalog/{slug}', [\App\Http\Controllers\KatalogController::class, 'show'])->name('katalog.show');

Route::get('hakkimizda', [HomeController::class, 'hakkimizda'])->name('hakkimizda');
Route::get('kurumsal', [HomeController::class, 'kurumsal']);
Route::get('faaliyetlerimiz', [HomeController::class, 'faaliyetlerimiz'])->name('faaliyetlerimiz');
Route::get('cozumortaklari', [HomeController::class, 'cozumortaklari'])->name('cozumortaklari');
Route::get('referanslar', [HomeController::class, 'referanslar'])->name('referanslar');
Route::get('sss', [HomeController::class, 'sss'])->name('sss');

Route::get('iletisim', [HomeController::class, 'iletisim'])->name('iletisim');
Route::post('mesajlar', [HomeController::class, 'store'])->name('mesaj.yolla');

Route::get('haber/{id}/{slug?}', [HomeController::class, 'yazidetay'])->name('haber.goster');
Route::get('urundetay/{id}/{slug?}', [HomeController::class, 'urundetay'])->name('urundetay.goster');
Route::get('sayfa/{id}/{slug?}', [HomeController::class, 'sayfa'])->name('sayfa.goster');

Route::post('/autocomplete/fetch', [HomeController::class, 'fetch'])->name('autocomplete.fetch');
Route::get('sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index']);
