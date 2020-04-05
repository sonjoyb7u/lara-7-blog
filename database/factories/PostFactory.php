<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        'user_id' => random_int(1, 2),
        'cat_id' => random_int(1, 10),
        'title' => $faker->sentence,
        'desc' => $faker->realText(),
        'image' => $faker->imageUrl(),

    ];

});



