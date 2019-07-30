@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{!! route('albums.index') !!}" class="btn btn-sm btn-dark">Go Back</a>
    </div>
	<br>
	
    {!! Form::open(['method' => 'POST','route' => 'albums.store','files'=>true]) !!}
    	<div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Create an Album</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {{ Form::text('album_name','',['class'=>'form-control','placeholder'=>'Name your Album','required']) }}
                    <br>
                        {{ Form::file('image[]',['multiple'=>'multiple','required']) }}
                    <br><br>
                        {{ Form::submit('Save',['class'=>'btn btn-info']) }}
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    
@endsection