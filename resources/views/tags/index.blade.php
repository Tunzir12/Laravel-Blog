@extends('main')

@section('title', '| Tag Index')

@section('content')

    <div class="row">
        <div class="col-md-8">
        <h1 class="post-index">Tags</h1>

        <table class="table form-margin">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>

            <tbody>
                @foreach( $tags as $tag)
                    <tr>
                       <th>{{ $tag->id }}</th>
                       <td><a href="{{ route('tags.show', $tag->id) }}" >{{ $tag->name }}</a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        <div class="col-md-3  margin-welcome">
            <div class="card card-body card-bg">
                {!! Form::open(['route' =>'tags.store', 'method' =>'POST']) !!}

                <h4>New Tag:</h4>

                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null,["class" =>'form-control form-control-sm']) }}

                {{ Form::submit('Create New Tag', ["class" =>'btn btn-sm btn-primary form-control form-spacing-top']) }}

                {!! Form::close() !!}
            </div>
        
        
        </div> 

    </div>

@endsection