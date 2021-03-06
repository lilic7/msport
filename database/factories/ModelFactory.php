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
        'title' => $faker->word.$faker->numberBetween(10,1000),
    ];
});

$factory->define(App\Video::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'duration' => $faker->numberBetween(5, 120),
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

$factory->define(App\PlayblockStructure::class, function () {
    return [
        'playblock_type_id' => 1,
        'var_name' => 'bilaPromo',
        'var_value' => 1,
        'var_value_type' => App\Video::class
    ];
});

$factory->define(App\Playblock::class, function () {
    return [
        'title' => 'promo',
        'duration' => 0,
        'frames' => 0
    ];
});


$factory->define(App\PromoPlayblock::class, function(){
    return [
        'title'     => "test promo playblock",
        'duration'  => 0,
        'frames'    => 0
    ];
});