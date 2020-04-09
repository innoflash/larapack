<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Foundation\Console\ProviderMakeCommand as LaravelProviderMake;

class ProviderMakeCommand extends LaravelProviderMake
{
    use PackageDetail;
}
