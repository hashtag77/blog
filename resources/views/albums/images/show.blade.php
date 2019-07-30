@extends('layouts.app')

@section('content')
	
	<div class="container">
        <a href="{!! route('albums.index') !!}" class="btn btn-sm btn-dark">Go Back</a>
 		<br>
 		<br>
		<div class="card">
				<div class="card-body">
						<div class="row">
								<div class="col-md-8">
										<div class="card">
												<div class="card-body">
														<img src="{{ $image->image->url() }}" style="width:655px; height:400px">
												</div>
										</div>
								</div>
								<div class="col-md-4">
										<div class="card">
												<div class="card-body">
														<small>
																<strong>File Name: </strong>{{ $image->image_file_name }}
																<br>
																<strong>File Size: </strong>{{ $image->image_file_size }} bytes
																<br>
																<strong>File Type: </strong>{{ $image->image_content_type }}
																<br>
																<strong>File Updated At: </strong>{{ $image->updated_at }}
														</small>
														<br><br>
														{!! Form::open(['method' => 'DELETE','route' => ['images.destroy', $image->id], 'onsubmit' => 'return ConfirmDelete()','style'=>'display:inline']) !!}
															{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
														{!! Form::close() !!}
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
    </div>
    <script>
        function ConfirmDelete(){
            return confirm('You are about to delete an Image!!!');
        }
    </script>

@endsection