<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;

class CreateModelCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'create {model}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Creates a valid model on the database';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
	$model = "App\\{$this->argument('model')}";

	$this->info(factory($model)->create()->toJson(JSON_PRETTY_PRINT));
    }
}
