@extends('layouts.app')

@section('content')
	<div class="container">
        <a href="{!! route('posts.index') !!}" class="btn btn-sm btn-dark">Go Back</a>
    </div>
    <br>

	{!! Form::model($post, ['method' => 'PATCH','route' => ['posts.update', $post->id]]) !!}
    	<div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Post</h3>
                </div>
                    <div class="card-body">
                        <div class="form-group">
    			             {{ Form::text('title',null,['class'=>'form-control','placeholder'=>'Title', 'required']) }}
    			             <br>
    			             {{ Form::textarea('body',null,['class'=>'form-control','placeholder'=>'Content', 'required']) }}
    			             <br>
    			             {{ Form::text('tag',null,['class'=>'form-control','placeholder'=>'Tag(s) seperated by comma(,)', 'required']) }}	
    			             <br>
    			             {{ Form::submit('Update',['class'=>'btn btn-primary']) }}
                         </div>
                    </div>
                </div>
            </div>
	   </div>
	{!! Form::close() !!}

@endsection