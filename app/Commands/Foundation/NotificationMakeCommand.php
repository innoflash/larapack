<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Foundation\Console\NotificationMakeCommand as LaravelNotificationMake;

class NotificationMakeCommand extends LaravelNotificationMake
{
   use PackageDetail;
}
