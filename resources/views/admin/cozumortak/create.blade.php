@extends('admin.template')

@section('page_title', 'Yeni Çözüm Ortağı')
@section('breadcrumb')
    <li><a href="{{ route('cozumortak.index') }}">Çözüm Ortakları</a></li>
    <li class="active">Yeni</li>
@endsection

@section('icerik')
{!! Form::open(['route' => 'cozumortak.store', 'method' => 'POST', 'files' => true]) !!}
@include('admin.partials.card-start', ['cardTitle' => 'Logo Ekle', 'cardIcon' => 'fa-plus'])

<div class="form-group">
    <label>Başlık / Firma adı <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="baslik" required value="{{ old('baslik') }}">
</div>

<div class="form-group">
    <label>Logo görseli <span class="text-danger">*</span></label>
    <input type="file" class="form-control" name="resim" accept="image/*" required>
    <p class="help-block">PNG veya JPG, şeffaf arka plan önerilir.</p>
</div>

@include('admin.partials.card-end', ['footer' => view('admin.partials.form-actions', ['cancelUrl' => route('cozumortak.index')])->render()])
{!! Form::close() !!}
@endsection
