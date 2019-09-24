<?php

use Faker\Generator as Faker;
use App\Service;

$factory->define(Service::class, function (Faker $faker) {
    return [
	'id' => $faker->uuid,
	'retries' => rand(0, 6000),
	'connect_timeout' => rand(0, 6000),
	'read_timeout' => rand(0, 6000),
	'write_timeout' => rand(0, 6000),
	'port' => rand(0, 6000),
	'host' => $faker->url,
	'name' => $faker->name,
	'path' => $faker->url,
	'protocol' => ['http', 'https'][rand(0, 1)]
    ];
});
