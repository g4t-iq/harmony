<?php

namespace Tune\Http\Client\Events;

use Tune\Http\Client\Request;
use Tune\Http\Client\Response;

class ResponseReceived
{
    /**
     * The request instance.
     *
     * @var \Tune\Http\Client\Request
     */
    public $request;

    /**
     * The response instance.
     *
     * @var \Tune\Http\Client\Response
     */
    public $response;

    /**
     * Create a new event instance.
     *
     * @param  \Tune\Http\Client\Request  $request
     * @param  \Tune\Http\Client\Response  $response
     * @return void
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
}
