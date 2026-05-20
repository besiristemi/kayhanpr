@extends('kayhanpr.layouts.app')

@section('title', 'Katalog')

@section('content')
<section class="kp-page">
    <div class="kp-container">
        <h1>Katalog</h1>
        <p style="color:#6b7c93;margin:-0.5rem 0 1.5rem">PDF katalogları kitap formatında inceleyin.</p>

        @if($kataloglar->isEmpty())
        <div class="kp-cta" style="flex-direction:column;text-align:center">
            <p style="margin:0;color:var(--text-muted)">Henüz katalog eklenmedi.</p>
            @if(!empty($anahakkimizda->katalog))
            <a href="/{{ $anahakkimizda->katalog }}" class="kp-btn kp-btn--cta" target="_blank" style="margin-top:1rem">Mevcut PDF</a>
            @endif
        </div>
        @else
        <div class="kp-catalog-grid">
            @foreach($kataloglar as $kat)
            <a href="{{ route('katalog.show', $kat->slug) }}" class="kp-catalog-card">
                <div style="aspect-ratio:3/4;background:linear-gradient(145deg,#0c1524,#4a76b2);display:grid;place-items:center;color:#fff;font-size:2.5rem">
                    <i class="fa-solid fa-book"></i>
                </div>
                <div style="padding:1rem">
                    <h2 style="margin:0 0 0.35rem;font-size:1rem">{{ $kat->baslik }}</h2>
                    <span class="kp-btn kp-btn--cta kp-btn--sm">Aç</span>
                </div>
            </a>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endsection
