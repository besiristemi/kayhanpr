@extends('admin.template')

@section('page_title', 'Yeni Sayfa')
@section('breadcrumb')
    <li><a href="{{ route('sayfalar.index') }}">Sayfalar</a></li>
    <li class="active">Yeni</li>
@endsection

@section('icerik')
{!! Form::open(['route' => 'sayfalar.store', 'method' => 'POST']) !!}
@include('admin.partials.card-start', ['cardTitle' => 'Sayfa Ekle', 'cardIcon' => 'fa-plus'])

<div class="form-group">
    <label>Üst sayfa</label>
    <select class="form-control" name="ust_id">
        <option value="">— Üst sayfa —</option>
        @foreach($sayfalar as $ust)
            <option value="{{ $ust->id }}">{{ $ust->baslik }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Başlık <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="baslik" required value="{{ old('baslik') }}">
</div>

<div class="form-group">
    <label>İçerik <span class="text-danger">*</span></label>
    <textarea name="icerik" id="icerik" class="form-control" rows="12" required>{{ old('icerik') }}</textarea>
</div>

@include('admin.partials.card-end', ['footer' => view('admin.partials.form-actions', ['cancelUrl' => route('sayfalar.index')])->render()])
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
<script>CKEDITOR.replace('icerik', { height: 300 });</script>
@endsection
