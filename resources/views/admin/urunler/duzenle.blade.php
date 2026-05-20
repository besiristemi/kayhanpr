@extends('admin.template')

@section("icerik")

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">İçerik Düzenle : {{$urunler->urunadi}}</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        {!! Form::model($urunler,['route'=>['urunler.update',$urunler->id],'method'=>'PUT','class'=>'form','files'=>'true'])!!}

        <div class="box-body">


            <div class="form-group">
                <label>Ürün Adı</label>
                <input type="text" class="form-control" name="urunadi" value="{{$urunler->urunadi}}"/>
            </div>

            <div class="form-group">
                <label>Açıklama</label>
                <textarea name="aciklama" class="form-control my-editor" rows="10" cols="80" required>{!! $urunler->aciklama !!}</textarea>
            </div>

            <div class="col-md-4 form-group">
                <label>İndirim</label>
                <input type="text" class="form-control" name="indirim" value="{{$urunler->indirim}}"/>
            </div>


            <div class="col-md-4 form-group">
                <label>Fiyatı</label>
                <input type="text" class="form-control" name="fiyati" value="{{$urunler->fiyati}}"/>
            </div>


            <div class="col-md-4 form-group">
                <label>Eski Fiyatı</label>
                <input type="text" class="form-control" name="eskifiyat" value="{{$urunler->eskifiyat}}"/>
            </div>


            <div class="col-md-3 form-group">
                <label>Ön 1 (Tek Resim)</label>
                <input type="file" class="form-control" name="resim1" />
                <label>Mevcut Resmi</label>
                <div><img border="0" src="/{{$urunler->resim1}}" width="150" height="150"></div>
            </div>


            <div class="col-md-3 form-group">
                <label>Ön 2 (Tek Resim)</label>
                <input type="file" class="form-control" name="resim2" />
                <label>Mevcut Resmi</label>
                <div><img border="0" src="/{{$urunler->resim2}}" width="150" height="150"></div>
            </div>


            <div class="col-md-2 form-group">
                <label>Resim 3 (Tek Resim)</label>
                <input type="file" class="form-control" name="resim3" />
                <label>Mevcut Resmi</label>
                <div><img border="0" src="/{{$urunler->resim3}}" width="150" height="150"></div>
            </div>

            <div class="col-md-2 form-group">
                <label>Resim 4 (Tek Resim)</label>
                <input type="file" class="form-control" name="resim4" />
                <label>Mevcut Resmi</label>
                <div><img border="0" src="/{{$urunler->resim4}}" width="150" height="150"></div>
            </div>

            <div class="col-md-2 form-group">
                <label>Resim 5 (Tek Resim)</label>
                <input type="file" class="form-control" name="resim5" />
                <label>Mevcut Resmi</label>
                <div><img border="0" src="/{{$urunler->resim5}}" width="150" height="150"></div>
            </div>



            {{-- <div class="form-group">
                 <label style="color:red">Ürün Tüm Resimler (Çoklu Resim)</label>
                 <input id="fileupload" type="file" name="files[]" data-url="/resim-yukle" multiple>
                 <input type="hidden" name="resimler" id="resimler"/>
                 <div id="progress">
                     <div class="bar" style="width: 0%;"></div>
                 </div>
                 <div id="resimlistesi"></div>
             </div>--}}



        </div>

        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Ürün Güncelle</button>
        </div>
        {!! Form::close() !!}
    </div>
    <!-- /.box -->

@endsection

@section("css")

@endsection

@section('js')
    <script src="{{ asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'aciklama' );
    </script>

@endsection
