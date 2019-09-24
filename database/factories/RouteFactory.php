<?php

use Faker\Generator as Faker;
use App\Route;

$factory->define(Route::class, function (Faker $faker) {
    return [
	'id' => $faker->uuid,
	'service_id' => function() {
	    return factory(App\Service::class)->create()->id;
	},
	'hosts' => $faker->url,
	'methods' => 'POST,PATCH,PUT,HEAD,DELETE,GET',
	'paths' => $faker->url,
	'protocols' => 'HTTP,HTTPS',
	'preserve_host' => [true, false][rand(0, 1)],
	'strip_path' => [true, false][rand(0, 1)],
	'regex_priority' => rand(0, 6000)
    ];
});
