@extends('templates.home')
@section('title')
    Detail User
@endsection

@section('content')
   <h1>Detail User </h1>
   <hr>
   <br>
   <div class="card bg-white border-info" style="max-width:70%; margin:auto; min-height:500px;">
        <div class="row " style="padding:25px">
            <div class="col-md-2 offset-md-5 offset-sm-4">
                <img src="{{asset('storage/'.$user['avatar'])}}" style="height:150px; width:150px;" class="rounded-circle" alt="">
            </div>
        </div>    
        <div class="row">
            <div class="col-md-12 text-center">
                    <h3>{{ $user['username'] }}</h3>
            </div>
        </div>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-2 offset-md-2 col-sm-3 offset-sm-2">
                Email
            </div>
            <div class="col-md-4 col-sm-4">
                {{ $user['email'] }}
            </div>
            <br>
        </div>
        <div class="row">
            <div class="col-md-2 offset-md-2 col-sm-3 offset-sm-2">
                Address
            </div>
            <div class="col-md-4 col-sm-4">
                {{ $user['address'] }}
            </div>
            <br>
        </div>
        <div class="row">
            <div class="col-md-2 offset-md-2 col-sm-3 offset-sm-2">
                Phone
            </div>
            <div class="col-md-4 col-sm-4 ">
                {{ $user['phone'] }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 offset-md-2 col-sm-3 offset-sm-2">
                status
            </div>
            <div class="col-md-4 col-sm-4 ">
                <span class="badge {{ $user['status'] == "ACTIVE" ? "badge-primary" : "badge-danger" }}">{{ $user['status'] }}</span>
            </div>
            <br>
            <br>
        </div>
        <div class="row">
            <div class="col-md-2 offset-md-2 col-sm-3 offset-sm-2">
                Posts
            </div>
            <div class="col-md-4 col-sm-4 ">
                <div class="list-group">
                    @foreach ($user->post as $post)
                        <a href="{{ route('posts.show',['id'=>$post->id]) }}"  class="list-group-item list-group-item-action">{{ $post->title }}</a>
                    @endforeach
                </div>
            </div>
            <br>
        </div>
    </div>
@endsection