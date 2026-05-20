<?php

namespace App\Providers;

use App\Models\Ayar;
use App\Models\Hakkimizda;
use App\Models\Kategori;
use App\Models\Sayfa;
use App\Models\Sorular;
use App\Models\Yazi;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);

        if (! $this->app->runningInConsole()) {
            try {
                $root = request()->getSchemeAndHttpHost() . request()->getBaseUrl();
                URL::forceRootUrl(rtrim($root, '/'));
            } catch (\Throwable) {
                //
            }
        }

        $ayar = Ayar::find(1);
        $anahakkimizda = Hakkimizda::find(1);
        $sayfalar = Sayfa::whereNull('ust_id')->get();
        $kategoriler = Kategori::all();
        $sorular = Sorular::take(3)->get();
        $tumsorular = Sorular::all();

        $sliderler = collect();
        $sliderler1 = collect();
        $haberler = collect();
        $hizmetlerimiz = collect();
        $urunlerimiz = collect();
        $ihaleler = collect();
        $mansetler = collect();
        $tamamproje = collect();
        $devamproje = collect();
        $planproje = collect();
        $yazilist = collect();
        $photolar = collect();

        if (Schema::hasTable('icerikler')) {
            $sliderler = Yazi::slider()->orderBy('id')->take(16)->get();
            $sliderler1 = Yazi::slider()->orderBy('id')->take(1)->get();
            $haberler = Yazi::all();
            $photolar = Yazi::all();
            $hizmetlerimiz = Yazi::where('kategori', '3')->take(20)->get();
            $urunlerimiz = Yazi::where('kategori', '4')->take(20)->get();
            $ihaleler = Yazi::where('kategori', '2')->take(6)->get();
            $mansetler = Yazi::where('kategori', '1')->take(16)->get();
            $tamamproje = Yazi::where('kategori', '2')->take(3)->get();
            $devamproje = Yazi::where('kategori', '3')->take(3)->get();
            $planproje = Yazi::where('kategori', '4')->take(3)->get();
            $yazilist = Yazi::where('kategori', '1')->take(3)->get();
        }

        View::share([
            'tumsorular' => $tumsorular,
            'hizmetlerimiz' => $hizmetlerimiz,
            'urunlerimiz' => $urunlerimiz,
            'anahakkimizda' => $anahakkimizda,
            'ayar' => $ayar,
            'photolar' => $photolar,
            'kategoriler' => $kategoriler,
            'sorular' => $sorular,
            'sayfalar' => $sayfalar,
            'sliderler' => $sliderler,
            'sliderler1' => $sliderler1,
            'haberler' => $haberler,
            'tamamproje' => $tamamproje,
            'devamproje' => $devamproje,
            'planproje' => $planproje,
            'yazilist' => $yazilist,
            'mansetler' => $mansetler,
            'ihaleler' => $ihaleler,
        ]);
    }
}
