<?php

namespace App\Console\Commands;

use App\Xcore\ControllerGenerator;
use App\Xcore\MigrationGenerator;
use App\Xcore\ModelGenerator;
use App\Xcore\RequestGenerator;
use App\Xcore\Validator;
use App\Xcore\ViewGenerator;
use Illuminate\Console\Command;


class CoreGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'core:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'will generate crud from core';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // validate core array structure
        $validator = new Validator($this->baseArray());
        $validator->validaateBaseArray();

        $model = new ModelGenerator($this->baseArray());
        $model->generate();

        $migration = new MigrationGenerator($this->baseArray());
        $migration->generate();

        $view = new ViewGenerator($this->baseArray());
        $view->generate();

        $controller = new ControllerGenerator($this->baseArray());
        $controller->generate();

        $request = new RequestGenerator($this->baseArray());
        $request->generate();
    }

    /**
     * Get the array from core.php
     */
    function baseArray(): array
    {
        $data = require base_path('core.php');
        return $data;
    }

}
