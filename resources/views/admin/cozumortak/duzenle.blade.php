@extends('admin.template')

@section('page_title', 'Çözüm Ortağı Düzenle')
@section('page_subtitle', $cozumortak->baslik)
@section('breadcrumb')
    <li><a href="{{ route('cozumortak.index') }}">Çözüm Ortakları</a></li>
    <li class="active">Düzenle</li>
@endsection

@section('icerik')
{!! Form::model($cozumortak, ['route' => ['cozumortak.update', $cozumortak->id], 'method' => 'PUT', 'files' => true]) !!}
@include('admin.partials.card-start', ['cardTitle' => 'Logo Düzenle', 'cardIcon' => 'fa-pencil'])

<div class="form-group">
    <label>Başlık <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="baslik" required value="{{ old('baslik', $cozumortak->baslik) }}">
</div>

@if($cozumortak->resim)
<div class="form-group">
    <label>Mevcut logo</label>
    <div><img src="/{{ $cozumortak->resim }}" alt="" class="kp-preview-img"></div>
</div>
@endif

<div class="form-group">
    <label>Yeni logo (isteğe bağlı)</label>
    <input type="file" class="form-control" name="resim" accept="image/*">
</div>

@include('admin.partials.card-end', ['footer' => view('admin.partials.form-actions', ['cancelUrl' => route('cozumortak.index'), 'submitText' => 'Güncelle'])->render()])
{!! Form::close() !!}
@endsection
