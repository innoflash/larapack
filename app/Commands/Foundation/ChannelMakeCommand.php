<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Foundation\Console\ChannelMakeCommand as LaravelChannelMake;

class ChannelMakeCommand extends LaravelChannelMake
{
    use PackageDetail;
}
