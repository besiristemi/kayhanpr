@php
    $mesajSayisi = \App\Models\Mesaj::count();
    $route = request()->route()?->getName();
@endphp
<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->adsoyad }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> {{ ucfirst(Auth::user()->yetki ?? 'Yönetici') }}</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Genel</li>
            <li class="{{ $route === 'yonetim.index' ? 'active' : '' }}">
                <a href="{{ route('yonetim.index') }}"><i class="fa fa-dashboard"></i> <span>Ana Panel</span></a>
            </li>
            <li class="{{ request()->routeIs('ayarlar.*') ? 'active' : '' }}">
                <a href="{{ route('ayarlar.index') }}"><i class="fa fa-cog"></i> <span>Site Ayarları</span></a>
            </li>
            <li class="{{ $route === 'hakkimizdaekle' ? 'active' : '' }}">
                <a href="{{ route('hakkimizdaekle') }}"><i class="fa fa-building"></i> <span>Kurumsal</span></a>
            </li>

            <li class="header">İçerik</li>
            <li class="treeview {{ request()->routeIs('sliderler.*') || request()->routeIs('yazilar.*') || request()->routeIs('kategoriler.*') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-files-o"></i> <span>İçerikler</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->routeIs('sliderler.*') ? 'active' : '' }}">
                        <a href="{{ route('sliderler.index') }}"><i class="fa fa-image"></i> Ana Slider</a>
                    </li>
                    <li class="{{ request()->routeIs('yazilar.index') ? 'active' : '' }}">
                        <a href="{{ route('yazilar.index') }}"><i class="fa fa-list"></i> Tüm İçerikler</a>
                    </li>
                    <li class="{{ request()->routeIs('yazilar.create') ? 'active' : '' }}">
                        <a href="{{ route('yazilar.create') }}"><i class="fa fa-plus"></i> Yeni Ekle</a>
                    </li>
                    <li class="{{ request()->routeIs('kategoriler.*') ? 'active' : '' }}">
                        <a href="{{ route('kategoriler.index') }}"><i class="fa fa-tags"></i> Kategoriler</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ request()->routeIs('sayfalar.*') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-file-text-o"></i> <span>Sayfalar</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('sayfalar.index') }}">Tümü</a></li>
                    <li><a href="{{ route('sayfalar.create') }}">Yeni Sayfa</a></li>
                </ul>
            </li>

            <li class="header">İletişim</li>
            <li class="{{ request()->routeIs('mesajlar.*') ? 'active' : '' }}">
                <a href="{{ route('mesajlar.index') }}">
                    <i class="fa fa-envelope"></i> <span>Mesajlar</span>
                    @if($mesajSayisi > 0)<span class="kp-nav-badge">{{ $mesajSayisi }}</span>@endif
                </a>
            </li>
            <li class="treeview {{ request()->routeIs('sorular.*') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-question-circle"></i> <span>SSS</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('sorular.index') }}">Tüm Sorular</a></li>
                    <li><a href="{{ route('sorular.create') }}">Soru Ekle</a></li>
                </ul>
            </li>

            <li class="header">Diğer</li>
            <li class="treeview {{ request()->routeIs('cozumortak.*') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-handshake-o"></i> <span>Çözüm Ortakları</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('cozumortak.index') }}">Liste</a></li>
                    <li><a href="{{ route('cozumortak.create') }}">Yeni Ekle</a></li>
                </ul>
            </li>
            <li class="treeview {{ request()->routeIs('kullanici.*') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Kullanıcılar</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('kullanici.index') }}">Liste</a></li>
                    <li><a href="{{ route('kullanici.ekle') }}">Yeni Kullanıcı</a></li>
                </ul>
            </li>
        </ul>

        <div class="kp-sidebar-footer">
            <a href="{{ url('/') }}" target="_blank" rel="noopener"><i class="fa fa-external-link"></i> Siteyi Görüntüle</a>
            <a href="{{ route('yonetim.cikis') }}"><i class="fa fa-sign-out"></i> Çıkış Yap</a>
        </div>
    </section>
</aside>
