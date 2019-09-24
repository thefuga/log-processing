<?php

use App\ConsumerRequest;

$factory->define(ConsumerRequest::class, function () {
    return [
	'consumer_id' => function() {
	    return factory(App\Consumer::class)->create()->id;
	},
	'latencies' => json_encode([
	    'proxy' => rand(0, 6000),
	    'kong' => rand(0, 6000),
	    'request' => rand(0, 6000)
	])
    ];
});
