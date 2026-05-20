<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Yönetim Paneli') | {{ $ayar->baslik ?? 'Kayhan Prodüksiyon' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/admin/dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="/admin/css/kayhan-admin.css?v=6">
    @yield('css')
</head>
<body class="hold-transition skin-blue fixed kp-admin">
<div class="wrapper">
    @include('admin.include.header')
    @include('admin.include.left-sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@yield('page_title', 'Yönetim Paneli')</h1>
            @hasSection('page_subtitle')
                <p class="kp-subtitle">@yield('page_subtitle')</p>
            @endif
            <ol class="breadcrumb">
                <li><a href="{{ route('yonetim.index') }}"><i class="fa fa-dashboard"></i> Panel</a></li>
                @yield('breadcrumb')
            </ol>
        </section>

        <section class="content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('error') }}
                </div>
            @endif
            @if(isset($errors) && $errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <ul style="margin:0;padding-left:18px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('icerik')
        </section>
    </div>

    @include('admin.include.footer')
</div>

<script src="/admin/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/admin/dist/js/adminlte.min.js"></script>
<script src="/admin/dist/js/sweetalert2.all.js"></script>
@include('admin.partials.flash-sweetalert')
@yield('js')
<script>
    /* Daraltılmış menü cookie'si layout'u bozuyordu — tam menü ile aç */
    (function () {
        if (typeof $ !== 'undefined') {
            $('body').removeClass('sidebar-collapse sidebar-mini');
        }
        document.body.classList.remove('sidebar-mini', 'sidebar-collapse');
    })();
</script>
</body>
</html>
