@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{!! route('posts.index') !!}" class="btn btn-sm btn-dark">Go Back</a>
    </div>
	<br>
	
    {!! Form::open(['method' => 'POST','route' => 'posts.store']) !!}
    	<div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Create a Post</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {{ Form::text('title','',['class'=>'form-control','placeholder'=>'Title','enctype'=>'multipart/form-data','required']) }}
    			     <br>
                        {{ Form::textarea('body','',['class'=>'form-control','placeholder'=>'Content', 'required']) }}
    			     <br>
                        {{ Form::text('tag','',['class'=>'form-control','placeholder'=>'Tag(s) seperated by comma(,)', 'required']) }}	
                     <br>
                    
                        {{ Form::submit('Submit',['class'=>'btn btn-info']) }}
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    
@endsection