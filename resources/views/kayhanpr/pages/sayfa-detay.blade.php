@extends('kayhanpr.layouts.app')

@section('title', $pageTitle)

@section('content')
@include('kayhanpr.partials.page-hero', [
    'pageTitle' => $pageTitle,
    'breadcrumb' => $breadcrumb,
])

<section class="kp-inner">
    <div class="kp-container" style="max-width:900px">
        <article class="kp-card-box kp-prose">
            <div class="kp-prose__body">{!! $sayfa->icerik !!}</div>
        </article>
    </div>
</section>
@endsection
