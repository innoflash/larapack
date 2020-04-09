<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Foundation\Console\RequestMakeCommand as LaravelRequestMake;

class RequestMakeCommand extends LaravelRequestMake
{
    use PackageDetail;
}
