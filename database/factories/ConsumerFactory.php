<?php

use Faker\Generator as Faker;
use App\Consumer;

$factory->define(Consumer::class, function (Faker $faker) {
    return ['id' => $faker->uuid];
});
