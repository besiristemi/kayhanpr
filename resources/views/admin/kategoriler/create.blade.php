@extends('admin.template')

@section('page_title', 'Yeni Kategori')
@section('breadcrumb')
    <li><a href="{{ route('kategoriler.index') }}">Kategoriler</a></li>
    <li class="active">Yeni</li>
@endsection

@section('icerik')
{!! Form::open(['route' => 'kategoriler.store', 'method' => 'POST']) !!}
@include('admin.partials.card-start', ['cardTitle' => 'Kategori Ekle', 'cardIcon' => 'fa-plus'])

<div class="form-group">
    <label>Üst kategori</label>
    <select class="form-control" name="ust_id">
        <option value="">— Ana kategori —</option>
        @foreach($kategoriler as $kategori)
            <option value="{{ $kategori->id }}">{{ $kategori->baslik }}</option>
        @endforeach
    </select>
    <p class="help-block">Alt kategori oluşturuyorsanız üst kategoriyi seçin.</p>
</div>

<div class="form-group">
    <label>Başlık <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="baslik" required value="{{ old('baslik') }}">
</div>

<div class="form-group">
    <label>Açıklama <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="aciklama" required value="{{ old('aciklama') }}">
</div>

@include('admin.partials.card-end', ['footer' => view('admin.partials.form-actions', ['cancelUrl' => route('kategoriler.index')])->render()])
{!! Form::close() !!}
@endsection
