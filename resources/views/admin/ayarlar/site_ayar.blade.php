@extends('admin.template')

@section('page_title', 'Site Ayarları')
@section('page_subtitle', 'Genel iletişim ve SEO bilgileri')
@section('breadcrumb')
    <li class="active">Site Ayarları</li>
@endsection

@section('icerik')
{!! Form::model($ayarlar, ['route' => ['ayarlar.update', 1], 'method' => 'PUT', 'files' => true]) !!}
@include('admin.partials.card-start', ['cardTitle' => 'Genel Ayarlar', 'cardIcon' => 'fa-cog'])

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Site başlığı</label>
            <input type="text" class="form-control" name="baslik" value="{{ old('baslik', $ayarlar->baslik) }}">
        </div>
        <div class="form-group">
            <label>Site açıklaması</label>
            <input type="text" class="form-control" name="aciklama" value="{{ old('aciklama', $ayarlar->aciklama) }}">
        </div>
        <div class="form-group">
            <label>Etiketler (SEO)</label>
            <input type="text" class="form-control" name="etiket" value="{{ old('etiket', $ayarlar->etiket) }}">
            <p class="help-block">Virgülle ayırın.</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>E-posta</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $ayarlar->email) }}">
        </div>
        <div class="form-group">
            <label>Adres</label>
            <input type="text" class="form-control" name="adres" value="{{ old('adres', $ayarlar->adres) }}">
        </div>
    </div>
</div>

<hr class="kp-hr">
<h4 class="kp-section-title"><i class="fa fa-phone"></i> Telefon &amp; Fax</h4>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Telefon 1</label>
            <input type="text" class="form-control" name="telefon" value="{{ old('telefon', $ayarlar->telefon) }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Telefon 2</label>
            <input type="text" class="form-control" name="telefon2" value="{{ old('telefon2', $ayarlar->telefon2) }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Telefon 3</label>
            <input type="text" class="form-control" name="telefon3" value="{{ old('telefon3', $ayarlar->telefon3) }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Fax</label>
            <input type="text" class="form-control" name="fax" value="{{ old('fax', $ayarlar->fax) }}">
        </div>
    </div>
</div>

<hr class="kp-hr">
<h4 class="kp-section-title"><i class="fa fa-share-alt"></i> Sosyal medya</h4>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Facebook</label>
            <input type="url" class="form-control" name="facebook" value="{{ old('facebook', $ayarlar->facebook) }}" placeholder="https://">
        </div>
        <div class="form-group">
            <label>Instagram</label>
            <input type="url" class="form-control" name="instagram" value="{{ old('instagram', $ayarlar->instagram) }}" placeholder="https://">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Twitter / X</label>
            <input type="url" class="form-control" name="twitter" value="{{ old('twitter', $ayarlar->twitter) }}" placeholder="https://">
        </div>
        <div class="form-group">
            <label>YouTube</label>
            <input type="url" class="form-control" name="youtube" value="{{ old('youtube', $ayarlar->youtube) }}" placeholder="https://">
        </div>
    </div>
</div>

@include('admin.partials.card-end', ['footer' => view('admin.partials.form-actions', ['cancelUrl' => route('yonetim.index'), 'submitText' => 'Ayarları Kaydet'])->render()])
{!! Form::close() !!}
@endsection
