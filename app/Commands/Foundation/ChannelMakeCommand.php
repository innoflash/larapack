<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Foundation\Console\ChannelMakeCommand as LaravelChannelMake;
use Illuminate\Support\Str;

class ChannelMakeCommand extends LaravelChannelMake
{
    use PackageDetail;

    /*protected function buildClass($name)
    {
        try {
            return str_replace(
                'DummyUser',
                'MyName',
                GeneratorCommand::buildClass($name)
            );
        } catch (FileNotFoundException $e) {
        }
    }*/
}
