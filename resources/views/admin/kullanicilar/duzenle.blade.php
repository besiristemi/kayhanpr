@extends('admin.template')

@section('page_title', 'Kullanıcı Düzenle')
@section('page_subtitle', $kullanici->adsoyad)
@section('breadcrumb')
    <li><a href="{{ route('kullanici.index') }}">Kullanıcılar</a></li>
    <li class="active">Düzenle</li>
@endsection

@section('icerik')
<form method="POST" action="{{ route('kullanici.guncelle', $kullanici->id) }}">
    @csrf
    @include('admin.partials.card-start', ['cardTitle' => 'Kullanıcı Güncelle', 'cardIcon' => 'fa-pencil'])

    <div class="form-group">
        <label>Yetki <span class="text-danger">*</span></label>
        <select class="form-control" name="yetki" required>
            <option value="admin" {{ old('yetki', $kullanici->yetki) === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="anons" {{ old('yetki', $kullanici->yetki) === 'anons' ? 'selected' : '' }}>Anons görevlisi</option>
        </select>
    </div>

    <div class="form-group">
        <label>Ad Soyad <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="adsoyad" required value="{{ old('adsoyad', $kullanici->adsoyad) }}">
    </div>

    <div class="form-group">
        <label>E-posta <span class="text-danger">*</span></label>
        <input type="email" class="form-control" name="email" required value="{{ old('email', $kullanici->email) }}">
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Yeni şifre</label>
                <input type="password" class="form-control" name="password">
                <p class="help-block">Boş bırakırsanız şifre değişmez.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Şifre tekrar</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
        </div>
    </div>

    @include('admin.partials.card-end', ['footer' => view('admin.partials.form-actions', ['cancelUrl' => route('kullanici.index'), 'submitText' => 'Güncelle'])->render()])
</form>
@endsection
