<?php

namespace App\Commands\Database;

use App\Helpers\PackageDetail;
use Illuminate\Database\Console\Factories\FactoryMakeCommand as LaravelFactoryMake;

class FactoryMakeCommand extends LaravelFactoryMake
{
    use PackageDetail;

    protected function getPath($name)
    {
        $name = str_replace(
            ['\\', '/'], '', $this->argument('name')
        );
        return realpath(null) .$this->devPath() ."database/factories/{$name}.php";
        return $this->laravel->databasePath()."/factories/{$name}.php";
    }
}
