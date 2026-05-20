@extends('admin.template')

@section("icerik")

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Hizmet Düzenle : {!! $galeriler->urunadi !!}</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        {!! Form::model($galeriler,['route'=>['galeriler.update',$galeriler->id],'method'=>'PUT','class'=>'form','files'=>'true'])!!}
        <div class="box-body">


            <div class="form-group">
                <label>Ürün Adı</label>
                <input type="text" class="form-control" name="urunadi" value="{{$galeriler->urunadi}}">
            </div>

            <div class="form-group">
                <label>Hizmet Açıklama</label>
                <textarea class=" form-control" name="aciklama" id="aciklama" title="">{!! $galeriler->aciklama !!}</textarea>
            </div>

            <div class="form-group">
                <label>Ürün Fiyatı</label>
                <input type="text" class="form-control" name="fiyat" value="{{$galeriler->fiyat}}"/>
            </div>


            <div class="form-group">
                <label>Mevcut Ürün Ana Resmi</label>
                <div><img border="0" src="/{{$galeriler->resim}}" width="150" height="150"></div>
            </div>

            <div class="form-group">
                <label>Yeni Ürün Ana Resmi</label>
                <input type="file" name="resim">
            </div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Hizmet Güncelle</button>
        </div>
        {!! Form::close() !!}
    </div>
    <!-- /.box -->

@endsection

@section("css")

@endsection

@section('js')
    <script src="/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'aciklama' );
    </script>

@endsection
