<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;

class ShowModelCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'show {model} {id}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Retrieves and displays a model';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
	$model = "App\\{$this->argument('model')}";
	$this->info(
	    $model::find($this->argument('id'))->toJson(JSON_PRETTY_PRINT)
	);
    }
}
