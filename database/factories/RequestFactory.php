<?php

use Faker\Generator as Faker;
use App\Request;

$factory->define(Request::class, function (Faker $faker) {
    return [
	'id' => $faker->uuid,
	'route_id' => function() {
	    return factory(App\Route::class)->create()->id;
	},
	'consumer_request_id' => function() {
	    return factory(App\ConsumerRequest::class)->create()->id;
	},
	'method' => [
	    'GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD'
	][rand(0, 5)],
	'uri' => $faker->url,
	'url' => $faker->url,
	'size' => rand(0, 6000),
	'headers' => json_encode(['key' => 'value'])
    ];
});
