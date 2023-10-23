<?php

namespace Tune\Routing\Events;

class RouteMatched
{
    /**
     * The route instance.
     *
     * @var \Tune\Routing\Route
     */
    public $route;

    /**
     * The request instance.
     *
     * @var \Tune\Http\Request
     */
    public $request;

    /**
     * Create a new event instance.
     *
     * @param  \Tune\Routing\Route  $route
     * @param  \Tune\Http\Request  $request
     * @return void
     */
    public function __construct($route, $request)
    {
        $this->route = $route;
        $this->request = $request;
    }
}
