<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Bootstrap the application instance for tests.
     */
    public function createApplication(): Application
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $environmentFile = file_exists(__DIR__.'/../.env.testing')
            ? '.env.testing'
            : '.env.example';

        $app->loadEnvironmentFrom($environmentFile);

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
