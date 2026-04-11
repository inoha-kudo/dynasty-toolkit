<?php

declare(strict_types=1);

namespace Dynasty\Toolkit;

use Dynasty\Toolkit\Console\Commands\SetupCommand;
use Illuminate\Support\ServiceProvider;

final class ToolkitServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            if ($this->app->environment('local')) {
                $this->commands([
                    SetupCommand::class,
                ]);
            }
        }
    }
}
