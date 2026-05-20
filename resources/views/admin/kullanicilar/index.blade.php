@extends('admin.template')

@section('page_title', 'Kullanıcılar')
@section('page_subtitle', 'Panel kullanıcı yönetimi')
@section('breadcrumb')
    <li class="active">Kullanıcılar</li>
@endsection

@section('icerik')
@include('admin.partials.card-start', [
    'cardTitle' => 'Kullanıcı Listesi',
    'cardIcon' => 'fa-users',
    'headerRight' => '<a href="'.route('kullanici.ekle').'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Yeni Kullanıcı</a>'
])
<div class="kp-table-wrap">
    <table class="table table-bordered table-striped kp-datatable">
        <thead>
        <tr>
            <th>Ad Soyad</th>
            <th>E-posta</th>
            <th>Yetki</th>
            <th width="140">Kayıt</th>
            <th width="120">İşlem</th>
        </tr>
        </thead>
        <tbody>
        @foreach($kullanicilar as $kullanici)
            <tr>
                <td><strong>{{ $kullanici->adsoyad }}</strong></td>
                <td>{{ $kullanici->email }}</td>
                <td><span class="label label-{{ $kullanici->yetki === 'admin' ? 'primary' : 'default' }}">{{ $kullanici->yetki }}</span></td>
                <td>{{ $kullanici->created_at?->format('d.m.Y') }}</td>
                <td>
                    <a href="{{ route('kullanici.duzenle', $kullanici->id) }}" class="btn btn-primary btn-xs kp-btn-icon"><i class="fa fa-pencil"></i></a>
                    <form action="{{ route('kullanici.sil', $kullanici->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Kullanıcı silinsin mi?')"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@include('admin.partials.card-end')
@endsection

@include('admin.partials.datatables')
