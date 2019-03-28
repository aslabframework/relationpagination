@extends('templates.home')
@section('title')
    Create Posts
@endsection
@section('content')
    <div class="container" >
        <h3>Create Posts</h3>
        <hr>
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif 
        <div class="card  border-primary" style="max-width: 70%; margin:auto; margin-top:40px;">
            <div class="card-header bg-primary text-white">
               <h5> Create a New Course</h5>
            </div>
            <div class="card-body">
                <div class="container text-primary">
                    <form action="{{ route('posts.store') }}" class="form-group" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row" >
                                <div class="col-md-3">
                                <label for="title" >title</label>
                            </div>
                            <div class="col-md-8"> 
                                <input value="{{ old('title') }}" type="text" class="form-control {{ $errors->first('title')? "is-invalid": "" }}" name="title" id="title">
                                <div class="invalid-feedback">
                                    {{$errors->first('title')}}
                                </div>
                            </div>
                        </div>
                        <br>  
                        <div class="row">
                            <div class="col-md-3">
                                <label for="description">Description</label>
                            </div>
                            <div class="col-md-8">
                                <textarea  type="number" class="form-control {{$errors->first('description') ? "is-invalid": ""}}" name="description" id="description" cols="20" rows="5">{{ old('description') }}</textarea>
                                <div class="invalid-feedback">
                                    {{$errors->first('description')}}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="user_id">user</label>
                            </div>
                            <div class="col-md-8">
                                <select name="user_id" id="user_id" class="form-control {{$errors->first('user_id') ? "is-invalid": ""}}">
                                    <option value="">Select User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{$errors->first('user_id')}}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3 offset-md-5 offset-sm-4">
                                <button type="submit" class="btn btn-outline-primary">Create</button>
                            </div>   
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection