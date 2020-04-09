<?php

namespace App\Commands\Database;

use App\Helpers\PackageDetail;
use Illuminate\Database\Console\Migrations\MigrateMakeCommand as LaravelMigrateMake;

class MigrateMakeCommand extends LaravelMigrateMake
{
    use PackageDetail;

   protected function getMigrationPath()
    {
        if (!is_null($targetPath = $this->input->getOption('path'))) {
            return !$this->usingRealPath()
                ? $this->devPath().'/'.$targetPath
                : $targetPath;
        }

        return realpath(null) .$this->devPath() .'database/migrations';
    }
}
