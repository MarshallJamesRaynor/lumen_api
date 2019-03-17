<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'               => $faker->name,
        'email'              => $faker->email,
        'active'             => rand(0, 1),
        'gender'             => rand(0, 1) ? 'm' : 'f',
        'birthday'           => $faker->dateTimeBetween('-40 years', '-18 years'),
        'location'           => "{$faker->city}, {$faker->state}",
        'bio'                => $faker->sentence(100),
    ];
});
