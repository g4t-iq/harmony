<?php

namespace Tune\Routing\Controllers;

interface HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     *
     * @return \Tune\Routing\Controllers\Middleware|array
     */
    public static function middleware();
}
