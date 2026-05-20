<footer class="kp-footer" role="contentinfo">
    <div class="kp-container kp-footer__inner">
        <a href="{{ url('/') }}" class="kp-footer__logo" aria-label="Kayhan Prodüksiyon">
            <img src="{{ asset('kayhan/images/logo-white.svg') }}" alt="Kayhan Prodüksiyon" width="200" height="40" loading="lazy" decoding="async">
        </a>

        <nav class="kp-footer__nav" aria-label="Alt menü">
            <a href="{{ route('hakkimizda') }}">Kurumsal</a>
            <a href="{{ route('faaliyetlerimiz') }}">Ürünler</a>
            <a href="{{ route('katalog.index') }}">Katalog</a>
            <a href="{{ route('sss') }}">S.S.S.</a>
            <a href="{{ route('iletisim') }}">İletişim</a>
        </nav>

        <div class="kp-footer__contact">
            @if(!empty($ayar->telefon))
            <a href="tel:{{ preg_replace('/\s+/', '', $ayar->telefon) }}"><i class="fa-solid fa-phone"></i> {{ $ayar->telefon }}</a>
            @endif
            @if(!empty($ayar->email))
            <a href="mailto:{{ $ayar->email }}"><i class="fa-solid fa-envelope"></i> {{ $ayar->email }}</a>
            @endif
        </div>
    </div>
    <div class="kp-footer__copy">
        <div class="kp-container">
            <span>© {{ date('Y') }} Kayhan Prodüksiyon</span>
            <span class="kp-footer__sep">·</span>
            <span>İskele Sistemleri · CH &amp; EU</span>
        </div>
    </div>
</footer>
