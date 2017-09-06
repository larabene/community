<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'tag'   => $faker->words(2, true),
        'color' => $faker->hexColor,
    ];
});
