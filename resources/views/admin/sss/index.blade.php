@extends('admin.template')

@section('page_title', 'Sık Sorulan Sorular')
@section('page_subtitle', 'SSS yönetimi')
@section('breadcrumb')
    <li class="active">SSS</li>
@endsection

@section('icerik')
@include('admin.partials.card-start', [
    'cardTitle' => 'Soru Listesi',
    'cardIcon' => 'fa-question-circle',
    'headerRight' => '<a href="'.route('sorular.create').'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Yeni Soru</a>'
])
<div class="kp-table-wrap">
    <table class="table table-bordered table-striped kp-datatable">
        <thead>
        <tr>
            <th>Soru</th>
            <th width="140">Tarih</th>
            <th width="120">İşlem</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sorular as $soru)
            <tr>
                <td><strong>{{ $soru->soru }}</strong></td>
                <td>{{ $soru->created_at?->format('d.m.Y') }}</td>
                <td>
                    <a href="{{ route('sorular.edit', $soru->id) }}" class="btn btn-primary btn-xs kp-btn-icon"><i class="fa fa-pencil"></i></a>
                    {!! Form::open(['route' => ['sorular.destroy', $soru->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
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
