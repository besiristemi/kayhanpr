@extends('admin.template')

@section('page_title', 'Mesajlar')
@section('page_subtitle', 'İletişim formundan gelen mesajlar')
@section('breadcrumb')
    <li class="active">Mesajlar</li>
@endsection

@section('icerik')
@include('admin.partials.card-start', ['cardTitle' => 'Gelen Mesajlar', 'cardIcon' => 'fa-envelope'])
<div class="kp-table-wrap">
    <table class="table table-bordered table-striped kp-datatable">
        <thead>
        <tr>
            <th>Ad Soyad</th>
            <th>Konu</th>
            <th>E-posta</th>
            <th>Tarih</th>
            <th>IP</th>
            <th width="100">İşlem</th>
        </tr>
        </thead>
        <tbody>
        @forelse($mesajlar as $mesaj)
            <tr>
                <td><strong>{{ $mesaj->adsoyad }}</strong></td>
                <td>{{ $mesaj->konu ?: '—' }}</td>
                <td><a href="mailto:{{ $mesaj->email }}">{{ $mesaj->email }}</a></td>
                <td>{{ $mesaj->created_at?->format('d.m.Y H:i') }}</td>
                <td><small class="text-muted">{{ $mesaj->ip_adresi }}</small></td>
                <td>
                    <a href="{{ route('mesajlar.show', $mesaj->id) }}" class="btn btn-primary btn-xs" title="Oku"><i class="fa fa-eye"></i></a>
                    {!! Form::open(['route' => ['mesajlar.destroy', $mesaj->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Mesaj silinsin mi?')"><i class="fa fa-trash"></i></button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center text-muted">Henüz mesaj yok.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@include('admin.partials.card-end')
@endsection

@include('admin.partials.datatables')
