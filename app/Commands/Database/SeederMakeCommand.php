<?php

namespace App\Commands\Database;

use App\Helpers\PackageDetail;
use Illuminate\Database\Console\Seeds\SeederMakeCommand as LaravelSeederMakeCommand;

class SeederMakeCommand extends LaravelSeederMakeCommand
{
    use PackageDetail;

    public function handle()
    {
        parent::handle();
        $this->info('Remember to add your seeders folder to your composer autoload');
    }

    protected function getPath($name)
    {
        return realpath(null) .$this->devPath().'database/seeds/'.$name.'.php';
    }
}
