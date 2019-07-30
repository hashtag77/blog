@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="{{ url('/dashboard') }}" class="btn btn-sm btn-dark">Go to Dashboard</a>
        <br><br>
        <div class="card">
            <div class="card-header text-center">
                <h3>Logouts<h3>
            </div>      
            <div class="card-body text-center">
                        
                @if(count($logouts)>0)
                            
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">   
                            <tr>
                                <th>User ID</th>
                                <th>IP Address</th>
                                <th>Event</th>
                                <th>Remember Me</th>
                                <th>Created At</th>
                                {{-- <th>Delete</th> --}}
                            </tr>
                        </thead>

                        @foreach($logouts as $logout)
                                    
                            <tbody>   
                                <tr>
                                    <td>{{ $logout->user_id }}</td>
                                    <td>{{ $logout->ip_address }}</td>
                                    <td>{{ $logout->event }}</td>
                                    <td>{{ $logout->remember }}</td>
                                    <td>{{ $logout->created_at }}</td>
                                    {{-- <td>
                                            {!! Form::open(['method' => 'DELETE','route' => ['', $logout->id], 'onsubmit' => 'return ConfirmDelete()','style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                            {!! Form::close() !!}
                                    </td> --}}
                                </tr>
                            </tbody>
        
                        @endforeach

                    </table>
                    <span style="padding-left:20px">{{ $logouts->links() }}</span>
                @endif

            </div>
        </div>
    </div>
    <script>
            function ConfirmDelete(){
                return confirm('You are about to delete a Log!!!');
            }
    </script>
@endsection