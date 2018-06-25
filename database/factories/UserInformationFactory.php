<?php
use App\UserInformation;
use Faker\Provider\DateTime;
use Faker\Provider\en_US\Address;

use Faker\Generator as Faker;

$factory->define(UserInformation::class, function (Faker $faker) {
    return [
        'gender' => $faker->randomElement(['male', 'female']),
        'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'address' => $faker->address,
    ];
});
