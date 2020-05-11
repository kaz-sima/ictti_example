<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    static $password;
    
    static $seed = 0;
    $faker->seed($seed++);
    
    return [
        'name' => $faker->name,
        'username' => $faker->name,
        'password' => bcrypt('1234'),
    ];    
});
