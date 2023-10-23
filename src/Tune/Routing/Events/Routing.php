<?php

namespace Tune\Routing\Events;

class Routing
{
    /**
     * The request instance.
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
    public function __construct($request)
    {
        $this->request = $request;
    }
}
