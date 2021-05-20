@extends('admin.layout')

@section('content')


    <div class="card shadow ">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-black">Settings</h4>
        </div>
        <div style="background: red;">
            <ol>
                <li style="color: white;font-weight: bold">RESİM GÜNCELLEME OLMUYORsettings.edit
                </li>
            </ol>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Açıklama</th>
                    <th>İçerik</th>
                    <th>Anahtar Değer</th>
                    <th width="10%"></th>
                </tr>
                </thead>
                <tbody id="sortable">
                @foreach($data['adminSettings'] as $adminSettings)
                    <tr id="item-{{$adminSettings['id']}}">
                        <td width="5" class="sortable">{{$adminSettings['id']}}</td>
                        <td>{{$adminSettings['description']}}</td>
                        <td>@if($adminSettings['type']=="file")
                                @if($adminSettings['value']!="")
                                    <img width="100px" height="100px"
                                         src="{{$adminSettings['value']}}" alt="">
                                @endif
                            @else
                                {{$adminSettings['value']}}
                            @endif
                        </td>
                        <td>{{$adminSettings['key']}}</td>
                        <td>
                            <a href="{{route('settings.edit',['id'=>$adminSettings['id']])}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            @if($adminSettings['delete'])
                                <a href="javascript:void(0)">
                                    <i id="{{$adminSettings['id']}}" class="fa fa-trash"></i>
                                </a>
                            @endif

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
                    location.href = "/admins/ayarlar/delete/" + destroy_id;
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
                        url: "{{route('settings.sortable')}}",
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

    </script>
@endsection

@section('css')@endsection
@section('js')@endsection








