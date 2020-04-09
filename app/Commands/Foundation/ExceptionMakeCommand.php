<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Foundation\Console\ExceptionMakeCommand as LaravelExceptionMake;

class ExceptionMakeCommand extends LaravelExceptionMake
{
    use PackageDetail;
}
