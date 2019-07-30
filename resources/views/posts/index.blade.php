@extends('layouts.app')

@section('content')
	
	<div class="container">
		<a href="{{ route('posts.create') }}" class="btn btn-sm btn-success">Create A Blog Post</a>
	</div>
	<br>
	<div class="container">
		<div class="card">
			<div class="card-header">Blog Post(s)</div>
				
			@if(count($posts)>0)
				@foreach($posts as $post)
					<div class="card-body">
						<h2><a href="{{ route('posts.show',[$post->id."-".str_slug($post->title)]) }}">{{ $post->title }}</a></h2>
						<h5>{{ Helper::truncate($post->body, 200) }}</h5>
						<p>Tag(s): {{ $post->tag }}</p>
						<small>Created by: {{ $post->user->name }}</small>
						<br>
						<small>Last Updated: {{ $post->updated_at }}</small>
						<br><br>

						@if(!Auth::guest())
							@if(Auth::user()->isAdmin())
								
								<a href="{!! route('posts.edit',$post->id) !!}"><button class="btn btn-sm btn-info">Edit</button></a>
								{!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id], 'onsubmit' => 'return ConfirmDelete()','style'=>'display:inline']) !!}
									{!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
								{!! Form::close() !!}
							
							@else
								<a href="{!! route('posts.edit',$post->id) !!}"><button class="btn btn-sm btn-info">Edit</button></a>
	        		@endif
						@endif
						
					</div>
					<hr>
					
				@endforeach
				
				<span style="padding-left:20px">{{ $posts->links() }}</span>
			@else
				<p style="padding-left:10px; padding-top:10px;">No Posts found</p>
			@endif
		</div>
	</div>

	<script>
		function ConfirmDelete(){
			return confirm('Are you sure?');
		}
	</script>

@endsection