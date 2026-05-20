@php
    $pageTitle = $pageTitle ?? '';
    $pageLead = $pageLead ?? '';
    $breadcrumb = $breadcrumb ?? [];
@endphp
<section class="kp-page-hero">
    <div class="kp-page-hero__bg" aria-hidden="true"></div>
    <div class="kp-container">
        @if(count($breadcrumb))
        <nav class="kp-breadcrumb" aria-label="Breadcrumb">
            @foreach($breadcrumb as $i => $crumb)
                @if($i > 0)<span class="kp-breadcrumb__sep">/</span>@endif
                @if(!empty($crumb['url']) && $i < count($breadcrumb) - 1)
                    <a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a>
                @else
                    <span>{{ $crumb['label'] }}</span>
                @endif
            @endforeach
        </nav>
        @endif
        <h1 class="kp-page-hero__title">{{ $pageTitle }}</h1>
        @if($pageLead)<p class="kp-page-hero__lead">{{ $pageLead }}</p>@endif
    </div>
</section>
