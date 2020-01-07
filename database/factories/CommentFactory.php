<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\User;
use App\Models\Post;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    $users = User::count();
    $posts = Post::count();
    return [
        "content" => $faker->text($maxNbChars = 100),
        "user_id" => $faker->numberBetween(1, $users),
        "post_id" => $faker->numberBetween(1, $posts)
    ];
});
