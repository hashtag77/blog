@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="{{ url('/dashboard') }}" class="btn btn-sm btn-dark">Go to Dashboard</a>
        <br><br>
        <div class="card">
            <div class="card-header text-center">
                <h3>All Users<h3>
            </div>
            <div class="card-body text-center">
                <table class="table table-hover table-bordered">
                        <thead class="thead-dark">   
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Last Sign In At</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                    
                        @foreach($allusers as $alluser)
                        
                        <tbody>   
                            <tr>
                                <td>{{ $alluser->name }}</td>
                                <td>{{ $alluser->email }}</td>
                                <td>{{ $alluser->created_at }}</td>
                                <td>{{ $alluser->updated_at }}</td>
                                <td>{{ $alluser->last_sign_in_at }}</td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['dashboard.destroy', $alluser->id], 'onsubmit' => 'return ConfirmDelete()','style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td> 
                            </tr>
                        </tbody>
                        
                        @endforeach

                </table>
                <span style="padding-left:20px">{{ $allusers->links() }}</span>
            </div>
        </div>
    </div>
    <script>
        function ConfirmDelete(){
            return confirm('You are about to delete a User!!!');
        }
    </script>
@endsection