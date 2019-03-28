<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Post::class, function (Faker $faker) {
    
    $word = $faker->word;
    $text = $faker->text;
    
    return [
        'title'=> $word,
        'description' => $text,
        'user_id'=>function ()
        {
            return User::all()->random();
        }
    ];
});
