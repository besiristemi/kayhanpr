@extends('kayhanpr.layouts.app')

@section('title', 'Hakkımızda')

@section('content')
@include('kayhanpr.partials.page-hero', [
    'pageTitle' => 'Hakkımızda',
    'pageLead' => 'Kurumsal kimlik, misyon ve kalite politikamız.',
    'breadcrumb' => [['label' => 'Ana Sayfa', 'url' => url('/')], ['label' => 'Hakkımızda']],
])
<section class="kp-inner">
    <div class="kp-container">
        <article class="kp-card-box kp-about-intro">
            {!! $hakkimizda->aciklama !!}
        </article>

        <section id="misyonvizyon" class="kp-about-mvv">
            <h2 class="kp-about-heading">Misyon, Vizyon &amp; Kalite</h2>
            <div class="kp-about-mvv__grid">
                @if(!empty($hakkimizda->misyon))
                <div class="kp-card-box">
                    <h3>Misyonumuz</h3>
                    <div>{!! $hakkimizda->misyon !!}</div>
                </div>
                @endif
                @if(!empty($hakkimizda->vizyon))
                <div class="kp-card-box">
                    <h3>Vizyonumuz</h3>
                    <div>{!! $hakkimizda->vizyon !!}</div>
                </div>
                @endif
                @if(!empty($hakkimizda->kalite))
                <div class="kp-card-box">
                    <h3>Kalite Politikamız</h3>
                    <div>{!! $hakkimizda->kalite !!}</div>
                </div>
                @endif
            </div>
        </section>

        <section id="belgelerimiz" class="kp-about-docs">
            <h2 class="kp-about-heading">Belgelerimiz</h2>
            <div class="kp-about-docs__grid">
                @foreach(['resim1', 'resim2', 'resim3', 'resim4'] as $resim)
                    @if(!empty($hakkimizda->$resim))
                    <a href="{{ asset($hakkimizda->$resim) }}" class="kp-about-doc" target="_blank" rel="noopener">
                        <img src="{{ asset($hakkimizda->$resim) }}" alt="Belge" loading="lazy">
                    </a>
                    @endif
                @endforeach
                @for($i = 1; $i <= 5; $i++)
                <a href="{{ asset('assets/images/belgeler/ser'.$i.'.jpg') }}" class="kp-about-doc" target="_blank" rel="noopener">
                    <img src="{{ asset('assets/images/belgeler/ser'.$i.'.jpg') }}" alt="Sertifika {{ $i }}" loading="lazy">
                </a>
                @endfor
            </div>
        </section>
    </div>
</section>
@endsection

@push('styles')
<style>
.kp-about-intro { margin-bottom: 2rem; }
.kp-about-heading {
    margin: 0 0 1rem;
    font-size: 1.15rem;
    font-weight: 800;
    color: var(--navy);
}
.kp-about-mvv { margin-bottom: 2.5rem; }
.kp-about-mvv__grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 12px;
}
.kp-about-mvv h3 {
    margin: 0 0 0.5rem;
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--blue);
}
.kp-about-mvv p { margin: 0; font-size: 0.875rem; color: #4a5f78; line-height: 1.6; }
.kp-about-docs__grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
    gap: 12px;
}
.kp-about-doc {
    display: block;
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid rgba(12, 21, 36, 0.08);
    transition: transform 0.2s, box-shadow 0.2s;
}
.kp-about-doc:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(12, 21, 36, 0.1); }
.kp-about-doc img { width: 100%; aspect-ratio: 3/4; object-fit: cover; }
</style>
@endpush
