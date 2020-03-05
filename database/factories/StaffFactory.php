<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Staff;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(Staff::class, function (Faker $faker) {
    static $password;
    
    static $seed = 0;
    $faker->seed($seed++);
        
    return [
        'name' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,        
        'password' => bcrypt('staff'),
        'remember_token' => str_random(10),
    ];
});
