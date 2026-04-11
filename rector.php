<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use RectorLaravel\Set\LaravelLevelSetList;

$cwd = getcwd();

return RectorConfig::configure()
    ->withPaths([
        $cwd.'/app',
        $cwd.'/app-modules/*/src',
        $cwd.'/modules/*/src',
    ])
    ->withSets([
        LevelSetList::UP_TO_PHP_85,
        LaravelLevelSetList::UP_TO_LARAVEL_130,
    ]);
