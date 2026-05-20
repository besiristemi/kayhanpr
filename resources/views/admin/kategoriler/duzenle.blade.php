@extends('admin.template')

@section('page_title', 'Kategori Düzenle')
@section('page_subtitle', $kategori->baslik)
@section('breadcrumb')
    <li><a href="{{ route('kategoriler.index') }}">Kategoriler</a></li>
    <li class="active">Düzenle</li>
@endsection

@section('icerik')
{!! Form::model($kategori, ['route' => ['kategoriler.update', $kategori->id], 'method' => 'PUT']) !!}
@include('admin.partials.card-start', ['cardTitle' => 'Kategori Düzenle', 'cardIcon' => 'fa-pencil'])

<div class="form-group">
    <label>Üst kategori</label>
    <select class="form-control" name="ust_id">
        <option value="">— Ana kategori —</option>
        @foreach($tumkategoriler as $tumkategori)
            <option value="{{ $tumkategori->id }}" {{ (string) $tumkategori->id === (string) old('ust_id', $kategori->ust_id) ? 'selected' : '' }}>
                {{ $tumkategori->baslik }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Başlık <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="baslik" required value="{{ old('baslik', $kategori->baslik) }}">
</div>

<div class="form-group">
    <label>Açıklama <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="aciklama" required value="{{ old('aciklama', $kategori->aciklama) }}">
</div>

@include('admin.partials.card-end', ['footer' => view('admin.partials.form-actions', ['cancelUrl' => route('kategoriler.index'), 'submitText' => 'Güncelle'])->render()])
{!! Form::close() !!}
@endsection
