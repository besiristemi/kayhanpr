@extends('admin.template')

@section('page_title', 'Sayfa Düzenle')
@section('page_subtitle', $sayfa->baslik)
@section('breadcrumb')
    <li><a href="{{ route('sayfalar.index') }}">Sayfalar</a></li>
    <li class="active">Düzenle</li>
@endsection

@section('icerik')
{!! Form::model($sayfa, ['route' => ['sayfalar.update', $sayfa->id], 'method' => 'PUT']) !!}
@include('admin.partials.card-start', ['cardTitle' => 'Sayfa Düzenle', 'cardIcon' => 'fa-pencil'])

<div class="form-group">
    <label>Üst sayfa</label>
    <select class="form-control" name="ust_id">
        <option value="">— Üst sayfa —</option>
        @foreach($tumsayfalar as $tumsayfa)
            @if($tumsayfa->id !== $sayfa->id)
                <option value="{{ $tumsayfa->id }}" {{ (string) $tumsayfa->id === (string) old('ust_id', $sayfa->ust_id) ? 'selected' : '' }}>
                    {{ $tumsayfa->baslik }}
                </option>
            @endif
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Başlık <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="baslik" required value="{{ old('baslik', $sayfa->baslik) }}">
</div>

<div class="form-group">
    <label>İçerik <span class="text-danger">*</span></label>
    <textarea name="icerik" id="icerik" class="form-control" rows="12" required>{!! old('icerik', $sayfa->icerik) !!}</textarea>
</div>

@include('admin.partials.card-end', ['footer' => view('admin.partials.form-actions', ['cancelUrl' => route('sayfalar.index'), 'submitText' => 'Güncelle'])->render()])
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
<script>CKEDITOR.replace('icerik', { height: 300 });</script>
@endsection
