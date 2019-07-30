@extends('layouts.app')

@section('content')
	
	<div class="container">
        <a href="{!! route('posts.index') !!}" class="btn btn-sm btn-dark">Go Back</a>
 		<br>
 		<br>
		
		<div class="card">
			<center>
			<div class="card-header">
				<h1>{!! $post->title !!}</h1>
			</div>
			<div class="card-body">
				<h5 class="text-justify">{!! $post->body !!}</h5>
				<p>Tag(s): {{ $post->tag }}</p>
						
				<small>Created by: {{ $post->user->name }}</small>
				<br>
						
				<small>Last Updated: {{ $post->updated_at }}</small>
				<hr>

				@if(!Auth::guest())
					@if(Auth::user()->isAdmin())
						<a href="{!! route('posts.edit',$post->id) !!}" class="btn btn-info">Edit</a>
				
						{!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id], 'onsubmit' => 'return ConfirmDelete()','style'=>'display:inline']) !!}
	       					{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					@else
						<a href="{!! route('posts.edit',$post->id) !!}" class="btn btn-info">Edit</a>
					@endif
	        	@endif
			</div></center>
		</div>
	</div>

	<script>
		function ConfirmDelete(){
			return confirm('Are you sure?');
		}
	</script>

@endsection