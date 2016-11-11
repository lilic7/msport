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
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
    ];
});

$factory->define(App\Video::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'length' => $faker->numberBetween(5, 3600),
        'frames' => $faker->numberBetween(0, 99),
        'path' => $faker->url,
        'onair' => $faker->boolean()
    ];
});

$factory->define(App\Promo::class, function () {
    return [];
});

$factory->define(App\PromoType::class, function () {
    return [
        'type' => 'general'
    ];
});

$factory->define(App\PlayblockType::class, function () {
    return [
        'title' => 'promo'
    ];
});

$factory->define(App\Playblock::class, function () {
    return [
        'title' => 'promo',
        'length' => 0
    ];
});