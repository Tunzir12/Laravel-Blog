@extends('main')
require __DIR__.'/../vendor/autoload.php';

@section('title','| homepage')

@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron justify-content-center text-center text-capitalize">
                    <h1 class="display-3">Bambi</h1>
                    <p class="lead">Write Your mind</p>
                    <a href="posts\create" class="btn btn-primary btn-md">Post a Blog</a>
                </div>
            </div>
        </div><!--end of row-->
        <div class="row">
            <div class="col-md-10 margin-welcome">
               
                @foreach($posts as $post)
                <div class="row">
                    <div class="col-md-8 post">
                        <h3 class="text-capitalize">{{ $post->title }}</h3>
                        <p>{{ substr(strip_tags($post->body), 0,100) }}{{ strlen(strip_tags($post->body)) >100? "..." : ""}}</p>
                        <a href="{{ url('blog',$post->slug) }}" class="btn btn-sm btn-primary text-capitalize">read more</a>
                    </div>
                    <div class="col-md-4">
                        <span>{{date('M j, Y h:ia',strtotime($post->updated_at))}}</span>
                    </div>
                </div>
                    <hr>
                @endforeach

            </div>

@endsection