@extends('frontend.layout')
@section('title',"Anasayfa Başlığı")
@section('content')



    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Bloglar
            <small></small>
        </h1>

        @foreach($data['blog'] as $blog)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="#">
                                <img class="img-fluid rounded" src="{{$blog['file']}}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="card-title">{{$blog['title']}}</h2>
                            <p class="card-text">
                                {!! substr($blog['description'],0,140) !!} ...</p>
                            <a href="{{route('blogFront.detail',$blog['slug'])}}" class="btn btn-primary">Bloğu İncele</a>

                        </div>
                    </div>
                </div>

            </div>
        @endforeach

    </div>

@endsection
@section('css')@endsection
@section('js')@endsection
