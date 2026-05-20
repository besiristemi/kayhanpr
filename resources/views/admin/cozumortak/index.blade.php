@extends('admin.template')

@section('page_title', 'Çözüm Ortakları')
@section('page_subtitle', 'Referans logoları')
@section('breadcrumb')
    <li class="active">Çözüm Ortakları</li>
@endsection

@section('icerik')
@include('admin.partials.card-start', [
    'cardTitle' => 'Ortak Listesi',
    'cardIcon' => 'fa-handshake-o',
    'headerRight' => '<a href="'.route('cozumortak.create').'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Yeni Ekle</a>'
])
<div class="kp-table-wrap">
    <table class="table table-bordered table-striped kp-datatable">
        <thead>
        <tr>
            <th width="80">Logo</th>
            <th>Başlık</th>
            <th width="140">Tarih</th>
            <th width="120">İşlem</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cozumortak as $cortak)
            <tr>
                <td>
                    @if($cortak->resim)
                        <img src="/{{ $cortak->resim }}" alt="" class="kp-thumb">
                    @endif
                </td>
                <td><strong>{{ $cortak->baslik }}</strong></td>
                <td>{{ $cortak->created_at?->format('d.m.Y') }}</td>
                <td>
                    <a href="{{ route('cozumortak.edit', $cortak->id) }}" class="btn btn-primary btn-xs kp-btn-icon"><i class="fa fa-pencil"></i></a>
                    {!! Form::open(['route' => ['cozumortak.destroy', $cortak->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
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
