@extends('admin.template')

@section('page_title', 'Hakkımızda')
@section('page_subtitle', 'Kurumsal sayfa içeriği')
@section('breadcrumb')
    <li class="active">Hakkımızda</li>
@endsection

@section('icerik')
<form method="POST" action="{{ route('hakkimizda.gir', $hakkimizda->id) }}" enctype="multipart/form-data">
    @csrf
    @include('admin.partials.card-start', ['cardTitle' => 'Kurumsal İçerik', 'cardIcon' => 'fa-building'])

    <div class="form-group">
        <label>Hakkımızda</label>
        <textarea name="aciklama" id="aciklama" class="form-control" rows="6">{!! old('aciklama', $hakkimizda->aciklama) !!}</textarea>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Misyon</label>
                <textarea name="misyon" id="misyon" class="form-control" rows="5">{!! old('misyon', $hakkimizda->misyon) !!}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Vizyon</label>
                <textarea name="vizyon" id="vizyon" class="form-control" rows="5">{!! old('vizyon', $hakkimizda->vizyon) !!}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Kalite politikası</label>
                <textarea name="kalite" id="kalite" class="form-control" rows="5">{!! old('kalite', $hakkimizda->kalite) !!}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Sosyal sorumluluk</label>
                <textarea name="sosyal" id="sosyal" class="form-control" rows="5">{!! old('sosyal', $hakkimizda->sosyal) !!}</textarea>
            </div>
        </div>
    </div>

    <hr class="kp-hr">
    <h4 class="kp-section-title"><i class="fa fa-image"></i> Görseller</h4>
    <div class="row">
        @foreach(['resim1','resim2','resim3','resim4','resim5','resim6'] as $i => $alan)
            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <label>Görsel {{ $i + 1 }}</label>
                    @if($hakkimizda->{$alan})
                        <div class="mb-2"><img src="/{{ $hakkimizda->{$alan} }}" alt="" class="kp-preview-img"></div>
                    @endif
                    <input type="file" class="form-control" name="{{ $alan }}" accept="image/*">
                </div>
            </div>
        @endforeach
    </div>

    @include('admin.partials.card-end', ['footer' => view('admin.partials.form-actions', ['cancelUrl' => route('yonetim.index'), 'submitText' => 'Kaydet'])->render()])
</form>
@endsection

@section('js')
<script src="{{ asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
<script>
    ['aciklama','misyon','vizyon','kalite','sosyal'].forEach(function(id) {
        if (document.getElementById(id)) CKEDITOR.replace(id, { height: 180 });
    });
</script>
@endsection
