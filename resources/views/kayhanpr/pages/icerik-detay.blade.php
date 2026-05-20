@extends('kayhanpr.layouts.app')

@section('title', $pageTitle)
@section('meta_description', Str::limit(strip_tags($icerik->icerik ?? ''), 160))

@section('content')
@include('kayhanpr.partials.page-hero', [
    'pageTitle' => $pageTitle,
    'breadcrumb' => $breadcrumb,
])

<section class="kp-inner">
    <div class="kp-container kp-inner__grid">
        <article class="kp-card-box kp-prose">
            @if($icerik->resim)
            <figure class="kp-detail-hero">
                <img src="{{ asset($icerik->resim) }}" alt="{{ strip_tags($icerik->baslik) }}">
            </figure>
            @endif
            <div class="kp-prose__body">
                {!! $icerik->icerik !!}
            </div>
            @if($icerik->created_at)
            <p class="kp-detail-meta"><i class="fa-regular fa-calendar"></i> {{ $icerik->created_at->format('d.m.Y') }}</p>
            @endif
        </article>
        <aside class="kp-inner__aside">
            <div class="kp-card-box kp-aside-cta">
                <h3>Proje teklifi</h3>
                <p>İskele ihtiyacınız için mühendislik ekibimizle iletişime geçin.</p>
                <a href="{{ route('iletisim') }}" class="kp-btn kp-btn--cta" style="width:100%">Teklif Alın</a>
                <a href="tel:{{ preg_replace('/\s+/', '', $ayar->telefon ?? '') }}" class="kp-btn kp-btn--outline" style="width:100%;margin-top:8px">
                    <i class="fa-solid fa-phone"></i> Ara
                </a>
            </div>
        </aside>
    </div>
</section>
@endsection
