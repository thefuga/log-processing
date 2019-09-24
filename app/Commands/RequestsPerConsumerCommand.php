<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;
use App\Consumer;
use App\Helpers\FileHandler;

class RequestsPerConsumerCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'consumer:requests {output_file}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Shows the requests per consumer count';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
	$this->fileHandler = new FileHandler($this->argument('output_file'));
	$this->fileHandler->append('consumer_id,requests_count');

	foreach (Consumer::all() as $consumer) {
	    $this->fileHandler->append(
		[$consumer->id, $consumer->consumerRequests()->count()]
	    );
	}
    }
}
