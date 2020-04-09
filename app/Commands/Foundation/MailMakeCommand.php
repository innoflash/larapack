<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\MailMakeCommand as LaravelMailMake;

class MailMakeCommand extends LaravelMailMake
{
   use PackageDetail;
}
