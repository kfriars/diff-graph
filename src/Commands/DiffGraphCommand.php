<?php

namespace Kfriars\DiffGraph\Commands;

use Illuminate\Console\Command;
use Kfriars\DiffGraph\DiffGraph;

class DiffGraphCommand extends Command
{
    public $signature = 'diff-graph';

    public $description = 'My command';

    public function handle(): int
    {
        $grapher = new DiffGraph('ABCABBA', 'CBABAC', $this->output);

        $grapher->render();

        return self::SUCCESS;
    }
}
