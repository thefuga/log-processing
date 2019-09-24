<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;
use App\Service;
use App\Helpers\FileHandler;

class AverageLatencyTimeCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'service:latencies {output_file}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 
	'Writes the average latency time of all services to a CSV file';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
	$this->fileHandler = new FileHandler($this->argument('output_file'));
	$this->fileHandler->append(
	    'service_id,proxy_latency,kong_latency,request_latency'
	);

	# As the averageLatencyTime method may perform several queries, this 
	# Collection::chunk call is a workaround to avoid memory exhaustion when
	# performing these queries on all services.
	Service::chunk(1, function ($services) {
	    foreach ($services as $service) {
		$this->fileHandler->append([
	    	    $service->id,
	    	    $service->averageLatencyTime('proxyLatency'),
	    	    $service->averageLatencyTime('kongLatency'),
	    	    $service->averageLatencyTime('requestLatency')
	    	]);
	    }
	});
    }
}
