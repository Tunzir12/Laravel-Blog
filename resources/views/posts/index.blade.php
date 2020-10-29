@extends('main')

@section('title', '| All Posts')

@section('content')

    <div class="row post-index">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>

        <div class="col-md-2">
        <a href="{{route('posts.create')}}" class="btn btn-block btn-primary form-spacing-top">Create New Posts</a>
        </div>
        <hr>
    </div> <!-- end of the row --> 

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Body</th>
                      <th scope="col">Created_at</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                        <th>{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ substr(strip_tags( $post->body), 0,50) }}{{ strlen(strip_tags($post->body)) >50? "..." : ""}}</td>
                        <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                        <td>
                        <a href="{{ route('posts.show', $post->id)}}" class="btn btn-sm btn-dark">View</a>
                            <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-sm btn-dark">Edit</a>
                        </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
        <div class="col-md-12 pagination-sm">
            {!! $posts->links(); !!}
        </div>
    </div>
@endsection