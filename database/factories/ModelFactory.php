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
        'uuid'               => $faker->uuid,
        'username'           => $faker->userName,
        'email'              => $faker->email,
        'password'           => \Illuminate\Support\Facades\Hash::make('pass'),
        'active'             => rand(0, 1),
        'gender'             => rand(0, 1) ? 'm' : 'f',
        'birthday'           => $faker->dateTimeBetween('-40 years', '-18 years'),
        'bio'                => $faker->sentence(100),
    ];
});

$factory->define(App\Tax::class, function (Faker\Generator $faker) {
    return [
        'rate'               => $faker->randomFloat(4,100,0),
        'active'             => rand(0, 1),
    ];
});

$factory->define(App\Address::class, function (Faker\Generator $faker) {
    return [
        'user_id'           => App\User::all()->random()->id,
        'country_id'       => App\Country::all()->random()->id,
        'last_name'          => $faker->lastName,
        'first_name'         => $faker->firstName,
        'address_1'          => $faker->streetAddress,
        'address_2'          => $faker->streetAddress,
        'postcode'           => $faker->postcode,
        'city'               => $faker->city,
        'phone'              => $faker->e164PhoneNumber,
        'active'             => rand(0, 1),
    ];
});

$factory->define(App\Country::class, function (Faker\Generator $faker) {
    return [
        'name'               => $faker->country,
        'iso_code'           => $faker->countryCode,
        'locale'             => $faker->locale,
        'active'             => rand(0, 1),
    ];
});

$factory->define(App\Currency::class, function (Faker\Generator $faker) {
    return [
        'iso_code'           => $faker->currencyCode,
        'conversion_rate'    => $faker->randomFloat(6,100000,0),
        'country_id'       => App\Country::all()->random()->id,
    ];
});


$factory->define(App\Merchant::class, function (Faker\Generator $faker) {
    return [
        'name'               => $faker->userName,
        'country_id'       => App\Country::all()->random()->id,
        'active'             => rand(0, 1),
    ];
});


$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'uuid'               => $faker->uuid,
        'price'              => $faker->randomNumber(2),
        'name'               => $faker->word,
        'ean'                => $faker->ean13,
        'merchant_id'       => App\Merchant::all()->random()->id,
        'out_of_stock'       => rand(0, 1),
        'on_sale'            => rand(0, 1),
        'active'             => rand(0, 1),
    ];
});
