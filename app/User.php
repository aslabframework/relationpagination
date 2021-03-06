<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'email', 'password','address','phone','status','avatar'
    ];

    protected $guarded=['id'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

}
