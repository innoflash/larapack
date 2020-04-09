<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Foundation\Console\JobMakeCommand as LaravelJobMake;

class JobMakeCommand extends LaravelJobMake
{
    use PackageDetail;
}
