@extends('admin.template')

@section('page_title', 'Ana Panel')
@section('page_subtitle', 'Site içeriklerinize genel bakış')
@section('breadcrumb')
    <li class="active">Özet</li>
@endsection

@section('icerik')
@if(Auth::user()->yetki != 'anons')

<div class="kp-stat-grid">
    <div class="kp-stat-card">
        <div class="kp-stat-card__icon kp-stat-card__icon--blue"><i class="fa fa-tags"></i></div>
        <div>
            <div class="kp-stat-card__label">Kategoriler</div>
            <div class="kp-stat-card__num">{{ $kategori_toplam->count() }}</div>
            <a href="{{ route('kategoriler.index') }}" class="kp-stat-card__link">Yönet →</a>
        </div>
    </div>
    <div class="kp-stat-card">
        <div class="kp-stat-card__icon kp-stat-card__icon--green"><i class="fa fa-newspaper-o"></i></div>
        <div>
            <div class="kp-stat-card__label">İçerikler</div>
            <div class="kp-stat-card__num">{{ $yazi_toplam->count() }}</div>
            <a href="{{ route('yazilar.index') }}" class="kp-stat-card__link">Yönet →</a>
        </div>
    </div>
    <div class="kp-stat-card">
        <div class="kp-stat-card__icon kp-stat-card__icon--amber"><i class="fa fa-file-text-o"></i></div>
        <div>
            <div class="kp-stat-card__label">Sayfalar</div>
            <div class="kp-stat-card__num">{{ $sayfa_toplam->count() }}</div>
            <a href="{{ route('sayfalar.index') }}" class="kp-stat-card__link">Yönet →</a>
        </div>
    </div>
    <div class="kp-stat-card">
        <div class="kp-stat-card__icon kp-stat-card__icon--red"><i class="fa fa-envelope"></i></div>
        <div>
            <div class="kp-stat-card__label">Mesajlar</div>
            <div class="kp-stat-card__num">{{ $gelenmesajlar->count() }}</div>
            <a href="{{ route('mesajlar.index') }}" class="kp-stat-card__link">Yönet →</a>
        </div>
    </div>
</div>

<div class="kp-dash-grid">
    @include('admin.partials.card-start', ['cardTitle' => 'Son İçerikler', 'cardIcon' => 'fa-clock-o'])
    <div class="kp-table-wrap">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th width="50"></th>
                <th>Başlık</th>
                <th width="120">Tarih</th>
                <th width="80"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($yazilar as $yazi)
                <tr>
                    <td>
                        @if($yazi->resim)
                            <img src="/{{ $yazi->resim }}" alt="" class="kp-thumb">
                        @endif
                    </td>
                    <td>{{ $yazi->baslik }}</td>
                    <td>{{ $yazi->created_at?->format('d.m.Y') }}</td>
                    <td>
                        <a href="{{ route('yazilar.edit', $yazi->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center text-muted">İçerik yok.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    @include('admin.partials.card-end')

    @include('admin.partials.card-start', ['cardTitle' => 'Son Mesajlar', 'cardIcon' => 'fa-envelope-o'])
    <div class="kp-table-wrap">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Gönderen</th>
                <th>Konu</th>
                <th width="120">Tarih</th>
                <th width="60"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($gelenmesajlar as $mesaj)
                <tr>
                    <td>{{ $mesaj->adsoyad }}</td>
                    <td>{{ $mesaj->konu ?: '—' }}</td>
                    <td>{{ $mesaj->created_at?->format('d.m.Y') }}</td>
                    <td>
                        <a href="{{ route('mesajlar.show', $mesaj->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center text-muted">Mesaj yok.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    @include('admin.partials.card-end')
</div>

@endif
@endsection
