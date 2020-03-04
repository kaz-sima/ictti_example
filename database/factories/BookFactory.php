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

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {

    static $seed = 0;
    $faker->seed($seed++);
    
    return [
        'book_img' => '',
        'book_title' => $faker-> catchPhrase,
        'author'=>$faker->name,
        'publisher'=>$faker->company,
        'published'=>$faker->datetime($max='now'),
        'lendingstatus'=>$faker->numberBetween(1,1), // add
        'ctgry_id'=>$faker->numberBetween(1,4),
        'subctgry_id'=>$faker->numberBetween(1,10),
    ];
});
