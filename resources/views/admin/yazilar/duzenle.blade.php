@extends('admin.template')

@section('page_title', 'İçerik Düzenle')
@section('page_subtitle', $yazi->baslik)
@section('breadcrumb')
    <li><a href="{{ route('yazilar.index') }}">İçerikler</a></li>
    <li class="active">Düzenle</li>
@endsection

@section('icerik')
@php $seciliKategoriler = array_filter(explode(',', (string) $yazi->kategori)); @endphp
{!! Form::model($yazi, ['route' => ['yazilar.update', $yazi->id], 'method' => 'PUT', 'files' => true]) !!}
@include('admin.partials.card-start', ['cardTitle' => 'İçerik Düzenle', 'cardIcon' => 'fa-pencil'])

<label class="control-label">Kategoriler</label>
<div class="kp-check-grid">
    @foreach($kategoriler as $kategori)
        <label class="kp-check-item">
            <input type="checkbox" name="kategori[]" value="{{ $kategori->id }}"
                {{ in_array((string) $kategori->id, $seciliKategoriler, true) ? 'checked' : '' }}>
            {{ $kategori->baslik }}
        </label>
    @endforeach
</div>

<div class="form-group">
    <label>Başlık <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="baslik" required value="{{ old('baslik', $yazi->baslik) }}">
</div>

<div class="form-group">
    <label>İçerik <span class="text-danger">*</span></label>
    <textarea name="icerik" id="icerik" class="form-control" rows="12" required>{{ old('icerik', $yazi->icerik) }}</textarea>
</div>

@if($yazi->resim)
<div class="form-group">
    <label>Mevcut Görsel</label>
    <img src="{{ asset($yazi->resim) }}" alt="" class="kp-img-preview">
</div>
@endif

<div class="form-group">
    <label>Yeni Görsel (isteğe bağlı)</label>
    <input type="file" class="form-control" name="resim" accept="image/*">
</div>

@include('admin.partials.card-end', ['footer' => view('admin.partials.form-actions', ['cancelUrl' => route('yazilar.index'), 'submitText' => 'Güncelle'])->render()])
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
<script>CKEDITOR.replace('icerik', { height: 320 });</script>
@endsection
