@extends('kayhanpr.layouts.app')

@section('title', 'Ürünlerimiz')
@section('meta_description', 'Kayhan Prodüksiyon çelik iskele sistemleri ve ürün portföyü.')

@section('content')
@include('kayhanpr.partials.page-hero', [
    'pageTitle' => 'Ürünlerimiz',
    'pageLead' => 'Çelik iskele sistemleri, modüler çözümler ve proje bazlı üretim.',
    'breadcrumb' => [
        ['label' => 'Ana Sayfa', 'url' => url('/')],
        ['label' => 'Ürünlerimiz'],
    ],
])

<section class="kp-inner">
    <div class="kp-container">
        @if($urunler->count())
        <div class="kp-grid kp-grid--3">
            @foreach($urunler as $urun)
            <a href="{{ route('urundetay.goster', ['id' => $urun->id, 'slug' => $urun->slug]) }}" class="kp-card-link">
                <article class="kp-prod-card">
                    <div class="kp-prod-card__img">
                        <img src="{{ asset($urun->resim) }}" alt="{{ strip_tags($urun->baslik) }}" loading="lazy">
                    </div>
                    <div class="kp-prod-card__body">
                        <h3>{{ $urun->baslik }}</h3>
                        <span>Detay <i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </article>
            </a>
            @endforeach
        </div>
        @else
        <p class="kp-empty-msg">Henüz ürün eklenmemiş.</p>
        @endif
    </div>
</section>
@endsection
