@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h1>Dashboard</h1><hr>
                <a href="{!! route('posts.create') !!}" class="btn btn-success">Create A Blog Post</a>
                <a href="{!! route('albums.index') !!}" class="btn btn-secondary">Go to Albums</a>
            </div>

            <div class="card-body">
                <center><h5>Your Blog Post(s)</h5></center>
                        
                @if(count($posts)>0)
                    
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>    
                                <th>Title</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Edit</th>
                                @if(Auth::user()->isAdmin())
                                    <th>Delete</th>
                                @endif        
                            </tr>
                        </thead>

                        @foreach($posts as $post)

                            <tbody>   
                                <tr>
                                    <td><a href="{{ route('posts.show',$post->id) }}">{{ $post->title }}</a></td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                    <td><a href="{!! route('posts.edit',$post->id) !!}" class="btn btn-sm btn-info">Edit</a></td>
                                    @if(Auth::user()->isAdmin())
                                        <td>
                                        {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id], 'onsubmit' => 'return ConfirmDelete()','style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                        {!! Form::close() !!}
                                        </td>
                                    @endif
                                </tr>
                        </tbody>

                        @endforeach
                    </table>
                        
                @else
                    <p>You have no blog posts!!!</p>
                @endif

            </div>
        </div>
    </div>

    <script>
        function ConfirmDelete(){
            return confirm('Are you sure?');
        }
    </script>

@endsection
