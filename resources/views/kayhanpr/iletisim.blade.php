@extends('kayhanpr.layouts.app')

@section('title', 'İletişim')
@section('meta_description', 'Kayhan Prodüksiyon iletişim — iskele sistemleri teklif ve bilgi talepleri.')

@section('content')
@include('kayhanpr.partials.page-hero', [
    'pageTitle' => 'İletişim',
    'pageLead' => 'Proje teklifi ve teknik sorularınız için formu doldurun.',
    'breadcrumb' => [
        ['label' => 'Ana Sayfa', 'url' => url('/')],
        ['label' => 'İletişim'],
    ],
])

<section class="kp-inner kp-contact-page">
    <div class="kp-container kp-contact-page__grid">
        <aside class="kp-card-box">
            <h2>İletişim Bilgileri</h2>
            <ul class="kp-contact-list">
                @if(!empty($ayar->telefon))
                <li><i class="fa-solid fa-phone"></i><div><strong>Telefon</strong><a href="tel:{{ preg_replace('/\s+/', '', $ayar->telefon) }}">{{ $ayar->telefon }}</a></div></li>
                @endif
                @if(!empty($ayar->email))
                <li><i class="fa-solid fa-envelope"></i><div><strong>E-posta</strong><a href="mailto:{{ $ayar->email }}">{{ $ayar->email }}</a></div></li>
                @endif
                @if(!empty($ayar->adres))
                <li><i class="fa-solid fa-location-dot"></i><div><strong>Adres</strong><span>{{ $ayar->adres }}</span></div></li>
                @endif
            </ul>
        </aside>

        <div class="kp-card-box">
            <h2>Mesaj Gönderin</h2>

            @if(session('success'))
            <div class="kp-alert kp-alert--ok"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
            @endif

            @if($errors->any())
            <div class="kp-alert kp-alert--err">
                <ul>
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
            @endif

            <form class="kp-form" method="POST" action="{{ route('mesaj.yolla') }}" id="kp-contact-form" novalidate>
                @csrf
                <input type="hidden" name="form_started_at" value="{{ time() }}">

                <div class="kp-hp" aria-hidden="true">
                    <label for="company_website">Web siteniz</label>
                    <input type="text" name="company_website" id="company_website" tabindex="-1" autocomplete="off">
                </div>

                <div class="kp-form-row">
                    <div class="kp-field">
                        <label for="adsoyad">Ad Soyad <span>*</span></label>
                        <input type="text" id="adsoyad" name="adsoyad" required minlength="3" maxlength="255"
                               value="{{ old('adsoyad') }}" placeholder="Adınız Soyadınız">
                    </div>
                    <div class="kp-field">
                        <label for="email">E-posta <span>*</span></label>
                        <input type="email" id="email" name="email" required value="{{ old('email') }}" placeholder="ornek@email.com">
                    </div>
                </div>
                <div class="kp-field">
                    <label for="konu">Konu</label>
                    <input type="text" id="konu" name="konu" value="{{ old('konu') }}" placeholder="Proje teklifi, kiralama...">
                </div>
                <div class="kp-field">
                    <label for="mesaj">Mesaj <span>*</span></label>
                    <textarea id="mesaj" name="mesaj" rows="5" required minlength="10" maxlength="5000" placeholder="Talebinizi kısaca yazın...">{{ old('mesaj') }}</textarea>
                </div>
                <div class="kp-field kp-captcha">
                    <label for="captcha_answer">Güvenlik: {{ $captcha['a'] ?? '?' }} + {{ $captcha['b'] ?? '?' }} = ? <span>*</span></label>
                    <input type="number" id="captcha_answer" name="captcha_answer" required inputmode="numeric" placeholder="Sonuç">
                    <p class="kp-field-hint">Bot koruması — işlemin sonucunu yazın.</p>
                </div>
                <button type="submit" class="kp-btn kp-btn--cta" style="width:100%">
                    <i class="fa-solid fa-paper-plane"></i> Mesajı Gönder
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
