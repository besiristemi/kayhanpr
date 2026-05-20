<section class="kp-cinema" aria-label="Ana slider">
    <div class="swiper kp-cinema-swiper">
        <div class="swiper-wrapper">
            @forelse($sliderler as $slider)
            <div class="swiper-slide">
                <article class="kp-cinema__slide">
                    <div class="kp-cinema__bg" style="background-image:url('{{ asset($slider->resim) }}')"></div>
                    <div class="kp-cinema__mesh" aria-hidden="true"></div>
                    <div class="kp-cinema__gradient" aria-hidden="true"></div>
                    <div class="kp-container kp-cinema__content">
                        <div class="kp-cinema__panel">
                            <div class="kp-cinema__badge">
                                <span class="kp-cinema__dot"></span>
                                İskele Sistemleri · İsviçre &amp; Avrupa
                            </div>
                            <h1 class="kp-cinema__title">{{ $slider->baslik ?: 'Endüstriyel İskele Çözümleri' }}</h1>
                            <p class="kp-cinema__desc">{{ strip_tags($slider->icerik ?? 'Üretim, kiralama ve proje yönetiminde güvenilir mühendislik ortağınız.') }}</p>
                            <div class="kp-cinema__actions">
                                <a href="{{ route('iletisim') }}" class="kp-btn kp-btn--cta">Proje Teklifi</a>
                                <a href="{{ route('katalog.index') }}" class="kp-btn kp-btn--ghost">Dijital Katalog</a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            @empty
            <div class="swiper-slide">
                <article class="kp-cinema__slide">
                    <div class="kp-cinema__bg kp-cinema__bg--fallback"></div>
                    <div class="kp-cinema__mesh" aria-hidden="true"></div>
                    <div class="kp-cinema__gradient" aria-hidden="true"></div>
                    <div class="kp-container kp-cinema__content">
                        <div class="kp-cinema__panel">
                            <div class="kp-cinema__badge"><span class="kp-cinema__dot"></span> Kayhan Prodüksiyon</div>
                            <h1 class="kp-cinema__title">Çelik İskele Sistemleri</h1>
                            <p class="kp-cinema__desc">Mühendislik, güvenlik ve kalite odaklı endüstriyel çözümler.</p>
                            <div class="kp-cinema__actions">
                                <a href="{{ route('iletisim') }}" class="kp-btn kp-btn--cta">İletişime Geçin</a>
                                <a href="{{ route('faaliyetlerimiz') }}" class="kp-btn kp-btn--ghost">Ürünlerimiz</a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            @endforelse
        </div>
    </div>

    @if($sliderler->count())
    <div class="kp-cinema__ui kp-container">
        <div class="kp-cinema__thumbs" role="tablist" aria-label="Slayt seçimi">
            @foreach($sliderler as $i => $slider)
            <button type="button" class="kp-cinema__thumb{{ $i === 0 ? ' is-active' : '' }}" data-index="{{ $i }}" aria-label="Slayt {{ $i + 1 }}">
                <span class="kp-cinema__thumb-img" style="background-image:url('{{ asset($slider->resim) }}')"></span>
                <span class="kp-cinema__thumb-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
            </button>
            @endforeach
        </div>
        <div class="kp-cinema__controls">
            <div class="kp-cinema__counter"><span class="kp-cinema__current">01</span> / <span class="kp-cinema__total">{{ str_pad($sliderler->count(), 2, '0', STR_PAD_LEFT) }}</span></div>
            <div class="kp-cinema__progress"><span class="kp-cinema__bar"></span></div>
            <div class="kp-cinema__arrows">
                <button type="button" class="kp-cinema__arrow kp-cinema__arrow--prev" aria-label="Önceki"><i class="fa-solid fa-arrow-left"></i></button>
                <button type="button" class="kp-cinema__arrow kp-cinema__arrow--next" aria-label="Sonraki"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
    @endif
</section>

@include('kayhanpr.partials.trust-strip')
