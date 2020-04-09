<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Foundation\Console\TestMakeCommand as LaravelTestMake;
use Illuminate\Support\Str;

class TestMakeCommand extends LaravelTestMake
{
    use PackageDetail;

    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return realpath(null).$this->devPath().'tests/'.str_replace('\\', '/', $name).'.php';
    }
}
