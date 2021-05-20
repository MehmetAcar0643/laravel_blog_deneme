@extends('frontend.layout')
@section('title',"Anasayfa Başlığı")
@section('content')

    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">{{$blog->title}}</h1>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="{{$blog->file}}" alt="">

                <hr>

                <!-- Date/Time -->
                <p>Tarih: {{$blog->created_at->format("d-m-Y H:i")}}</p>

                <hr>

                <!-- Post Content -->
                <p class="lead">{!! $blog->description!!}</p>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card mb-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Bloglar</h5>
                    <div class="card-body">
                        <ol>
                            @foreach ($blogList as $bloglar)
                                <li><a href="{{route('blogFront.detail',$bloglar->slug)}}">{{$bloglar['title']}}</a></li>
                            @endforeach
                        </ol>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>

@endsection
@section('css')@endsection
@section('js')@endsection
