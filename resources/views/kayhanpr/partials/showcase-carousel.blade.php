@php
    $uid = $uid ?? uniqid('sc');
    $prevClass = $prevClass ?? $uid . '-prev';
    $nextClass = $nextClass ?? $uid . '-next';
    $pagClass = $pagClass ?? $uid . '-pag';
    $swiperClass = $swiperClass ?? 'kp-showcase-swiper';
@endphp
<section class="kp-showcase {{ $variant ?? 'kp-showcase--products' }}">
    <div class="kp-container">
        <header class="kp-showcase__head">
            <div class="kp-showcase__titles">
                <span class="kp-showcase__label">{{ $label }}</span>
                <h2>{{ $title }}</h2>
            </div>
            @if(!empty($moreUrl))
            <a href="{{ $moreUrl }}" class="kp-showcase__more d-hide-mobile">Tümünü gör <i class="fa-solid fa-arrow-right"></i></a>
            @endif
        </header>

        <div class="kp-showcase__stage">
            <div class="swiper {{ $swiperClass }}" data-showcase="{{ $uid }}">
                <div class="swiper-wrapper">
                    @foreach($items as $item)
                    <div class="swiper-slide">
                        @if(($type ?? 'product') === 'news')
                        <a href="{{ route('haber.goster', ['id' => $item->id, 'slug' => $item->slug]) }}" class="kp-showcase-card kp-showcase-card--news">
                            <div class="kp-showcase-card__media">
                                <img src="{{ asset($item->resim) }}" alt="{{ strip_tags($item->baslik) }}" loading="lazy">
                            </div>
                            <div class="kp-showcase-card__body">
                                <time>{{ $item->created_at?->format('d.m.Y') }}</time>
                                <h3>{{ Str::limit(strip_tags($item->baslik), 72) }}</h3>
                                <span class="kp-showcase-card__cta">Oku <i class="fa-solid fa-arrow-right"></i></span>
                            </div>
                        </a>
                        @else
                        <a href="{{ route('urundetay.goster', ['id' => $item->id, 'slug' => $item->slug]) }}" class="kp-showcase-card">
                            <div class="kp-showcase-card__media">
                                <img src="{{ asset($item->resim) }}" alt="{{ strip_tags($item->baslik) }}" loading="lazy">
                                <span class="kp-showcase-card__tag">Ürün</span>
                            </div>
                            <div class="kp-showcase-card__body">
                                <h3>{{ $item->baslik }}</h3>
                                <span class="kp-showcase-card__cta">İncele <i class="fa-solid fa-arrow-right"></i></span>
                            </div>
                        </a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="kp-showcase__controls">
                <button type="button" class="kp-showcase__btn {{ $prevClass }}" aria-label="Önceki">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <div class="kp-showcase__pager">
                    <span class="kp-showcase__fraction {{ $pagClass }}">1 / {{ $items->count() }}</span>
                </div>
                <button type="button" class="kp-showcase__btn {{ $nextClass }}" aria-label="Sonraki">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
            @if(!empty($moreUrl))
            <a href="{{ $moreUrl }}" class="kp-showcase__more-mobile d-show-mobile">Tümünü gör <i class="fa-solid fa-arrow-right"></i></a>
            @endif
        </div>
    </div>
</section>
