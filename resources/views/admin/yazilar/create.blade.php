@extends('admin.template')

@section('page_title', 'Yeni İçerik')
@section('page_subtitle', 'Haber, ürün veya hizmet kaydı oluşturun')
@section('breadcrumb')
    <li><a href="{{ route('yazilar.index') }}">İçerikler</a></li>
    <li class="active">Yeni</li>
@endsection

@section('icerik')
{!! Form::open(['route' => 'yazilar.store', 'method' => 'POST', 'files' => true]) !!}
@include('admin.partials.card-start', ['cardTitle' => 'İçerik Bilgileri', 'cardIcon' => 'fa-plus'])

<p class="help-block" style="margin-top:0">Ana sayfa slider için <a href="{{ route('sliderler.index') }}">Slider menüsünü</a> kullanın.</p>

<label class="control-label">Kategoriler</label>
<div class="kp-check-grid">
    @foreach($kategoriler as $kategori)
        <label class="kp-check-item">
            <input type="checkbox" name="kategori[]" value="{{ $kategori->id }}"> {{ $kategori->baslik }}
        </label>
    @endforeach
</div>

<div class="form-group">
    <label>Başlık <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="baslik" required maxlength="255" value="{{ old('baslik') }}">
</div>

<div class="form-group">
    <label>İçerik <span class="text-danger">*</span></label>
    <textarea name="icerik" class="form-control" id="icerik" rows="12" required>{{ old('icerik') }}</textarea>
</div>

<div class="form-group">
    <label>Kapak Görseli</label>
    <input type="file" class="form-control" name="resim" accept="image/*">
    <p class="help-block">JPG veya PNG, önerilen genişlik 1200px+</p>
</div>

@include('admin.partials.card-end', ['footer' => view('admin.partials.form-actions', ['cancelUrl' => route('yazilar.index'), 'submitText' => 'Kaydet'])->render()])
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
<script>CKEDITOR.replace('icerik', { height: 320 });</script>
@endsection
