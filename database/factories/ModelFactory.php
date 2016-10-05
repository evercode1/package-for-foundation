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












// Begin Widget Factory

$factory->define(App\Widget::class, function (Faker\Generator $faker) {

        $uniqueWord = $faker->unique()->word;
        $slug = str_slug($uniqueWord, "-");

    return [

        'name' => $uniqueWord,
        'slug' => $slug,

    ];

});

// End Widget Factory




// Begin Boom Factory

$factory->define(App\Boom::class, function (Faker\Generator $faker) {

        $uniqueWord = $faker->unique()->word;
        $slug = str_slug($uniqueWord, "-");

    return [

        'name' => $uniqueWord,
        'slug' => $slug,

    ];

});

// End Boom Factory


\n








// Begin Category Factory

$factory->define(App\Category::class, function (Faker\Generator $faker) {

    return [

        'name' => $faker->unique()->word,

    ];

});

// End Category Factory
// Begin Subcategory Factory

$factory->define(App\Subcategory::class, function (Faker\Generator $faker) {
    return [

        'name' => $faker->unique()->word,
        'category_id' => $faker->numberBetween($min = 1, $max = 4),

    ];

});

// End Subcategory Factory