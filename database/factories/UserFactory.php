<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->country,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'password' => '7C222FB2927D828AF22F592134E8932480637C0D', // HASH encode of 12345678
        'roles' =>$faker->randomNumber($min = 1, max = 2),
        'remember_token' => Str::random(10),
        'created_at' => new DateTime,
        'updated_at' => new DateTime
    ];
});
