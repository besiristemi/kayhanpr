@extends('admin.template')

@section("icerik")

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Mesaj Yönetimi</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Adı Soyadı</th>
                    <th>Konu</th>
                    <th>E-posta</th>
                    <th>Telefon</th>
                    <th>Adres</th>
                    <th>İp Adresi</th>
                    <th width="5%">Oku</th>
                    <th width="5%">Sil</th>
                </tr>
                </thead>
                <tbody>
                @foreach($yorumlar as $yorum)

                    <tr>
                        <td>{{$yorum->kullanici->adsoyad}}</td>
                        <td>{{$yorum->yorum}}</td>
                        <td>{{$yorum->yazi->baslik}}</td>
                        <td>{{$yorum->created_at}}</td>
                        <!-- date('d-m-y',strtotime($yorum->created_at))-->


                        <td>

                            @if($yorum->onay==0)

                                <a href="{{route('yorum.onayla',$yorum->id)}}" class="btn btn-success btn-xs">Onayla</a>


                            @else


                                <a href="{{route('yorum.onaykaldir',$yorum->id)}}" class="btn btn-danger btn-xs">Onay Kaldır</a>

                            @endif

                        </td>



                        <td><a href="{{route('yorumlar.edit',$yorum->id)}}" class="btn btn-primary btn-xs">Düzenle</a></td>
                        {!! Form::model($yorum,['route'=>['yorumlar.destroy',$yorum->id],'method'=>'DELETE']) !!}

                        <td><button type="submit" class="btn btn-danger btn-xs">Sil</button></td>

                        {!! Form::close() !!}
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

@endsection

@section("css")
    <link rel="stylesheet" href="/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection

@section('js')

    <!-- Bootstrap 3.3.7 -->
    <!-- DataTables -->
    <script src="/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/admin/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->

    <!-- AdminLTE for demo purposes -->
    <script src="/admin/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection