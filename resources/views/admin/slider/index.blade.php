@extends('admin.template')

@section('page_title', 'Ana Sayfa Slider')
@section('page_subtitle', 'Anasayfa hero slaytları')
@section('breadcrumb')
    <li><a href="{{ route('yazilar.index') }}">İçerikler</a></li>
    <li class="active">Slider</li>
@endsection

@section('icerik')
@include('admin.partials.card-start', [
    'cardTitle' => 'Slider Listesi',
    'cardIcon' => 'fa-image',
    'headerRight' => '<a href="'.route('sliderler.create').'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Yeni Slayt</a>'
])
<div class="kp-table-wrap">
    <table class="table table-bordered table-striped kp-datatable">
        <thead>
        <tr>
            <th width="100">Görsel</th>
            <th>Başlık</th>
            <th>Alt metin</th>
            <th width="120">İşlem</th>
        </tr>
        </thead>
        <tbody>
        @forelse($sliderler as $slider)
            <tr>
                <td>
                    @if($slider->resim)
                        <img src="{{ asset($slider->resim) }}" alt="" style="width:80px;height:48px;object-fit:cover;border-radius:6px;">
                    @endif
                </td>
                <td><strong>{{ $slider->baslik }}</strong></td>
                <td>{{ \Illuminate\Support\Str::limit(strip_tags($slider->icerik ?? ''), 60) }}</td>
                <td>
                    <a href="{{ route('sliderler.edit', $slider->id) }}" class="btn btn-primary btn-xs kp-btn-icon"><i class="fa fa-pencil"></i></a>
                    {!! Form::open(['route' => ['sliderler.destroy', $slider->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Silinsin mi?')"><i class="fa fa-trash"></i></button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="kp-empty">Slider eklenmemiş. <a href="{{ route('sliderler.create') }}">İlk slaytı ekleyin</a></td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@include('admin.partials.card-end')
@endsection

@include('admin.partials.datatables')
