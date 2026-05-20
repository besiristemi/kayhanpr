@extends('admin.template')

@section('page_title', 'Sayfalar')
@section('page_subtitle', 'Statik sayfa içerikleri')
@section('breadcrumb')
    <li class="active">Sayfalar</li>
@endsection

@section('icerik')
@include('admin.partials.card-start', [
    'cardTitle' => 'Sayfa Listesi',
    'cardIcon' => 'fa-file-text-o',
    'headerRight' => '<a href="'.route('sayfalar.create').'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Yeni Sayfa</a>'
])
<div class="kp-table-wrap">
    <table class="table table-bordered table-striped kp-datatable">
        <thead>
        <tr>
            <th>Başlık</th>
            <th>Özet</th>
            <th>Tür</th>
            <th width="120">İşlem</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sayfalar as $sayfa)
            <tr>
                <td><strong>{{ $sayfa->baslik }}</strong></td>
                <td>{{ \Illuminate\Support\Str::limit(strip_tags($sayfa->icerik), 80) }}</td>
                <td>{{ $sayfa->ust_id ? 'Alt sayfa' : 'Üst sayfa' }}</td>
                <td>
                    <a href="{{ route('sayfalar.edit', $sayfa->id) }}" class="btn btn-primary btn-xs kp-btn-icon"><i class="fa fa-pencil"></i></a>
                    {!! Form::open(['route' => ['sayfalar.destroy', $sayfa->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
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
