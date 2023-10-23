<?php

namespace Tune\Routing\Matching;

use Tune\Http\Request;
use Tune\Routing\Route;

class MethodValidator implements ValidatorInterface
{
    /**
     * Validate a given rule against a route and request.
     *
     * @param  \Tune\Routing\Route  $route
     * @param  \Tune\Http\Request  $request
     * @return bool
     */
    public function matches(Route $route, Request $request)
    {
        return in_array($request->getMethod(), $route->methods());
    }
}
