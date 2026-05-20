<header class="main-header">
    <a href="{{ route('yonetim.index') }}" class="logo">
        <span class="logo-mini"><b>K</b>P</span>
        <span class="logo-lg"><b>Kayhan</b> Prodüksiyon</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" aria-label="Menü">
            <span class="sr-only">Menü</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ route('mesajlar.index') }}" title="Mesajlar">
                        <i class="fa fa-envelope-o"></i>
                        @php $headerMesaj = \App\Models\Mesaj::count(); @endphp
                        @if($headerMesaj > 0)<span class="label label-danger">{{ $headerMesaj }}</span>@endif
                    </a>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/admin/dist/img/user2-160x160.jpg" class="user-image" alt="">
                        <span class="hidden-xs">{{ Auth::user()->adsoyad }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header" style="background:#152238;">
                            <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="">
                            <p>{{ Auth::user()->adsoyad }}<small>{{ Auth::user()->email }}</small></p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('kullanici.duzenle', Auth::user()->id) }}" class="btn btn-default btn-flat">Profilim</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('yonetim.cikis') }}" class="btn btn-default btn-flat">Çıkış</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
