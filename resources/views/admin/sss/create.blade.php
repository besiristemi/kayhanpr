@extends('admin.template')

@section('page_title', 'Yeni Soru')
@section('breadcrumb')
    <li><a href="{{ route('sorular.index') }}">SSS</a></li>
    <li class="active">Yeni</li>
@endsection

@section('icerik')
{!! Form::open(['route' => 'sorular.store', 'method' => 'POST']) !!}
@include('admin.partials.card-start', ['cardTitle' => 'Soru Ekle', 'cardIcon' => 'fa-plus'])

<div class="form-group">
    <label>Soru <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="soru" required value="{{ old('soru') }}">
</div>

<div class="form-group">
    <label>Cevap</label>
    <textarea name="cevap" id="cevap" class="form-control" rows="8">{{ old('cevap') }}</textarea>
</div>

@include('admin.partials.card-end', ['footer' => view('admin.partials.form-actions', ['cancelUrl' => route('sorular.index')])->render()])
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
<script>CKEDITOR.replace('cevap', { height: 220 });</script>
@endsection
