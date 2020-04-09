<?php

namespace App\Commands\Foundation;

use App\Helpers\PackageDetail;
use Illuminate\Foundation\Console\RuleMakeCommand as LaravelRuleMake;

class RuleMakeCommand extends LaravelRuleMake
{
    use PackageDetail;
}
