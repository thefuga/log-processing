<?php

use Faker\Generator as Faker;
use App\Response;

$factory->define(Response::class, function (Faker $faker) {
    return [
	'id' => $faker->uuid,
	'request_id' => function() {
	    return factory(App\Request::class)->create()->id;
	},
	'status' => strval(rand(0, 500)),
	'size' => rand(0, 6000),
	'headers' => json_encode(['key' => 'value'])
    ];
});
