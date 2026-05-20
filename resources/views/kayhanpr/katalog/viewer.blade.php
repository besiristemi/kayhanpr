@extends('kayhanpr.layouts.app')

@section('title', $katalog->meta_title ?? $katalog->baslik)
@section('meta_description', $katalog->meta_description ?? $katalog->aciklama)
@section('meta_keywords', $katalog->meta_keywords ?? '')

@section('content')
<section class="kp-flipbook-page">
    <div class="kp-container">
        <div class="kp-flipbook-toolbar">
            <div>
                <a href="{{ route('katalog.index') }}" class="kp-btn kp-btn--primary kp-btn--sm"><i class="fa-solid fa-arrow-left"></i> Kataloglar</a>
                <h1 style="margin:0.5rem 0 0;font-size:1.35rem">{{ $katalog->baslik }}</h1>
            </div>
            <div style="display:flex;gap:0.5rem;flex-wrap:wrap">
                <button type="button" id="kp-flip-prev" class="kp-btn kp-btn--primary kp-btn--sm"><i class="fa-solid fa-chevron-left"></i> Önceki</button>
                <button type="button" id="kp-flip-next" class="kp-btn kp-btn--primary kp-btn--sm">Sonraki <i class="fa-solid fa-chevron-right"></i></button>
                <a href="{{ asset($katalog->pdf_path) }}" class="kp-btn kp-btn--primary kp-btn--sm" target="_blank" rel="noopener" download><i class="fa-solid fa-download"></i> PDF İndir</a>
            </div>
        </div>
        <div class="kp-flipbook-wrap">
            <div id="kp-flipbook-loading" class="kp-flipbook-loading">
                <i class="fa-solid fa-spinner fa-spin" style="font-size:2rem;color:var(--kp-blue)"></i>
                <p>Katalog yükleniyor…</p>
            </div>
            <div id="kp-flipbook" data-pdf="{{ asset($katalog->pdf_path) }}"></div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/page-flip@2.0.7/dist/js/page-flip.browser.js"></script>
<script src="{{ asset('kayhan/js/flipbook.js') }}?v=1"></script>
@endpush
