<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
$factory->define(App\Admin::class, function (Faker $faker) {
    static $password;
    
    static $seed = 0;
    $faker->seed($seed++);
    
    return [
        'name' => $faker->name,
        'username' => $faker->name,
        'password' => bcrypt('1234'),
    ];
});
    