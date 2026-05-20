@php
    $cardTitle = $cardTitle ?? '';
    $cardIcon = $cardIcon ?? 'fa-file-text-o';
@endphp
<div class="kp-card box">
    <div class="box-header with-border kp-card__head">
        <h3 class="box-title"><i class="fa {{ $cardIcon }}"></i> {{ $cardTitle }}</h3>
        @if(!empty($headerRight))
            <div class="box-tools pull-right">{!! $headerRight !!}</div>
        @endif
    </div>
    <div class="box-body kp-card__body">
