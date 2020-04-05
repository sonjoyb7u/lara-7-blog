<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->unique()->name,
        'slug' => $faker->unique()->slug,
        'status' => random_int(0, 1),
    ];

});
