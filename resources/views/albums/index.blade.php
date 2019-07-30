@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="{{ url('/dashboard') }}" class="btn btn-sm btn-dark">Go to Dashboard</a>
        <br><br>
        <div class="card">
            <div class="card-header">
                <span style="font-size:24px" class="text-left">Album<span>
                <a href="{{ route('albums.create') }}" class="btn btn-info float-right">Create an Album</a>          
            </div>

            @if(count($albums)>0)
            
            <div class="card-body">
                <div class="row">
        
                @foreach($albums as $album)        
        
                    <div class="col-md-3">
						          <div class="card">
                        <div class="card-header bg-dark">
                            <p class="text-center" style="font-size:20px">
                                <a href="{{ route('albums.show',[$album->id."-".str_slug($album->album_name)]) }}" style="color:white">
                                    {{ $album->album_name }}
                                </a>
                            </p>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('albums.show',$album->id) }}">
                                <img src="{{ $album->images()->first()->image->url() }}" style="width:200px; height:100px">
                            </a>
                        </div>
                      </div>
                      <br>
                    </div>

                @endforeach
            
                </div>
            </div>
				{{-- <span style="padding-left:20px">{{ $albums->links() }}</span> --}}
            
            @else
				<p style="padding-left:10px; padding-top:10px;">No Albums found</p>
            @endif
            
        </div>
    </div>

@endsection