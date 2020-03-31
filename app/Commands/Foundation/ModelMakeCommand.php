<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Foundation\Console\ModelMakeCommand as LaravelModelMake;

class ModelMakeCommand extends LaravelModelMake
{
    use PackageDetail;
}
