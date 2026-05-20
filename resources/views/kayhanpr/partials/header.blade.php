@php
    $isHome = request()->routeIs('home');
    $navItems = [
        ['label' => 'Ana Sayfa', 'url' => url('/'), 'active' => request()->is('/')],
        ['label' => 'Kurumsal', 'url' => route('hakkimizda'), 'active' => request()->routeIs('hakkimizda')],
        ['label' => 'Ürünlerimiz', 'url' => route('faaliyetlerimiz'), 'active' => request()->routeIs('faaliyetlerimiz') || request()->routeIs('urundetay.*') || request()->routeIs('haber.*')],
        ['label' => 'Katalog', 'url' => route('katalog.index'), 'active' => request()->routeIs('katalog*')],
        ['label' => 'S.S.S.', 'url' => route('sss'), 'active' => request()->routeIs('sss')],
        ['label' => 'İletişim', 'url' => route('iletisim'), 'active' => request()->routeIs('iletisim')],
    ];
    $phoneRaw = !empty($ayar->telefon) ? preg_replace('/\s+/', '', $ayar->telefon) : '';
@endphp

<div class="kp-header-wrap{{ $isHome ? ' kp-header-wrap--home' : '' }}" id="kp-header-wrap">
    <div class="kp-topbar">
        <div class="kp-topbar__full">
            <div class="kp-topbar__inner">
                <div class="kp-topbar__left">
                    @if($phoneRaw)
                    <a href="tel:{{ $phoneRaw }}" class="kp-topbar__item"><i class="fa-solid fa-phone"></i> {{ $ayar->telefon }}</a>
                    @endif
                    @if(!empty($ayar->email))
                    <a href="mailto:{{ $ayar->email }}" class="kp-topbar__item kp-topbar__item--hide-sm"><i class="fa-solid fa-envelope"></i> {{ $ayar->email }}</a>
                    @endif
                </div>
                <div class="kp-topbar__right">
                    <span class="kp-topbar__badge"><i class="fa-solid fa-globe"></i> CH · EU</span>
                    <ul class="kp-topbar__social">
                        @if(!empty($ayar->facebook))<li><a href="https://www.facebook.com/{{ $ayar->facebook }}" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f"></i></a></li>@endif
                        @if(!empty($ayar->linkedin))<li><a href="https://www.linkedin.com/company/{{ $ayar->linkedin }}" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin-in"></i></a></li>@endif
                        @if(!empty($ayar->instagram))<li><a href="https://www.instagram.com/{{ $ayar->instagram }}" target="_blank" rel="noopener"><i class="fa-brands fa-instagram"></i></a></li>@endif
                        @if(!empty($ayar->youtube))<li><a href="https://www.youtube.com/{{ $ayar->youtube }}" target="_blank" rel="noopener"><i class="fa-brands fa-youtube"></i></a></li>@endif
                    </ul>
                    <div class="kp-topbar__lang">@include('kayhanpr.partials.lang-switcher')</div>
                </div>
            </div>
        </div>
    </div>

    <header class="kp-site-header" role="banner">
        <div class="kp-site-header__grid" aria-hidden="true"></div>
        <div class="kp-site-header__full">
            <div class="kp-site-header__inner">
                @include('kayhanpr.partials.brand-logo')

                <nav class="kp-site-nav" aria-label="Ana menü">
                    <ul class="kp-site-nav__list">
                        @foreach($navItems as $item)
                        <li>
                            <a href="{{ $item['url'] }}" class="kp-site-nav__link{{ $item['active'] ? ' is-active' : '' }}">
                                {{ $item['label'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </nav>

                <div class="kp-site-header__actions">
                    @if($phoneRaw)
                    <a href="tel:{{ $phoneRaw }}" class="kp-site-header__tel d-hide-mobile">
                        <i class="fa-solid fa-headset"></i>
                        <span>{{ $ayar->telefon }}</span>
                    </a>
                    @endif
                    <a href="{{ route('iletisim') }}" class="kp-btn kp-btn--cta kp-site-header__cta d-hide-mobile">Teklif Alın</a>
                    <button type="button" class="kp-site-header__burger" id="kp-menu-toggle" aria-label="Menü" aria-expanded="false">
                        <span></span><span></span><span></span>
                    </button>
                </div>
            </div>
        </div>
    </header>
</div>

<div class="kp-menu-overlay" id="kp-menu-overlay" aria-hidden="true"></div>
<aside class="kp-mobile-menu" id="kp-mobile-menu" aria-hidden="true">
    <div class="kp-mobile-menu__head">
        @include('kayhanpr.partials.brand-logo')
        <button type="button" class="kp-mobile-menu__close" id="kp-menu-close" aria-label="Kapat"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <nav class="kp-mobile-menu__nav">
        @foreach($navItems as $item)
        <a href="{{ $item['url'] }}" class="kp-mobile-menu__link{{ $item['active'] ? ' is-active' : '' }}">{{ $item['label'] }}</a>
        @endforeach
    </nav>
    <div class="kp-mobile-menu__foot">
        <div class="kp-mobile-menu__extras">
            <ul class="kp-mobile-menu__social">
                @if(!empty($ayar->facebook))<li><a href="https://www.facebook.com/{{ $ayar->facebook }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>@endif
                @if(!empty($ayar->linkedin))<li><a href="https://www.linkedin.com/company/{{ $ayar->linkedin }}" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a></li>@endif
                @if(!empty($ayar->instagram))<li><a href="https://www.instagram.com/{{ $ayar->instagram }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a></li>@endif
                @if(!empty($ayar->youtube))<li><a href="https://www.youtube.com/{{ $ayar->youtube }}" target="_blank" rel="noopener" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a></li>@endif
            </ul>
            <div class="kp-mobile-menu__lang">@include('kayhanpr.partials.lang-switcher')</div>
        </div>
        @if($phoneRaw)<a href="tel:{{ $phoneRaw }}" class="kp-mobile-menu__phone"><i class="fa-solid fa-phone"></i> {{ $ayar->telefon }}</a>@endif
        <a href="{{ route('iletisim') }}" class="kp-btn kp-btn--cta">Teklif Alın</a>
    </div>
</aside>
