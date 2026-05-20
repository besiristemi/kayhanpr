@extends('admin.template')

@section('page_title', 'İçerikler')
@section('page_subtitle', 'Haber, ürün ve hizmet kayıtlarını yönetin')
@section('breadcrumb')
    <li class="active">İçerikler</li>
@endsection

@section('icerik')
@include('admin.partials.card-start', [
    'cardTitle' => 'İçerik Listesi',
    'cardIcon' => 'fa-list',
    'headerRight' => '<a href="'.route('yazilar.create').'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Yeni İçerik</a>
                   <a href="'.route('sliderler.index').'" class="btn btn-default btn-sm">Slider</a>'
])
<div class="kp-table-wrap">
    <table class="table table-bordered table-striped kp-datatable">
        <thead>
        <tr>
            <th>Başlık</th>
            <th>Kategori</th>
            <th>Yazar</th>
            <th>Tarih</th>
            <th width="140">İşlem</th>
        </tr>
        </thead>
        <tbody>
        @forelse($yazilar as $yazi)
            <tr>
                <td><strong>{{ $yazi->baslik }}</strong></td>
                <td><span class="label label-default">{{ $yazi->kategorisi?->baslik ?? $yazi->kategori }}</span></td>
                <td>{{ $yazi->kullanici?->adsoyad ?? '—' }}</td>
                <td>{{ $yazi->updated_at?->format('d.m.Y H:i') }}</td>
                <td>
                    <a href="{{ route('yazilar.edit', $yazi->id) }}" class="btn btn-primary btn-xs kp-btn-icon"><i class="fa fa-pencil"></i> Düzenle</a>
                    {!! Form::open(['route' => ['yazilar.destroy', $yazi->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
                    <button type="submit" class="btn btn-danger btn-xs kp-btn-icon" onclick="return confirm('Silinsin mi?')"><i class="fa fa-trash"></i></button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="kp-empty">Henüz içerik eklenmemiş.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@include('admin.partials.card-end')
@endsection

@include('admin.partials.datatables')
