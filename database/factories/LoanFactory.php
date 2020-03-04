<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
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

use App\Loan;
use Faker\Generator as Faker;

$factory->define(Loan::class, function (Faker $faker) {

    static $seed = 0;
    $faker->seed($seed++);
    
    return [
        'registerdate' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = '-20 days'),
        'returndate' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = '-10 days'),
        'duedate'=> $faker->dateTimeBetween($startDate = '-1 years', $endDate = '-10 days'),
        'status'=>$faker->numberBetween(4,5), // returned or canceled
        'user_id'=>$faker->numberBetween(1,3),
        'book_id'=>$faker->numberBetween(1,15),
    ];
});
