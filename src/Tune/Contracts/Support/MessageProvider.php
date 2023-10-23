<?php

namespace Tune\Contracts\Support;

interface MessageProvider
{
    /**
     * Get the messages for the instance.
     *
     * @return \Tune\Contracts\Support\MessageBag
     */
    public function getMessageBag();
}
