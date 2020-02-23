<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Book;
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

$define = $factory->define(Book::class, function (Faker $faker) {
    static $seed = 0;
    $faker->seed($seed++);
    
    return [
        'book_title' => $faker-> catchPhrase,
        'author'=>$faker->name,
        'publisher'=>$faker->company,
        'published'=>$faker->datetime($max='now')
    ];
});
