<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DispatchStatus;
use Faker\Generator as Faker;

$factory->define(DispatchStatus::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
