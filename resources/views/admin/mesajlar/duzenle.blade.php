@extends('admin.template')

@section("icerik")
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-cog "></i> Yorum Düzenle</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($yorum,['route'=>['yorumlar.update',$yorum->id],'method'=>'PUT','class'=>'form']) !!}

            <div class="box-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">Yorum Yazan</label>
                    <input type="text" class="form-control" name="baslik" value="{{$yorum->kullanici->adsoyad}}" disabled/>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">açıklama</label>
                    <textarea name="yorum" class="form-control">{!! $yorum->yorum!!}</textarea>
                </div>


            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Yorumu Gümcelle</button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.box -->


    </div>
@endsection

@section("css")

@endsection

@section('js')
    <script src="/admin/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

@endsection