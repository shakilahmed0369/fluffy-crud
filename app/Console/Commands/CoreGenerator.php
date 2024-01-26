<?php

namespace App\Console\Commands;

use App\Xcore\ModelGenerator;
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
