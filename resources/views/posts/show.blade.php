@extends('templates.home')
@section('title')
    Detail Post
@endsection

@section('content')
   <h1>Detail Post </h1>
   <hr>
   <br>
   <div class="card bg-white border-info" style="max-width:70%; margin:auto; min-height:400px;">   
        <div class="row">
            <div class="col-md-12 text-center">
                    <h3>{{ $post['title'] }}</h3>
            </div>
        </div>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-2 offset-md-2 col-sm-3 offset-sm-2">
                Id
            </div>
            <div class="col-md-4 col-sm-4">
                {{ $post['id'] }}
            </div>
            <br>
        </div>
        <div class="row">
            <div class="col-md-2 offset-md-2 col-sm-3 offset-sm-2">
                Name
            </div>
            <div class="col-md-4 col-sm-4">
                {{ $post['title'] }}
            </div>
            <br>
        </div>
        <div class="row">
                <div class="col-md-2 offset-md-2 col-sm-3 offset-sm-2">
                    User
                </div>
                <div class="col-md-4 col-sm-4">
                    {{ $post->user->username }}
                </div>
                <br>
            </div>
        <div class="row">
            <div class="col-md-2 offset-md-2 col-sm-3 offset-sm-2">
                Description
            </div>
            <div class="col-md-4 col-sm-4 ">
                {{ $post['description'] }}
            </div>
        </div>
    </div>
@endsection