@extends('admin.template')

@section('page_title', 'Yeni Kullanıcı')
@section('breadcrumb')
    <li><a href="{{ route('kullanici.index') }}">Kullanıcılar</a></li>
    <li class="active">Yeni</li>
@endsection

@section('icerik')
<form method="POST" action="{{ route('kullanici.kayit') }}">
    @csrf
    @include('admin.partials.card-start', ['cardTitle' => 'Kullanıcı Ekle', 'cardIcon' => 'fa-user-plus'])

    <div class="form-group">
        <label>Yetki <span class="text-danger">*</span></label>
        <select class="form-control" name="yetki" required>
            <option value="">Seçiniz</option>
            <option value="admin" {{ old('yetki') === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="anons" {{ old('yetki') === 'anons' ? 'selected' : '' }}>Anons görevlisi</option>
        </select>
    </div>

    <div class="form-group">
        <label>Ad Soyad <span class="text-danger">*</span></label>
        <input type="text" class="form-control{{ $errors->has('adsoyad') ? ' is-invalid' : '' }}" name="adsoyad" required value="{{ old('adsoyad') }}">
        @error('adsoyad')<span class="help-block text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label>E-posta (giriş) <span class="text-danger">*</span></label>
        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required value="{{ old('email') }}">
        @error('email')<span class="help-block text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Şifre <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password" required>
                @error('password')<span class="help-block text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Şifre tekrar <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>
    </div>

    @include('admin.partials.card-end', ['footer' => view('admin.partials.form-actions', ['cancelUrl' => route('kullanici.index')])->render()])
</form>
@endsection
