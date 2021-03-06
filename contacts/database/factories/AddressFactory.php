<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Address;
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

$factory->define(Address::class, function (Faker $faker) {
    return [
        'contact_id' => factory('App\Contact')->create()->id,
        'type' => $faker->randomElement(['Work', 'Postal']),
        'street_address' => $faker->unique()->randomNumber($nbDigits = 4).' '.$faker->word.' '.$faker->randomElement(['Street', 'Road', 'Avenue']),
        'suburb' => $faker->word,
        'pincode' => $faker->unique()->randomNumber($nbDigits = 4)


    ];
});
