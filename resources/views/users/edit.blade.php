@extends('templates.home')

@section('title')
    Edit User
@endsection

@section('content')
    <div class="container" >  
        <h3>Form Edit User</h3>
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
                <h5>{{ $user['username'] }}</h5>
            </div>
            <div class="card-body">
                <div class="container text-primary">
                    <form action="{{ route('users.update',$user['id']) }}" method="POST" class="form-group" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                <label for="address" class="text-primary">address</label>
                            </div>
                            <div class="col-md-8">
                                <textarea name="address" class="form-control {{$errors->first('address') ? "is-invalid": ""}}" id="address" cols="20" rows="5">{{ old('address') ? old('address') : $user['address'] }}</textarea>
                                <div class="invalid-feedback">
                                    {{$errors->first('address')}}
                                </div>
                            </div>
                        </div> 
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="phone" class="text-primary">Phone</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" class="form-control {{$errors->first('phone') ? "is-invalid": ""}}" name="phone" id="phone" value="{{ old('phone') ? old('phone') : $user['phone'] }}">
                                <div class="invalid-feedback">
                                    {{$errors->first('phone')}}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="phone" class="text-primary">status</label>
                            </div>
                            <div class="col-md-8">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input {{ $user['status'] == "ACTIVE" ? 'checked':'' }} type="radio" id="active" name="status" class="custom-control-input" value="ACTIVE">
                                    <label class="custom-control-label" for="active">ACTIVE</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input {{ $user['status'] == "INACTIVE" ? 'checked':'' }} type="radio" id="inactive" name="status" class="custom-control-input" value="INACTIVE">
                                    <label class="custom-control-label" for="inactive">INACTIVE</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                Avatar
                            </div>
                            <div class="col-md-8">
                                    <img src="{{asset('storage/'.$user['avatar'])}}" class="img-thumbnail" height="150px" width="150px" alt="">
                                <div class="custom-file">
                                    <label for="avatar" class="custom-file-label">Avatar</label>
                                    <input type="file" class="custom-file-input {{$errors->first('avatar') ? "is-invalid": ""}}"  name="avatar" id="avatar"> 
                                    <div class="invalid-feedback">
                                        {{$errors->first('avatar')}}
                                    </div>
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