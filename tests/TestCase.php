<?php

namespace Vdhicts\ReadTime\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Vdhicts\ReadTime\ReadTimeServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            ReadTimeServiceProvider::class,
        ];
    }

}
