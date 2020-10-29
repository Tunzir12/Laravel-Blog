@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')
{!! Html::style('css/parsley.css')!!}

@endsection


@section('content')
    <div class="row form-margin">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="display-4 text-capitalize"> create new post</h1>
            <hr>
            {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
            
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class'=> 'form-control', 'required' =>'','minlength' => '5', 'maxlength' => '255')) }}

            {{ Form::label('slug', 'Slug:') }}
            {{  Form::text('slug', null, array('class'=> 'form-control', 'required' =>'', 'maxlength' => '255')) }}

            {{ Form::label('category_id', 'Category:') }}

            <select name="category_id" class="form-control">

            @foreach( $categories as $category )
                <option value="{{ $category->id }}">{{ $category->name}}</option>
            @endforeach
               
            </select>

            {{ Form::label('tags', 'Tags:') }}

            <select name="tags[]" class="form-control select2-dropdown" multiple="multiple" style="width:100%">

            @foreach( $tags as $tag )
                <option value="{{ $tag->id }}">{{ $tag->name}}</option>
            @endforeach
               
            </select>
            {{
                Form::label('body',"Post body:")
            }}
            {{
                Form::textarea('body', null, array('class'=> 'form-control', 'required' =>''))
            }}
            {{
                form::submit('Create Post', array('class'=> 'btn btn-primary btn-md form-spacing-top'))
            }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection



@section('scripts')

<script src="https://cdn.tiny.cloud/1/sf5rso8686e4s1wu01fgl5s0865f70fsgeuwvt8f2vjcsvt6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>>
<script type="text/javascript">
  tinymce.init({
    selector: 'textarea',
    plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinymcespellchecker',
    menubar: false
  });
  </script>

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script>
       
        $(".select2-dropdown").select2({
        width: 'resolve' // need to override the changed default
        });
    </script>

@endsection