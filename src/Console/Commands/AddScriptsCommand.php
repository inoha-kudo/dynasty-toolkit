<?php

declare(strict_types=1);

namespace Dynasty\Toolkit\Console\Commands;

use Composer\Json\JsonFile;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('dynasty:add-scripts')]
#[Description('Add scripts to composer.json')]
final class AddScriptsCommand extends Command
{
    private const array SCRIPTS = [
        'pint' => 'pint --config vendor/dynasty/toolkit/pint.json',
        'phpstan' => 'phpstan analyse -c vendor/dynasty/toolkit/phpstan.neon',
        'rector' => 'rector process -c vendor/dynasty/toolkit/rector.php',
        'phpinsights' => 'phpinsights analyse -c vendor/dynasty/toolkit/insights.php',
    ];

    public function handle(): void
    {
        $file = new JsonFile(base_path('composer.json'));

        $config = $file->read();
        assert(is_array($config));
        $config['scripts'] ??= [];
        assert(is_array($config['scripts']));

        foreach (self::SCRIPTS as $name => $command) {
            $config['scripts'][$name] = $command;
        }

        $file->write($config);

        $this->info('composer.json updated successfully.');
    }
}
