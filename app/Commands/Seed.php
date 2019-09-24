<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;
use App\Request;
use App\Consumer;
use App\Service;
use App\Route;
use App\Response;
use App\ConsumerRequest;
use App\Helpers\FileHandler;
use App\Concerns\ModelParams;

class Seed extends Command
{
    use ModelParams;

    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'seed {file_name}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Seeds the database from a log file';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
	$this->fileHandler = new FileHandler($this->argument('file_name'));

	foreach ($this->fileHandler->read() as $log_entry){
	    $this->setParams($log_entry);
	    $this->setConsumer();
	    $this->setConsumerRequest();
	    $this->setService();
	    $this->setRoute();
	    $this->setRequest();
	    $this->setResponse();
	}
    }

    private function setConsumer()
    {
	$this->consumer = Consumer::firstOrCreate($this->consumerParams());
    }

    private function setService()
    {
	$this->service = Service::firstOrCreate($this->serviceParams());
    }

    private function setRoute()
    {
	$this->route = Route::firstOrCreate($this->routeParams());
    }

    private function setRequest()
    {
	$this->request = Request::create($this->requestParams());
    }
 

    private function setParams($params)
    {
	$this->params = json_decode($params, true);
    }

    private function setResponse()
    {
	$this->response = Response::create($this->responseParams());
    }

    private function setConsumerRequest()
    {
	$this->consumerRequest = 
	    ConsumerRequest::create($this->consumerRequestParams());
    }
}
