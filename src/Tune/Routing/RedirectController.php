<?php

namespace Tune\Routing;

use Tune\Http\RedirectResponse;
use Tune\Http\Request;
use Tune\Support\Str;

class RedirectController extends Controller
{
    /**
     * Invoke the controller method.
     *
     * @param  \Tune\Http\Request  $request
     * @param  \Tune\Routing\UrlGenerator  $url
     * @return \Tune\Http\RedirectResponse
     */
    public function __invoke(Request $request, UrlGenerator $url)
    {
        $parameters = collect($request->route()->parameters());

        $status = $parameters->get('status');

        $destination = $parameters->get('destination');

        $parameters->forget('status')->forget('destination');

        $route = (new Route('GET', $destination, [
            'as' => 'harmony_route_redirect_destination',
        ]))->bind($request);

        $parameters = $parameters->only(
            $route->getCompiled()->getPathVariables()
        )->all();

        $url = $url->toRoute($route, $parameters, false);

        if (! str_starts_with($destination, '/') && str_starts_with($url, '/')) {
            $url = Str::after($url, '/');
        }

        return new RedirectResponse($url, $status);
    }
}
