@extends('main')

@section('title', '| edit tag')

@section('content')

{{ Form::model($tag, ['route' => ['tags.update', $tag->id ], 'method'=> 'PUT']) }}

{{ Form::label('name', 'Name:') }}
{{ Form::text('name', null, ['class' => 'form-control']) }}

{{ Form::submit('Save Changes',['class'=> 'btn btn-outline-success marg']) }}

{{Form::close() }}

@endsection