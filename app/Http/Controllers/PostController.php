<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',['posts'=> $posts]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create',['users'=>$users]);
    }

    public function store(Request $request){  
        $request->validate([
            'title'=>'required|min:3|max:100',
            'description'=>'required|min:5|max:200',
            'user_id'=> 'required'
        ]);

        Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>$request->user_id
        ]);

        return redirect()->route('posts.create')->with('status','Post Successfully Created'); 
    }

    public function show($id){
        $post = Post::findOrFail($id);
        return view('posts.show',['post'=>$post]);
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        $users = User::all();
        return view('posts.edit',['post'=>$post,'users'=>$users]);
    }

    public function update(Request $request, $id){
        $post = Post::findOrFail($id);
        $request->validate([
            'title'=>'required|min:3|max:100',
            'description'=>'required|min:5|max:200',
            'user_id'=>'required'
        ]);
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id'=>$request->user_id
        ]);
        return redirect()->route('posts.edit',['post'=>$post])->with('status','Post Successfully Updated');
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('status','Post Successfully Deleted');
    }
}
