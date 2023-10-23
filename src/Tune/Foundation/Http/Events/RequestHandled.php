<?php

namespace Tune\Foundation\Http\Events;

class RequestHandled
{
    /**
     * The request instance.
     *
     * @var \Tune\Http\Request
     */
    public $request;

    /**
     * The response instance.
     *
     * @var \Tune\Http\Response
     */
    public $response;

    /**
     * Create a new event instance.
     *
     * @param  \Tune\Http\Request  $request
     * @param  \Tune\Http\Response  $response
     * @return void
     */
    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
}
