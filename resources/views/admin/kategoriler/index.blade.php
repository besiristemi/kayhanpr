@extends('admin.template')

@section('page_title', 'Kategoriler')
@section('page_subtitle', 'İçerik türlerini yönetin')
@section('breadcrumb')
    <li class="active">Kategoriler</li>
@endsection

@section('icerik')
@include('admin.partials.card-start', [
    'cardTitle' => 'Kategori Listesi',
    'cardIcon' => 'fa-tags',
    'headerRight' => '<a href="'.route('kategoriler.create').'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Yeni Kategori</a>'
])
<div class="kp-table-wrap">
    <table class="table table-bordered table-striped kp-datatable">
        <thead>
        <tr>
            <th>Başlık</th>
            <th>Tür</th>
            <th>Açıklama</th>
            <th width="120">İşlem</th>
        </tr>
        </thead>
        <tbody>
        @foreach($kategoriler as $kategori)
            <tr>
                <td><strong>{{ $kategori->baslik }}</strong></td>
                <td>{{ $kategori->ust_id ? 'Alt kategori' : 'Ana kategori' }}</td>
                <td>{{ $kategori->aciklama }}</td>
                <td>
                    <a href="{{ route('kategoriler.edit', $kategori->id) }}" class="btn btn-primary btn-xs kp-btn-icon"><i class="fa fa-pencil"></i></a>
                    {!! Form::open(['route' => ['kategoriler.destroy', $kategori->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Silinsin mi?')"><i class="fa fa-trash"></i></button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@include('admin.partials.card-end')
@endsection

@include('admin.partials.datatables')
