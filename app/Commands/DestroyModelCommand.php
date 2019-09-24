<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;

class DestroyModelCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'destroy {model} {id}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Destroys a model';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
	$model = "App\\{$this->argument('model')}";
	$model::find($this->argument('id'))->delete();
    }
}
