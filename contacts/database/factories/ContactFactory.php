<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Contact;
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

$factory->define(Contact::class, function (Faker $faker) {
    return [
        //'street_address' => $faker->unique()->randomNumber($nbDigits = 3). ' '.$faker->randomElement(['Lukin', 'Ross','McGhee']),
        //'suburb' => $faker->randomElement(['Ringwood', 'Mitcham','Box Hill']),
        //'pincode' => $faker->unique()->randomNumber($nbDigits = 4)
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone_mobile' => $faker->unique()->randomNumber($nbDigits = 5),
        'company' => $faker->randomElement(['CompanyA', 'CompanyB','CompanyC']),
        'position' => $faker->randomElement(['PosA', 'PosB','PosC']),
        'dob' => $faker->dateTimeBetween($startDate = '-100 years', $endDate = 'now')

    ];
});
