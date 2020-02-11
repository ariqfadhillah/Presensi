<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Detail::class, function (Faker $faker) {
    return [
        'deviceSN' => 'ACEH191360112',
        'pin' => '0211',
        'time' => $faker->dateTime($max = 'now', $timezone = null),
        'status' => '0',
        'verify' => '1',
    ];
});
