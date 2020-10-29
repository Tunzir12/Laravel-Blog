@extends('main')

@section('title', '| Blog Index')
    
@section('content')
    <div class="row">
        <div class="col-md-12 marg">
            <h1>Blog</h1>
        </div>
    </div>

    <div class="row">
    @foreach($posts as $post)
    
        <div class="col-md-8 col-md-offset-2 blog-spacing">
            <h4 class="text-capitalize">Title: {{ $post->title }}</h4>
        <h5>Published: {{ date('M, j, Y',strtotime( $post->created_at )) }}</h5>
            <p>{{ substr(strip_tags( $post->body), 0, 250) }} {{ strlen(strip_tags($post->body))> 250 ? '...' : "" }}</p>

            <a href="{{ url('blog',$post->slug) }}" class="btn btn-primary btn-sm">read more</a>
        </div>

    @endforeach


        <div class="col-md-12 pagination-sm">
            <div>
                {!! $posts->links() !!}
            </div>
        </div>
    
    </div>

@endsection