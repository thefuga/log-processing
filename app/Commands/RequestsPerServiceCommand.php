<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;
use App\Service;
use App\Helpers\FileHandler;

class RequestsPerServiceCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'service:requests {output_file}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Shows the requests per service count';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
	$this->fileHandler = new FileHandler($this->argument('output_file'));
	$this->fileHandler->append('service_id,requests_count');

	foreach (Service::all() as $service) {
	    $this->fileHandler->append([
	        $service->id, $service->requests()->count()
	    ]);
	}
    }
}
