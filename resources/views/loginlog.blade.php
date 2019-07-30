@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="{{ url('/dashboard') }}" class="btn btn-sm btn-dark">Go to Dashboard</a>
        <br><br>
        <div class="card">
            <div class="card-header">
                <h3 class="text-left">Logins Log<h3>
            </div>
            <div class="card-body text-center">
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">   
                        <tr>
                            <th>User ID</th>
                            <th>IP Address</th>
                            <th>Event</th>
                            <th>Remember Me</th>
                            <th>Created At</th>
                            <th>Show</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    @foreach($logins as $login)
                        
                        <tbody>   
                            <tr>
                                <td>{{ $login->user_id }}</td>
                                <td>{{ $login->ip_address }}</td>
                                <td>{{ $login->event }}</td>
                                <td>{{ $login->remember }}</td>
                                <td>{{ $login->created_at }}</td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['dashboard.destroy', $login->id], 'onsubmit' => 'return ConfirmDelete()','style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        </tbody>
                    
                    @endforeach
                    
                </table>
                <span style="padding-left:20px">{{ $logins->links() }}</span>
            </div>
        </div>
    </div>
    <script>
            function ConfirmDelete(){
                return confirm('You are about to delete a Log!!!');
            }
    </script>
@endsection