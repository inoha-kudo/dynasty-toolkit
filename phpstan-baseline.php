<?php

declare(strict_types=1);

$cwd = getcwd();

$appModulePaths = glob($cwd.'/app-modules/*/src', GLOB_ONLYDIR);
$modulePaths = glob($cwd.'/modules/*/src', GLOB_ONLYDIR);

$paths = [
    ...($appModulePaths !== false ? $appModulePaths : []),
    ...($modulePaths !== false ? $modulePaths : []),
];

sort($paths, SORT_NATURAL);

return [
    'parameters' => [
        'paths' => $paths,
    ],
];
