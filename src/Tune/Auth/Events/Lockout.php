<?php

namespace Tune\Auth\Events;

use Tune\Http\Request;

class Lockout
{
    /**
     * The throttled request.
     *
     * @var \Tune\Http\Request
     */
    public $request;

    /**
     * Create a new event instance.
     *
     * @param  \Tune\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
