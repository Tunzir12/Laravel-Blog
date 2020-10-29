@extends('main')

@section('title', '| view post')
    
@section('content')
 <div class="row margin-welcome">
    <div class="col-md-8">
        <h1 class="display-5 text-capitalize">
            {{ $post->title }}
        </h1>
        <p class="lead">
            {!! $post->body !!}
        </p>

        @foreach( $post->tags as $tag )
        <span class="label text-capitalize"> {{ $tag->name }}
        </span>
        @endforeach

        
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">

                <dl class="dl-horizontal">
                    <span><strong>Category:</strong></span>
                    <p>{{ $post->category->name }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Url Slug:</dt>
                    <dd><a href="{{ url('blog', $post->slug) }}">{{ url('blog',$post->slug) }}</a></dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{date('M j, Y h:ia',strtotime($post->created_at))}}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated At:</dt>
                    <dd>{{date('M j, Y h:ia',strtotime($post->updated_at))}}</dd>
                </dl>

                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.edit', 'Edit', array($post->id),array('class' =>'btn btn-sm btn-block btn-outline-primary')) !!}
                    </div>
                    <div class="col-sm-6">

                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE'])!!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-block btn-outline-danger '])!!}

                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-spacing-top">
                    {!! Html::linkRoute('posts.index', 'Back to index', array($post->id),array('class' =>'btn btn-sm btn-block btn-outline-primary')) !!}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
 </div>
 
@endsection