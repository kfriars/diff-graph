<?php

namespace Kfriars\DiffGraph\Commands;

use Illuminate\Console\Command;

class DiffGraphCommand extends Command
{
    public $signature = 'diff-graph';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
