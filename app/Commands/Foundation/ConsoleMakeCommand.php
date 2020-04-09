<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\ConsoleMakeCommand as LaravelConsoleMake;
use LaravelZero\Framework\Commands\Command;

class ConsoleMakeCommand extends LaravelConsoleMake
{
    use PackageDetail;
}
