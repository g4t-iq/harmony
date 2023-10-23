<?php

namespace Tune\Contracts\Broadcasting;

interface ShouldBroadcast
{
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Tune\Broadcasting\Channel|\Tune\Broadcasting\Channel[]|string[]|string
     */
    public function broadcastOn();
}
