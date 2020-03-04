<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    static $password;
    
    static $seed = 0;
    $faker->seed($seed++);   
    
    return [
        'organization' => $faker->numberBetween(1,2),
        'course' => $faker->realText($maxNbChars = 20, $indexSize = 1),        
        'name' => $faker->firstName,
        'gender'=> $faker->randomElements(['male', 'female'])[0],
        'nrc'=>$faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => $faker->dateTime,
        'password' => $password = bcrypt('user'),
        'phone'=>$faker->PhoneNumber,
        'address'=>$faker->address,
        'provider' => $faker->randomletter,	 // add
        'provider_id'=>$faker->randomDigit,	 // add        
        'remember_token' => str_random(10),        
    ];
});
