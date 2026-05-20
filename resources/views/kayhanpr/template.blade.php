@extends('kayhanpr.layouts.app')

@section('title', '')
@section('meta_description', $ayar->aciklama ?? '')

@section('content')
    @include('kayhanpr.partials.hero-cinema')

    @if($urunlerimiz->count())
    @include('kayhanpr.partials.showcase-carousel', [
        'label' => 'Çözümlerimiz',
        'title' => 'Ürün & Sistemler',
        'items' => $urunlerimiz->take(12),
        'type' => 'product',
        'variant' => 'kp-showcase--products',
        'swiperClass' => 'kp-products-swiper',
        'uid' => 'products',
        'prevClass' => 'kp-products-prev',
        'nextClass' => 'kp-products-next',
        'pagClass' => 'kp-products-pag',
        'moreUrl' => route('faaliyetlerimiz'),
    ])
    @endif

    @isset($hakkimizda)
    <section class="kp-sec kp-sec--dark">
        <div class="kp-container kp-about-strip">
            <div>
                <span class="kp-sec__label" style="color:var(--blue-bright)">Kayhan Prodüksiyon</span>
                <h2 style="margin:0 0 0.75rem;font-size:1.5rem;color:#fff;font-weight:800">Güvenilir İskele Ortağınız</h2>
                <p>{!! Str::limit(strip_tags($hakkimizda->aciklama ?? ''), 200) !!}</p>
                <a href="{{ url('/hakkimizda') }}" class="kp-btn kp-btn--cta" style="margin-top:1rem">Kurumsal Profil</a>
            </div>
            <div class="kp-metrics">
                <div class="kp-metric"><strong>25+</strong><span>Yıl</span></div>
                <div class="kp-metric"><strong>500+</strong><span>Proje</span></div>
                <div class="kp-metric"><strong>CH</strong><span>İsviçre</span></div>
                <div class="kp-metric"><strong>9</strong><span>Dil</span></div>
            </div>
        </div>
    </section>
    @endisset

    @if($haberler->count())
    @include('kayhanpr.partials.showcase-carousel', [
        'label' => 'Güncel',
        'title' => 'Haberler',
        'items' => $haberler->take(8),
        'type' => 'news',
        'variant' => 'kp-showcase--news',
        'swiperClass' => 'kp-news-swiper',
        'uid' => 'news',
        'prevClass' => 'kp-news-prev',
        'nextClass' => 'kp-news-next',
        'pagClass' => 'kp-news-pag',
    ])
    @endif

    <section class="kp-sec kp-sec--cta-bar">
        <div class="kp-container">
            <div class="kp-cta">
                <div>
                    <h2>Projeniz için teklif alın</h2>
                    <p>İsviçre ve Avrupa — çok dilli proje desteği.</p>
                </div>
                <a href="{{ url('/iletisim') }}" class="kp-btn kp-btn--cta">İletişime Geç</a>
            </div>
        </div>
    </section>
@endsection
