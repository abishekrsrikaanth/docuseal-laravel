<?php

namespace DocusealCo\Docuseal\Commands;

use Illuminate\Console\Command;

class DocusealCommand extends Command
{
    public $signature = 'docuseal-laravel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
