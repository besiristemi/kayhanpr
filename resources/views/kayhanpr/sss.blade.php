@extends('kayhanpr.layouts.app')

@section('title', 'Sıkça Sorulan Sorular')

@section('content')
@include('kayhanpr.partials.page-hero', [
    'pageTitle' => 'Sıkça Sorulan Sorular',
    'breadcrumb' => [
        ['label' => 'Ana Sayfa', 'url' => url('/')],
        ['label' => 'S.S.S.'],
    ],
])
<section class="kp-inner">
    <div class="kp-container" style="max-width:720px">
        <div class="kp-faq">
            @foreach($tumsorular as $soru)
            <details class="kp-faq__item">
                <summary>{{ $soru->soru }}</summary>
                <div class="kp-faq__ans">{!! $soru->cevap !!}</div>
            </details>
            @endforeach
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.kp-faq__item {
    background: #fff;
    border: 1px solid rgba(12, 21, 36, 0.08);
    border-radius: 10px;
    margin-bottom: 8px;
    overflow: hidden;
}
.kp-faq__item summary {
    padding: 1rem 1.15rem;
    font-weight: 600;
    cursor: pointer;
    list-style: none;
}
.kp-faq__item summary::-webkit-details-marker { display: none; }
.kp-faq__ans { padding: 0 1.15rem 1rem; font-size: 0.875rem; color: #4a5f78; line-height: 1.65; }
</style>
@endpush
