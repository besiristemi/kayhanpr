@extends('kayhanpr.layouts.app')

@section('title', 'Çözüm Ortakları')
@section('meta_description', 'Kayhan Prodüksiyon iş ortakları ve referansları.')

@section('content')
@include('kayhanpr.partials.page-hero', [
    'pageTitle' => 'Çözüm Ortakları',
    'pageLead' => 'Güvenilir iş ortaklarımız ve referans markalar.',
    'breadcrumb' => [
        ['label' => 'Ana Sayfa', 'url' => url('/')],
        ['label' => 'Çözüm Ortakları'],
    ],
])

<section class="kp-inner">
    <div class="kp-container">
        @if($ortaklar->count())
        <div class="kp-partners">
            @foreach($ortaklar as $ortak)
            <article class="kp-partner">
                @if($ortak->resim)
                <img src="/{{ $ortak->resim }}" alt="{{ $ortak->baslik }}" loading="lazy">
                @endif
                <span>{{ $ortak->baslik }}</span>
            </article>
            @endforeach
        </div>
        @else
        <p class="kp-empty-msg">Henüz kayıt bulunmuyor.</p>
        @endif
    </div>
</section>
@endsection
