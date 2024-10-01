<?php

namespace Kfriars\DiffGraph\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kfriars\DiffGraph\DiffGraph
 */
class DiffGraph extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Kfriars\DiffGraph\DiffGraph::class;
    }
}
