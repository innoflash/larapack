<?php

namespace App\Commands\Foundation;

use App\Helpers\WritesMarkdown;
use Illuminate\Foundation\Console\NotificationMakeCommand as LaravelNotificationMake;

class NotificationMakeCommand extends LaravelNotificationMake
{
    use WritesMarkdown;
}
