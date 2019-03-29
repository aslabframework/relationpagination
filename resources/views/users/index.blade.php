@extends('templates.home')
@section('title')
    List User
@endsection
@section('css')
<style>
    body{
        padding-top: 30px;
    }
    th, td {
      padding: 10px;
      text-align: center;
    }
    td a{
        margin: 3px;
        align-content: center;
        color: white;          
    }
    td a:hover{
        text-decoration: none;
    }
    td button{
        margin-top: 5px;
        cursor: pointer;
    }
    </style>
@endsection
@section('content')
    <div class="container">
        <h3> List User</h3>
        <hr>
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif 
        <div class="row">
            <div class="col-md-2">
                <a class="btn btn-outline-primary " href="{{ route('users.create') }}">
                    <span data-feather="plus-circle"></span>
                    Add<span class="sr-only">(current)</span>
                </a>
            </div>
        </div>
        <br>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">id</th>
                        <th scope="col">username</th>
                        <th scope="col">email</th>
                        <th scope="col">phone</th>
                        <th scope="col">picture</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['username'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['phone'] }}</td>
                        <td>
                            @if ($user['avatar'])
                                <img src="{{ asset('storage/'.$user['avatar']) }}" alt="" width="80px">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <a class="btn-sm btn-primary" href="{{ route('users.show',$user['id']) }}">
                                <span data-feather="eye"></span>
                                Detail <span class="sr-only">(current)</span></a>
                            <a class="btn-sm btn-success d-inline" href="{{ route('users.edit',$user['id']) }}">
                                <span data-feather="edit-2"></span>
                                Edit <span class="sr-only">(current)</span></a>
                            <form class="d-inline"
                            onsubmit="return confirm('Delete this user permanently?')" 
                            action="{{route('users.destroy', $user['id'])}}" 
                            method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-sm btn-danger" value="Delete">
                                    <span data-feather="trash"></span>
                                    Delete <span class="sr-only">(current)</span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                {{$users->links()}}
            </div>
        </div>
    </div>
@endsection
