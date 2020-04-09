<?php

namespace App\Commands\Routing;

use App\Helpers\PackageDetail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Routing\Console\MiddlewareMakeCommand as LaravelMiddlewareMake;

class MiddlewareMakeCommand extends LaravelMiddlewareMake
{
  use PackageDetail;
}
