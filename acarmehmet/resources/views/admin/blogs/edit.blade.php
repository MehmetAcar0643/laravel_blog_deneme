@extends('admin.layout')

@section('content')


    <div class="card shadow ">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-black">{{$blog['title']}}</h4>
        </div>

        <div class="card-body">
            <form action="{{route('blog.update',$blog['id'])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="mr-sm-2">Başlık</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" name="title" value="{{$blog['title']}}"
                               required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="mr-sm-2">Başlık slug</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" value="{{$blog['slug']}}" name="slug">
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="control-label" for="metin">Metin:</label>
                        <textarea id="editor1" class="form-control mb-2 mr-sm-2" cols="30" rows="10"
                                  name="description" required>{{$blog['description']}}</textarea>
                    </div>
                    <div class="col-md-6 form-group kapak_photo">
                        <div class="row">
                            <label class="control-label col-md-3" for="kapakcheck"> Kapak Fotoğrafı:</label>
                            <input type="checkbox" class="col-md-1 mt-1" name="kapakcheck" id="kapakcheck"
                                   value="1" {{$blog['file'] != null ? 'checked' : ""}}>
                        </div>
                        <div id="slayt" class="col-md-6">
                            <img id="kapakshow" width="150px" src="{{$blog['file'] != null ? $blog['file'] : ""}}">
                        </div>
                    </div>

                    <input type="hidden" name="kapakdata" class="hidden-image-data"
                           value="{{$blog['file'] != null ? $blog['file'] : ""}}">

                    <div class="col-md-12 pull-right">
                        <button style="float: right" type="submit" class="btn btn-primary">Güncelle</button>
                    </div>
                </div>


            </form>

        </div>

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <form id="kapakform" action="#">
                            <div style="width: 100%" class="image-editor">
                                <input type="file" class="cropit-image-input">
                                <div class="cropit-preview"></div>
                                <div class="image-size-label">
                                    Resmi Boyutlandır
                                </div>
                                <input style="width: 100%" type="range" class="cropit-image-zoom-input">
                                <button type="submit" class="btn btn-sm btn-danger">Kırp</button>
                                <button type="button" id="kapakok" class="btn btn-sm btn-success" data-dismiss="modal">
                                    Tamam
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <span style="float: left; color:red;"><b>kapak fotoğraf eklemek için önce kırpın.</b></span>
                    </div>
                </div>
            </div>
        </div>


    </div>


@endsection

@section("scriptler")

    <script type="text/javascript">
        $("#kapakcheck").change(function () {
            if (this.checked) {
                $('#myModal').modal();
            } else {
                $('.hidden-image-data').val("");
                $('.cropit-preview-image').attr("src", "");
                $('#kapakshow').attr("src");
                $('#kapakshow').attr("width", 1);
            }
        });

        $(function () {
            $('#kapakok').prop('disabled', true);
            $('.image-editor').cropit();
            $('#kapakform').submit(function () {
                var imageData = $('.image-editor').cropit('export');
                $('.hidden-image-data').val(imageData);
                $('#kapakshow').attr("src", imageData);
                $('#kapakshow').attr("width", 150);
                $('#kapakok').prop('disabled', false);
                return false;
            });
        });

    </script>
@endsection

@section('css')@endsection
@section('js')@endsection








