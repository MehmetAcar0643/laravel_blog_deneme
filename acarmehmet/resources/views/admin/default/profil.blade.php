@extends('admin.layout')

@section('content')


    <div class="card shadow ">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-black">
                {{strtoupper($profil->name)}}
            </h4>
        </div>
        <div style="background: red;">
            <ol>
                <li style="color: white;font-weight: bold">BURADAKİ İŞLEMLERİN DAHA KISA BİR YOLU OLABİLİR.</li>
                <li style="color: white;font-weight: bold"></li>
            </ol>
        </div>
        <form action="{{route('user.update',$profil->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body ">
                <div class="col-md-6 form-group ">
                    <label class="mr-sm-2">Ad-Soyad</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="name" value="{{$profil->name}}"
                           required>
                </div>
                <div class="col-md-6 form-group ">
                    <label class="mr-sm-2">E-mail</label>
                    <input type="email" class="form-control mb-2 mr-sm-2" name="mail" value="{{$profil->email}}"
                           required>
                </div>
                <div class="col-md-6 form-group">
                    <label class="mr-sm-2">Şifre</label>
                    <input type="password" class="form-control mb-2 mr-sm-2" name="password">
                </div>
                <div  class="col-md-6">
                    <button style="float:right;" type="submit" class="btn btn-primary form-group">Güncelle</button>
                </div>
            </div>
        </form>
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

        $(function () {
            $('.blog_status').change(function () {
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








