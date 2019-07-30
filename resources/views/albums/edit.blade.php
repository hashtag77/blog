@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{!! route('albums.index') !!}" class="btn btn-sm btn-dark">Go Back</a>
    </div>
	<br>
	
  {!! Form::model($album, ['method' => 'PATCH','route' => ['albums.update', $album->id],'files'=>true]) !!}
    	<div class="container">
        <div class="card">
          <div class="card-header">
          <h3>Add more images to {{ $album->album_name }}</h3>
          </div>
          <div class="card-body">
            <div class="form-group">
              {{ Form::file('image[]',['multiple'=>'multiple','required']) }}
            <br><br>
              {{ Form::submit('Update',['class'=>'btn btn-primary']) }}
            </div>
          </div>
        </div>
      </div>
    {!! Form::close() !!}
    
@endsection