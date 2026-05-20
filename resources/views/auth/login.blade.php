<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Yönetim Girişi | Kayhan Prodüksiyon</title>
    <link rel="stylesheet" href="/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <style>
        body { margin:0; min-height:100vh; display:flex; align-items:center; justify-content:center; font-family:Segoe UI,Tahoma,sans-serif; background:linear-gradient(135deg,#152238 0%,#1e3354 45%,#4A76B2 100%); padding:20px; }
        .kp-login-wrap { width:100%; max-width:420px; }
        .kp-login { background:#fff; border-radius:14px; box-shadow:0 20px 50px rgba(0,0,0,.25); overflow:hidden; }
        .kp-login__head { background:#152238; color:#fff; padding:28px 30px 22px; text-align:center; }
        .kp-login__head h1 { margin:0 0 6px; font-size:22px; font-weight:700; }
        .kp-login__head p { margin:0; opacity:.85; font-size:13px; }
        .kp-login__body { padding:28px 30px 30px; }
        .form-group { margin-bottom:18px; }
        .form-group label { display:block; margin-bottom:6px; font-weight:600; font-size:13px; color:#334155; }
        .form-control { height:44px; border-radius:8px; border:1px solid #cbd5e1; }
        .form-control:focus { border-color:#4A76B2; box-shadow:0 0 0 3px rgba(74,118,178,.2); }
        .btn-login { width:100%; height:46px; border:0; border-radius:8px; background:#4A76B2; color:#fff; font-weight:700; font-size:15px; }
        .alert { border-radius:8px; font-size:13px; margin-bottom:16px; }
        .kp-login__secure { margin-top:16px; padding-top:14px; border-top:1px solid #e2e8f0; font-size:12px; color:#64748b; }
        .remember-row { display:flex; align-items:center; gap:8px; margin-bottom:18px; font-size:13px; color:#475569; }
        .back-site { display:block; text-align:center; margin-top:18px; font-size:13px; color:rgba(255,255,255,.9); }
    </style>
</head>
<body>
    <div class="kp-login-wrap">
        <div class="kp-login">
            <div class="kp-login__head">
                <h1>Kayhan Prodüksiyon</h1>
                <p>Web Yönetim Paneli</p>
            </div>
            <div class="kp-login__body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="email">E-posta</label>
                        <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Şifre</label>
                        <input id="password" type="password" name="password" class="form-control" required>
                    </div>
                    <label class="remember-row">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Beni hatırla
                    </label>
                    <button type="submit" class="btn-login"><i class="fa fa-sign-in"></i> Giriş Yap</button>
                </form>
                <div class="kp-login__secure"><i class="fa fa-shield"></i> Güvenlik: 3 hatalı denemeden sonra hesap 30 dakika kilitlenir.</div>
            </div>
        </div>
        <a href="{{ url('/') }}" class="back-site"><i class="fa fa-arrow-left"></i> Siteye dön</a>
    </div>
</body>
</html>

