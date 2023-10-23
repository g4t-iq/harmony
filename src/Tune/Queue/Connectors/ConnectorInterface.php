<?php

namespace Tune\Queue\Connectors;

interface ConnectorInterface
{
    /**
     * Establish a queue connection.
     *
     * @param  array  $config
     * @return \Tune\Contracts\Queue\Queue
     */
    public function connect(array $config);
}
