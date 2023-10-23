<?php

namespace Tune\Bus\Events;

use Tune\Bus\Batch;

class BatchDispatched
{
    /**
     * The batch instance.
     *
     * @var \Tune\Bus\Batch
     */
    public $batch;

    /**
     * Create a new event instance.
     *
     * @param  \Tune\Bus\Batch  $batch
     * @return void
     */
    public function __construct(Batch $batch)
    {
        $this->batch = $batch;
    }
}
