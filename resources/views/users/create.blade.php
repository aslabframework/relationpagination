@extends('templates.home')
@section('title')
    Create User
@endsection

@section('content')
    <div class="container" >
        <h3>Create User</h3>
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
               <h5> Create a New User</h5>
            </div>
            <div class="card-body">
                <div class="container text-primary">
                    <form action="{{ route('users.store') }}" class="form-group" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row" >
                                <div class="col-md-3">
                                <label for="username" >Username</label>
                            </div>
                            <div class="col-md-8"> 
                                <input value="{{ old('username') }}" type="text" class="form-control {{$errors->first('username') ? "is-invalid": ""}}" name="username" id="username">
                                <div class="invalid-feedback">
                                    {{$errors->first('username')}}
                                </div>
                            </div>
                        </div>
                        <br>  
                        <div class="row" >
                            <div class="col-md-3">
                                <label for="email">email</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ old('email') }}" type="text" class="form-control {{$errors->first('email') ? "is-invalid": ""}}" name="email" id="email">
                                <div class="invalid-feedback">
                                    {{$errors->first('email')}}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row" >
                            <div class="col-md-3">
                                <label for="password">password</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" class="form-control {{$errors->first('password') ? "is-invalid": ""}}" name="password" id="password">
                                <div class="invalid-feedback">
                                    {{$errors->first('password')}}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row" >
                            <div class="col-md-3">
                                <label for="password_confirmation">Password Confirmation</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" class="form-control {{$errors->first('password_confirmation') ? "is-invalid": ""}}" name="password_confirmation" id="password_confirmation">
                                <div class="invalid-feedback">
                                    {{$errors->first('password_confirmation')}}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="address">address</label>
                            </div>
                            <div class="col-md-8">
                                <textarea name="address" class="form-control {{$errors->first('address') ? "is-invalid": ""}}" id="address" cols="20" rows="5">{{ old('address') }}</textarea>
                                <div class="invalid-feedback">
                                    {{$errors->first('address')}}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="phone">phone</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ old('phone') }}" type="number" class="form-control {{$errors->first('phone') ? "is-invalid": ""}}" name="phone" id="phone">
                                <div class="invalid-feedback">
                                    {{$errors->first('phone')}}
                                </div>
                               
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                Avatar
                            </div>
                            <div class="col-md-8">
                                <div class="custom-file">
                                    <label for="avatar" class="custom-file-label">avatar</label>
                                    <input type="file" class="custom-file-input {{$errors->first('avatar') ? "is-invalid": ""}}" name="avatar" id="avatar">
                                    <div class="invalid-feedback">
                                        {{$errors->first('avatar')}}
                                    </div>
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