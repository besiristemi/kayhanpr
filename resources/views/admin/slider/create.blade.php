@extends('admin.template')

@section('page_title', 'Yeni Slider')
@section('page_subtitle', 'Anasayfa hero slaytı ekleyin')
@section('breadcrumb')
    <li><a href="{{ route('sliderler.index') }}">Slider</a></li>
    <li class="active">Yeni</li>
@endsection

@section('icerik')
{!! Form::open(['route' => 'sliderler.store', 'method' => 'POST', 'files' => true]) !!}
@include('admin.partials.card-start', ['cardTitle' => 'Slayt Bilgileri', 'cardIcon' => 'fa-plus'])

<div class="form-group">
    <label>Başlık <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="baslik" required maxlength="255" value="{{ old('baslik') }}" placeholder="Örn: Endüstriyel İskele Çözümleri">
</div>

<div class="form-group">
    <label>Alt metin</label>
    <textarea name="icerik" class="form-control" rows="4" placeholder="Hero alanında görünen kısa açıklama">{{ old('icerik') }}</textarea>
</div>

<div class="form-group">
    <label>Slayt görseli <span class="text-danger">*</span></label>
    <input type="file" class="form-control" name="resim" accept="image/*" required>
    <p class="help-block">Panoramik görsel önerilir (1920×700 px civarı)</p>
</div>

@include('admin.partials.card-end', ['footer' => view('admin.partials.form-actions', ['cancelUrl' => route('sliderler.index'), 'submitText' => 'Kaydet'])->render()])
{!! Form::close() !!}
@endsection
