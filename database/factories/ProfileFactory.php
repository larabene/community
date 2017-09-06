<?php

use App\Profile;
use App\User;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'active'          => true,
        'available'       => $faker->boolean(),
        'name'            => $faker->company,
        'address'         => $faker->address,
        'zipcode'         => $faker->postcode,
        'city'            => $faker->city,
        'country'         => $faker->country,
        'coordinates_lat' => $faker->latitude,
        'coordinates_lng' => $faker->longitude,
        'website'         => $faker->url,
        'emailaddress'    => $faker->safeEmail,
        'telephone'       => $faker->phoneNumber,
        'mobile'          => $faker->phoneNumber,
        'intro'           => $faker->sentence,
        'about'           => $faker->paragraph,
        'hourly_rate'     => $faker->randomFloat(2, 20, 100),
        'founded_at'      => $faker->year,
    ];
});
