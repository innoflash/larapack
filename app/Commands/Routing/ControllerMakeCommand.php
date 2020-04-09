<?php

namespace App\Commands\Routing;

use App\Helpers\PackageDetail;
use Illuminate\Routing\Console\ControllerMakeCommand as LaravelControllerMake;

class ControllerMakeCommand extends LaravelControllerMake
{
    use PackageDetail;
}
