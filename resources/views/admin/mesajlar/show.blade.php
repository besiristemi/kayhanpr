@extends('admin.template')

@section('page_title', 'Mesaj Detayı')
@section('page_subtitle', $mesaj->adsoyad)
@section('breadcrumb')
    <li><a href="{{ route('mesajlar.index') }}">Mesajlar</a></li>
    <li class="active">Detay</li>
@endsection

@section('icerik')
@include('admin.partials.card-start', ['cardTitle' => 'Mesaj İçeriği', 'cardIcon' => 'fa-envelope-open'])

<dl class="kp-dl">
    <dt>Ad Soyad</dt>
    <dd>{{ $mesaj->adsoyad }}</dd>
    <dt>E-posta</dt>
    <dd><a href="mailto:{{ $mesaj->email }}">{{ $mesaj->email }}</a></dd>
    <dt>Konu</dt>
    <dd>{{ $mesaj->konu ?: '—' }}</dd>
    <dt>Tarih</dt>
    <dd>{{ $mesaj->created_at?->format('d.m.Y H:i') }}</dd>
    <dt>IP Adresi</dt>
    <dd>{{ $mesaj->ip_adresi ?: '—' }}</dd>
</dl>

<div class="form-group" style="margin-top:20px">
    <label class="control-label">Mesaj</label>
    <div class="kp-message-box">{!! nl2br(e($mesaj->mesaj)) !!}</div>
</div>

@php ob_start(); @endphp
<a href="{{ route('mesajlar.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Listeye Dön</a>
{!! Form::open(['route' => ['mesajlar.destroy', $mesaj->id], 'method' => 'DELETE', 'style' => 'display:inline;margin-left:8px']) !!}
<button type="submit" class="btn btn-danger" onclick="return confirm('Mesaj silinsin mi?')"><i class="fa fa-trash"></i> Sil</button>
{!! Form::close() !!}
@php $footer = ob_get_clean(); @endphp

@include('admin.partials.card-end', ['footer' => $footer])
@endsection
