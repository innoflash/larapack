<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Foundation\Console\ChannelMakeCommand as LaravelChannelMake;
use Illuminate\Support\Str;

class ChannelMakeCommand extends LaravelChannelMake
{
    use PackageDetail;

    protected function buildClass($name)
    {
        return str_replace(
            'DummyUser',
            class_basename($this->userProviderModel()),
            parent::buildClass($name)
        );
    }
}
