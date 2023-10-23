<?php

namespace Tune\Http\Client\Events;

use Tune\Http\Client\Request;

class RequestSending
{
    /**
     * The request instance.
     *
     * @var \Tune\Http\Client\Request
     */
    public $request;

    /**
     * Create a new event instance.
     *
     * @param  \Tune\Http\Client\Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
