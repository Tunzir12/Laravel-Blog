@extends('main')

@section('title', '| Category')

@section('content')
    <div class="row">
        <div class="col-md-8">
        <h1 class="post-index">Category</h1>

        <table class="table form-margin">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>

            <tbody>
                @foreach( $categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        <div class="col-md-3  margin-welcome">

        <div class="card card-body card-bg">
            {!! Form::open(['route' =>'categories.store', 'method' =>'POST']) !!}

            <h4>New Category:</h4>

                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null,["class" =>'form-control form-control-sm']) }}

                {{ Form::submit('Create New Category', ["class" =>'btn btn-sm btn-primary marg']) }}

                {!! Form::close() !!}
        </div>
        </div> 

    </div>
@endsection