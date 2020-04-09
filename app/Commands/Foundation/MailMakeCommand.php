<?php

namespace App\Commands\Foundation;

use App\Helpers\WritesMarkdown;
use Illuminate\Foundation\Console\MailMakeCommand as LaravelMailMake;

class MailMakeCommand extends LaravelMailMake
{
    use WritesMarkdown;
}
