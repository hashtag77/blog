@extends('layouts.app')

@section('content')
	
	<div class="container">
		<a href="{!! route('albums.index') !!}" class="btn btn-sm btn-dark">Go Back</a>
 		<br>
 		<br>
		<div class="card">
			<div class="card-header">
				<span style="font-size:24px" class="text-left">{!! $album->album_name !!}<span>
				<span class="float-right" style="margin-left:10px">
					<a href="{{ route('albums.edit',$album->id) }}" class="btn btn-success">Add More Images</a>
				</span>
				<span class="float-right">
					<a href="{{ route('albums.create') }}" class="btn btn-info">Create an Album</a>
				</span>
			</div>
			<div class="card-body">
				<div class="row">

					@foreach($album->images as $image)

						<div class="col-md-4">
							<div class="card">
								<div class="card-body">
									<a href="{{ route('images.show',[$image->id."-".str_slug($album->album_name)."-".str_slug($image->image_file_name)]) }}">
										<img src="{{ $image->image->url() }}" style="width:295px; height:150px">
									</a>
									<br>
									<hr>
									<small>
										<strong>File Name: </strong>{{ $image->image_file_name }}
										<br>
										<strong>File Size: </strong>{{ $image->image_file_size }} bytes
										<br>
										<strong>File Type: </strong>{{ $image->image_content_type }}
										<br>
										<strong>File Updated At: </strong>{{ $image->updated_at }}
									</small>
								</div>
							</div>
							<br>
						</div>

					@endforeach
				
				</div>
			</div>
		</div>
	</div>
    {{-- <script>
            function ConfirmDelete(){
                return confirm('You are about to delete this Album!!!');
            }
    </script> --}}

@endsection