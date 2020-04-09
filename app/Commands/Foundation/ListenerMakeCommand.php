<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Foundation\Console\ListenerMakeCommand as LaravelListenerMake;
use Illuminate\Support\Str;

class ListenerMakeCommand extends LaravelListenerMake
{
    use PackageDetail;

    protected function buildClass($name)
    {
        $event = $this->option('event');

        if (! Str::startsWith($event, [
            'Illuminate',
            '\\',
        ])) {
            $event = $this->namespaceFromComposer().'Events\\'.$event;
        }
        $stub = str_replace(
            'DummyEvent', class_basename($event), GeneratorCommand::buildClass($name)
        );

        return str_replace(
            'DummyFullEvent', trim($event, '\\'), $stub
        );
    }
}
