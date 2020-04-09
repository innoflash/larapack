<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Foundation\Console\ResourceMakeCommand as LaravelResourceMake;

class ResourceMakeCommand extends LaravelResourceMake
{
    use PackageDetail;
}
