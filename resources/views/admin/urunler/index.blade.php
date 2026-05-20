@extends('admin.template')

@section("icerik")

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Ürün Yönetimi</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Ürün Adı</th>
                    <th>Fiyatı</th>
                    <th>İndirim</th>
                    <th>Eski Fİyatı</th>
                    <th>Eklenme Tarihi</th>
                    <th width="5%">Düzenle</th>
                    <th width="5%">Sil</th>
                </tr>
                </thead>
                <tbody>
                @foreach($urunler as $urun)

                    <tr>
                        <td>{{$urun->urunadi}}</td>
                        <td>{{$urun->fiyati}}</td>
                        <td>{{$urun->indirim}}</td>
                        <td>{{$urun->eskifiyat}}</td>
                        <td>{{$urun->created_at}}</td>
                        <td><a href="{{route('urunler.edit',$urun->id)}}" class="btn btn-success btn-xs">Düzenle</a></td>
                        {!! Form::model($urun,['route'=>['urunler.destroy',$urun->id],'method'=>'DELETE']) !!}

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
