<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\EventMakeCommand as LaravelEventMake;
use LaravelZero\Framework\Commands\Command;

class EventMakeCommand extends LaravelEventMake
{
    use PackageDetail;
}
