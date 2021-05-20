@extends('admin.layout')

@section('content')


    <div class="card shadow ">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-black">Ayar Düzenleme</h4>
        </div>

        <div class="card-body">
            <form action="{{route('settings.update',['id'=>$settings['id']])}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 form-group">
                    <label  class="mr-sm-2">{{$settings['description']}}</label>


                    @if($settings['type']=="file")
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3  form-group">
                                <label class="control-label" for="kapakcheck"> Kapak Fotoğrafı:</label>
                                </div>
                                <div class="col-md-2 form-group mt-2">
                                <input type="checkbox"  name="kapakcheck" id="kapakcheck"
                                       value="1" {{$settings['value'] != null ? 'checked' : ""}}>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <img id="kapakshow" width="40%" src="{{$settings['value'] != null ? $settings['value'] : ""}}">
                            </div>
                        </div>
                        <input type="hidden" name="image" class="hidden-image-data"
                               value="{{$settings['value'] != null ? $settings['value'] : ""}}">
                        <input type="hidden" name="kapakdata" class="hidden-image-data">
                    @endif


                    @if($settings['type']=="text")
                        <input type="text" class="form-control mb-2 mr-sm-2" name="value"
                               value="{{$settings['value']}}" required>
                    @endif
                    @if($settings['type']=="ckeditor")
                        <textarea id="editor1" class="form-control mb-2 mr-sm-2" cols="30" rows="10"
                                  name="value" required>{{$settings['value']}}</textarea>
                    @endif
                </div>
                <div class="col-md-7 pull-right">
                    <button style="float: right" type="submit" class="btn btn-primary">Kaydet</button>
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








