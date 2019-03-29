<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', 'UserController');
Route::resource('posts', 'PostController');

use App\User;
use App\Profile;
use App\Post;
use App\Category;
Route::get('/create_user', function () {
    $user = User::create([
        'username'=>'joni',
        'email'=>'joni@mail.com',
        'address'=>'jl pramuka no 17',
        'phone'=>'0857845125',
        'status'=>'ACTIVE',
        'avatar'=>'',
        'password'=>Hash::make("123456")
    ]);

    return $user;
}); 

Route::get('/create_profile', function () {
    $profile = Profile::create([
        'user_id'=> 1,
        'religion'=>'islam',
        'job'=>'student'
    ]);

    return $profile;
}); 

Route::get('/create_user_profile', function () {
    $user = User::findOrFail(2);
    
    $profile = new Profile([
        'religion' => 'islam',
        'job'=>'developer'
    ]);

    $user->profile()->save($profile);

    return $user;
});

Route::get('/read_user', function () {
   $user = User::findOrFail(1);
   dd($user->profile->religion);
});

Route::get('/read_profile', function ()
{
    $profile = Profile::findOrFail(1);
    return $profile->user->username;
});

Route::get('/update_profile', function () {
   $user = User::findOrFail(1);
   
   $user->profile()->update([
    'religion' => 'islam',
    'job'=>'software enginer'
   ]);

   return $user->profile;
});

Route::get('/delete_profile', function () {
   $user = User::findOrFail(2);
   $user->profile()->delete();
   return $user;
});

Route::get('/create_categories', function () {
//    $post = Post::findOrFail(1);
   
//    $post->categories()->create([
//         'name'=>'php'
//    ]);

//    return "succes";

    $user = User::create([
        'username'=>'dhani',
        'email'=>'dhani@mail.com',
        'address'=>'jl perjuangan no 17',
        'phone'=>'0857845127',
        'status'=>'ACTIVE',
        'avatar'=>'',
        'password'=>Hash::make("123456")
    ]);

    $user->post()->create([
        'title'=> 'new title',
        'description'=>'new content'
    ])->categories()->create([
        'name'=>'new category'
    ]);

    return "succes";
});

Route::get('/read_category', function () {
   $post = Post::findOrFail(3);
   $categories = $post->categories; 

   foreach ($categories as $category ) {
        echo $category->name."<br>";
   }

    // $category = Category::findOrFail(1);
    // return $category->posts;
});

Route::get('/attach', function () {
    $post = Post::findOrFail(3);

    $post->categories()->attach([1,2,3]);

    return "succces";
});

Route::get('/detach', function () {
   $post = Post::findOrFail(3);
   
   $post->categories()->detach([1,2]);

   return "succes";
});

Route::get('/sync', function () {
   $post = Post::findOrFail(2);
   
   $post->categories()->sync([2]);

   return "success";
});