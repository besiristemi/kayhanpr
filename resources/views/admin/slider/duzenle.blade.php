@extends('admin.template')

@section('page_title', 'Slider Düzenle')
@section('page_subtitle', $slider->baslik)
@section('breadcrumb')
    <li><a href="{{ route('sliderler.index') }}">Slider</a></li>
    <li class="active">Düzenle</li>
@endsection

@section('icerik')
{!! Form::model($slider, ['route' => ['sliderler.update', $slider->id], 'method' => 'PUT', 'files' => true]) !!}
@include('admin.partials.card-start', ['cardTitle' => 'Slayt Düzenle', 'cardIcon' => 'fa-pencil'])

<div class="form-group">
    <label>Başlık <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="baslik" required value="{{ old('baslik', $slider->baslik) }}">
</div>

<div class="form-group">
    <label>Alt metin</label>
    <textarea name="icerik" class="form-control" rows="4">{{ old('icerik', $slider->icerik) }}</textarea>
</div>

@if($slider->resim)
<div class="form-group">
    <label>Mevcut görsel</label>
    <img src="{{ asset($slider->resim) }}" alt="" class="kp-img-preview" style="max-width:100%;max-height:180px;">
</div>
@endif

<div class="form-group">
    <label>Yeni görsel (isteğe bağlı)</label>
    <input type="file" class="form-control" name="resim" accept="image/*">
</div>

@include('admin.partials.card-end', ['footer' => view('admin.partials.form-actions', ['cancelUrl' => route('sliderler.index'), 'submitText' => 'Güncelle'])->render()])
{!! Form::close() !!}
@endsection
