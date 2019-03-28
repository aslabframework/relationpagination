@extends('templates.home')
@section('title')
    Edit Post
@endsection
@section('content')
    <div class="container" >  
        <h3>Form Edit Post</h3>
        <hr>
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif 
        <div class="card border-primary" style="max-width: 70%; margin:auto; margin-top:40px;">
            <div class="card-header bg-primary text-white">
                <h5>{{ $post['title'] }}</h5>
            </div>
            <div class="card-body">
                <div class="container text-primary">
                    <form action="{{ route('posts.update',$post['id']) }}" method="POST" class="form-group">
                        @csrf
                        @method('PUT')
                        <div class="row" >
                            <div class="col-md-3">
                                <label for="title" class="text-primary">title</label>
                            </div>
                            <div class="col-md-8">   
                                <input type="text" class="form-control {{ $errors->first('title')?"is-invalid":"" }}" name="title" id="title" value="{{ old('title') ? old('title') : $post['title'] }}">
                                <div class="invalid-feedback">
                                    {{$errors->first('title')}}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="description" class="text-primary">description</label>
                            </div>
                            <div class="col-md-8">
                                <textarea type="number" class="form-control {{ $errors->first('description')?"is-invalid":"" }}" 
                                    name="description" id="description" cols="20" rows="5" >{{ old('description') ? old('description') :$post['description'] }}
                                </textarea>
                                <div class="invalid-feedback">
                                    {{$errors->first('credits')}}
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
                                        <option value="{{ $user->id }}" {{ $post->user_id==$user->id ? "selected":'' }}>{{ $user->username }}</option>
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
                                <button type="submit" class="btn btn-outline-primary" >Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
@endsection