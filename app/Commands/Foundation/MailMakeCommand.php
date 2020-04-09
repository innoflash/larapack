<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\MailMakeCommand as LaravelMailMake;

class MailMakeCommand extends LaravelMailMake
{
    use PackageDetail;

    protected function writeMarkdownTemplate()
    {
        $path = realpath(null).$this->devPath().'views/'.str_replace('.', '/', $this->option('markdown')).'.blade.php';

       if (!$this->files->isDirectory(dirname($path))) {
           $this->files->makeDirectory(dirname($path), 0755, true);
       }

       $this->files->put($path, file_get_contents($this->illuminateDirectory() . '/Foundation/Console/stubs/markdown.stub'));
   }
}
