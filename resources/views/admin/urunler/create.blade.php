@extends('admin.template')

@section("icerik")

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Ürün Ekle</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::open(['route'=>'urunler.store','method'=>'POST','class'=>'form','files'=>'true']) !!}

        <div class="box-body">


            <div class="form-group">
                <label>Ürün Adı</label>
                <input type="text" class="form-control" name="urunadi"/>
            </div>

            <div class="form-group">
                <label>Açıklama</label>
                <textarea name="aciklama" class="form-control my-editor" rows="10" cols="80" required></textarea>
            </div>

            <div class="col-md-4 form-group">
                <label>İndirim</label>
                <input type="text" class="form-control" name="indirim"/>
            </div>


            <div class="col-md-4 form-group">
                <label>Fiyatı</label>
                <input type="text" class="form-control" name="fiyati"/>
            </div>


            <div class="col-md-4 form-group">
                <label>Eski Fiyatı</label>
                <input type="text" class="form-control" name="eskifiyat"/>
            </div>


            <div class="col-md-3 form-group">
                <label>Ön 1 (Tek Resim)</label>
                <input type="file" class="form-control" name="resim1" />
            </div>

            <div class="col-md-3 form-group">
                <label>Ön 2 (Tek Resim)</label>
                <input type="file" class="form-control" name="resim2" />
            </div>


            <div class="col-md-2 form-group">
                <label>Resim 3 (Tek Resim)</label>
                <input type="file" class="form-control" name="resim3" />
            </div>

            <div class="col-md-2 form-group">
                <label>Resim 4 (Tek Resim)</label>
                <input type="file" class="form-control" name="resim4" />
            </div>

            <div class="col-md-2 form-group">
                <label>Resim 5 (Tek Resim)</label>
                <input type="file" class="form-control" name="resim5" />
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
            <button type="submit" class="btn btn-success">Ürün Ekle</button>
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

    <!-- The template to display files available for upload -->
    <script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>

    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>

    <script src="/jquery-file-upload-master/js/vendor/jquery.ui.widget.js"></script>
    <script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <script src="/jquery-file-upload-master/js/jquery.iframe-transport.js"></script>
    <script src="/jquery-file-upload-master/js/jquery.fileupload.js"></script>
    <script>
        /* global window, $ */
        window.testBasicWidget = $.blueimp.fileupload;
    </script>
    <script src="/jquery-file-upload-master/js/jquery.fileupload-process.js"></script>
    <script src="/jquery-file-upload-master/js/jquery.fileupload-image.js"></script>
    <script src="/jquery-file-upload-master/js/jquery.fileupload-audio.js"></script>
    <script src="/jquery-file-upload-master/js/jquery.fileupload-video.js"></script>
    <script src="/jquery-file-upload-master/js/jquery.fileupload-validate.js"></script>
    <script src="/jquery-file-upload-master/js/jquery.fileupload-ui.js"></script>
    <script>
        /* global window, $ */
        window.testUIWidget = $.blueimp.fileupload;
    </script>
    <script>
        $(function () {
            var resimler = [];
            $('#fileupload').fileupload({
                dataType: 'json',
                autoUpload: true,
                done: function (e, data) {
                    var html ='' ;
                    $.each(data.result.files, function (index, file) {
                        resimler.push(file.name)
                    });
                    $.each(resimler, function (k, v) {
                        html += '<div style=" float:left; padding:3px;"><img src="/yuklemeler/haberler/habergaleri/' + v + '" height="100"></div>';
                    });
                    $('#resimler').val(resimler.join(','));
                    $('#resimlistesi').html(html);
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress .bar').css(
                        'width',
                        progress + '%'
                    );
                }
            });
        });
    </script>

@endsection
