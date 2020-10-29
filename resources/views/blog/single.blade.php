@extends('main')

@section('title', "| $post->title")
    
@section('content')
<div class="container">
    <div class="row marg margin-welcome">
        <div class="col-md-9 col-md-offset-2">
        <h3>{{ $post->title }}</h3>
        <p>{!! $post->body !!}</p>
        <hr>
        <p> Posted In: {{ $post->category->name }}</p>
        <hr>
        </div>
    </div>

    <div class="row marg">
        <div class="col-md-8 col-md-offset-2">

        <h5>
        <span><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-right-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM3.5 3a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
        </svg></span>
        {{ $post->comment()->count() }} Comments
        </h5>


        @foreach ($post->comment as $comment)
        <div class="comment card-body">
            <div class="author-info">
                <img src="" alt="" class="author-image">
                <div class="author-name">
                    <h4>{{ $comment->name }}</h4>
                    <div class="author-time">
                        <p>{{ $comment->created_at }}</p>
                    </div>
                </div>
            </div>
            <div class="comment-content">
                {{ $comment->comment }}
            </div>
        </div>
        @endforeach
        </div>
    </div>

    <div class="row marg">

        <div id="comment-form">
        {{ Form::open(['route'=> ['comments.store', $post->id], 'method'=>'POST'])}}

        <div class="row form-margin">
            <div class="col-md-6">
            {{ Form::label('name','Name:') }}
            {{ Form::text('name',null, ['class'=>'form-control form-group-sm']) }}
            </div>
            <div class="col-md-6">
            {{ Form::label('email','Email:') }}
            {{ Form::text('email',null, ['class'=>'form-control form-group-sm']) }}
            </div>

            <div class="col-md-12">
            {{ Form::label('comment','Comment:') }}
            {{ Form::textarea('comment',null, ['class'=>'form-control form-group-sm', 'rows'=>'5']) }}

            {{ Form::submit('Add Comment', ['class' => 'btn btn-sm btn-outline-primary', 'style' => 'margin-top:10px']) }}
            </div>
        </div>
        </div>
    </div>
</div>

    
@endsection