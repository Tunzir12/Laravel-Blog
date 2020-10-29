@extends('main')

@section('title' ,'| Edit')

@section('content')

<div class="row form-margin">
    
    <div class="col-md-8">
        {!! Form::model($post,['route' => ['posts.update', $post->id], 'method' => 'PUT'])!!}

        {{ Form::label('title','Title:')}}
        {{ Form::text('title', null, ["class" => 'form-control form-control-sm'])}}

        {{ Form::label('slug', 'Slug:') }}
        {{ Form::text('slug', null, array('class'=> 'form-control form-control-sm', 'required' =>'', 'maxlength' => '255')) }}

        {{ Form::label('category_id', 'Category:') }}
        {{ Form::select('category_id', $categories, $post->category_id, ['class' => 'form-control']) }}

        {{ Form::label('tags', 'Tags:',[ 'class' => 'form-spacing-top']) }}
        {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-dropdown', 'multiple'=> 'multiple', 'style' => 'width:100%']) }}



        {{ Form::label('body','Body:', ['class' => 'form-spacing-top'])}}
        {{ Form::textarea('body', null, ["class" => 'form-control form-control-sm'])}}
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <dl class="dl-horizontal">
                    <span><strong>Created At:</strong></span>
                    <p>{{date('M j, Y g:i a',strtotime($post->created_at))}}</p>
                </dl>
                <dl class="dl-horizontal">
                    <span><strong>Last Updated At:</strong></span>
                    <p>{{date('M j, Y g:i a',strtotime($post->updated_at))}}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id),array('class' =>'btn btn-sm btn-block btn-outline-danger')) !!}
                    </div>
                    <div class="col-sm-6">

                        {{ Form::submit('Save Changes', ['class'=> 'btn btn-sm btn-block btn-outline-success' ])}}
            
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>

@endsection

@section('scripts')

<script src="https://cdn.tiny.cloud/1/sf5rso8686e4s1wu01fgl5s0865f70fsgeuwvt8f2vjcsvt6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>>
<script type="text/javascript">
  tinymce.init({
    selector: 'textarea',
    plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinymcespellchecker'
  });
  </script>

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script>
       
        $(".select2-dropdown").select2({
        width: 'resolve' // need to override the changed default
        });
    </script>


    {!! Html::script('js/select2.min.js') !!}

    <script>
        $(".select2-dropdown").select2({
        width: 'resolve' // need to override the changed default
        });
    </script>

@endsection