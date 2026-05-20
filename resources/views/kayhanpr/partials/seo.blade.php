@php
    $siteName = $ayar->baslik ?? 'Kayhan Prodüksiyon İskele Sistemleri';
    $pageTitle = trim($__env->yieldContent('title'));
    $fullTitle = $pageTitle ? $pageTitle . ' | ' . $siteName : ($ayar->meta_title ?? $siteName);
    $description = trim($__env->yieldContent('meta_description')) ?: ($ayar->aciklama ?? 'Kayhan Prodüksiyon — çelik iskele sistemleri, kiralık iskele ve kalıp altı çözümleri. İsviçre ve Avrupa\'da profesyonel hizmet.');
    $keywords = trim($__env->yieldContent('meta_keywords')) ?: ($ayar->etiket ?? 'iskele sistemleri, iskele kiralama, çelik iskele, kayhan prodüksiyon, scaffolding');
    $canonical = trim($__env->yieldContent('canonical')) ?: url()->current();
    $ogImage = trim($__env->yieldContent('og_image')) ?: asset('kayhan/images/logo.svg');
    if (! str_starts_with($ogImage, 'http')) {
        $ogImage = url($ogImage);
    }
    $sameAs = array_values(array_filter([
        !empty($ayar->facebook) ? 'https://www.facebook.com/'.$ayar->facebook : null,
        !empty($ayar->instagram) ? 'https://www.instagram.com/'.$ayar->instagram : null,
        !empty($ayar->linkedin) ? 'https://www.linkedin.com/company/'.$ayar->linkedin : null,
        !empty($ayar->youtube) ? 'https://www.youtube.com/'.$ayar->youtube : null,
    ]));
    $schemaOrg = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'Kayhan Prodüksiyon',
        'alternateName' => 'Kayhan Prodüksiyon İskele Sistemleri',
        'url' => url('/'),
        'logo' => asset('kayhan/images/logo.svg'),
        'description' => Str::limit(strip_tags($description), 300),
        'email' => $ayar->email ?? 'info@kayhanproduksiyon.com',
        'telephone' => $ayar->telefon ?? '',
        'areaServed' => ['CH', 'DE', 'AT', 'TR', 'EU'],
        'knowsAbout' => ['Scaffolding systems', 'Steel scaffolding', 'Formwork'],
    ];
    if ($sameAs) {
        $schemaOrg['sameAs'] = $sameAs;
    }
@endphp
<title>{{ $fullTitle }}</title>
<meta name="description" content="{{ Str::limit(strip_tags($description), 160) }}">
<meta name="keywords" content="{{ $keywords }}">
<meta name="author" content="Kayhan Prodüksiyon">
<meta name="robots" content="index, follow, max-image-preview:large">
<link rel="canonical" href="{{ $canonical }}">

<meta property="og:type" content="website">
<meta property="og:locale" content="tr_TR">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:title" content="{{ $fullTitle }}">
<meta property="og:description" content="{{ Str::limit(strip_tags($description), 200) }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:site_name" content="{{ $siteName }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $fullTitle }}">
<meta name="twitter:description" content="{{ Str::limit(strip_tags($description), 200) }}">
<meta name="twitter:image" content="{{ $ogImage }}">

<link rel="alternate" hreflang="tr" href="{{ url('/') }}">
<link rel="alternate" hreflang="de-CH" href="{{ url('/') }}">
<link rel="alternate" hreflang="fr-CH" href="{{ url('/') }}">
<link rel="alternate" hreflang="it-CH" href="{{ url('/') }}">
<link rel="alternate" hreflang="en" href="{{ url('/') }}">
<link rel="alternate" hreflang="x-default" href="{{ url('/') }}">

<script type="application/ld+json">{!! json_encode($schemaOrg, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
@stack('structured-data')
