@extends('admin.layout')

@section('content')


    <div class="card shadow ">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-black">
                Blogs
                <a href="{{route('blog.create')}}" class="btn btn-dark" style="float:right;">
                    Yeni Ekle
                </a>
            </h4>
        </div>
        <div style="background: red;">
            <ol>
                <li style="color: white;font-weight: bold">RESİM YÜKLEME BAZI RESİM UZANTILARINI YÜKLEMİYOR,HATA
                    VERİYOR
                </li>
                <li style="color: white;font-weight: bold"></li>
            </ol>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th width="20%" style="text-align: center">Resim</th>
                    <th>Başlık</th>
                    <th>Slug</th>
                    <th width="10%">Durum</th>
                    <th width="10%"></th>
                </tr>
                </thead>
                <tbody id="sortable">
                @foreach($data['blog'] as $blog)
                    <tr id="item-{{$blog['id']}}">
                        <td width="5" class="sortable">{{$blog['id']}}</td>
                        <td style="text-align: center"><img style="width: 100px" src="{{$blog['file']}}" alt=""></td>
                        <td>{{$blog['title']}}</td>
                        <td>{{$blog['slug']}}</td>
                        <td>
                            <input type="checkbox" data-toggle="toggle" data-id="{{$blog['id']}}" class="blog_status"
                                   data-onstyle="primary" data-offstyle="danger"
                                   data-width="75" {{$blog['status']==1 ? 'checked': ""}}>
                        </td>
                        <td>
                            <a href="{{route('blog.edit',$blog['id'])}}">
                            <i class="fa fa-edit"></i>
                            </a>

                            <a href="javascript:void(0)">
                                <i id="{{$blog['id']}}" class="fa fa-trash"></i>
                            </a>

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>


@endsection
@section("scriptler")

    <script>
        $(".fa-trash").click(function () {
            destroy_id = $(this).attr("id");
            alertify.confirm('Silme İşlemini Onaylıyor Musunuz?', "Bu İşlem Geri Alınamaz!!",
                function () {

                    $.ajax({
                        type: "DELETE",
                        url: "blog/" + destroy_id,
                        success: function (msg) {
                            if (msg) {
                                $('#item-' + destroy_id).remove();
                                alertify.success('Silme İşlemi Başarılı');
                            } else {
                                alertify.error('Silme İşlemi Başarısız');
                            }
                        }
                    });

                },
                function () {
                    alertify.error("Silme İşlemi İptal Edildi");
                })
        });

        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#sortable').sortable({
                revert: true,
                handle: ".sortable",
                stop: function (event, ui) {
                    var data = $(this).sortable('serialize');
                    $.ajax({
                        type: "POST",
                        data: data,
                        url: "{{route('blog.sortable')}}",
                        success: function (msg) {
                            // console.log(msg);
                            if (msg) {
                                alertify.success('İşlem Başarılı');
                            } else {
                                alertify.error('İşlem Başarısız');
                            }
                        }
                    });

                }
            });
            $('#sortable').disableSelection();

        });

        $(function() {
            $('.blog_status').change(function() {
                var id = $(this).data('id');
                var status = $(this).prop('checked') == true ? 1 : 0;

                $.ajax({
                    type: "POST",
                    url: '{{route("blog.switchSatatus")}}',
                    data: {'status': status, 'id': id},
                    success: function (msg) {
                        // console.log(msg);
                        if (msg) {
                            alertify.success('Durum Güncellendi');
                        } else {
                            alertify.error('Durum Güncellemesi Başarısız');
                        }
                    }
                });
            })
        })

    </script>
@endsection

@section('css')@endsection
@section('js')@endsection








