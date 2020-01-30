<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Presensi::class, function (Faker $faker) {
    return [
        'serialnumber' => $faker->e164PhoneNumber,
        'timeZoneAdj' => $faker->randomElement(['7','8','9']),
        'location' => $faker->timezone,
    ];
});
