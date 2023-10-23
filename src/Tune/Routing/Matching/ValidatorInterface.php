<?php

namespace Tune\Routing\Matching;

use Tune\Http\Request;
use Tune\Routing\Route;

interface ValidatorInterface
{
    /**
     * Validate a given rule against a route and request.
     *
     * @param  \Tune\Routing\Route  $route
     * @param  \Tune\Http\Request  $request
     * @return bool
     */
    public function matches(Route $route, Request $request);
}
