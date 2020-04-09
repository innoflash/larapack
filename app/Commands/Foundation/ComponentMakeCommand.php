<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Foundation\Console\ComponentMakeCommand as LaravelComponentMake;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ComponentMakeCommand extends LaravelComponentMake
{
    use PackageDetail;

    public function handle()
    {
       parent::handle();
       $this->info('Do not forget to register your components in the the package provider.');
    }

    /**
     * Write the view for the component.
     *
     * @return void
     */
    protected function writeView()
    {
        $view = $this->getView();
        $path = realpath(null). $this->devPath() . 'views/'.str_replace('.', '/', 'components.'.$view);

        //die(realpath('/'.$this->devPath()));
        //$path = resource_path('views').'/'.str_replace('.', '/', 'components.'.$view);

        if (! $this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }

        file_put_contents(
            $path.'.blade.php',
            '<div>
    <!-- '.Inspiring::quote().' -->
</div>'
        );
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        if ($this->option('inline')) {
            return str_replace(
                'DummyView',
                "<<<'blade'\n<div>\n    ".Inspiring::quote()."\n</div>\nblade",
                GeneratorCommand::buildClass($name)
            );
        }

        return str_replace(
            'DummyView',
            'view(\'components.'.$this->getView().'\')',
            GeneratorCommand::buildClass($name)
        );
    }
    /**
     * Get the view name relative to the components directory.
     *
     * @return string view
     */
    protected function getView()
    {
        return collect(explode('/', $this->argument('name')))
            ->map(function ($part) {
                return Str::kebab($part);
            })
            ->implode('.');
    }
}
