<?php

namespace Tune\Contracts\Broadcasting;

interface Broadcaster
{
    /**
     * Authenticate the incoming request for a given channel.
     *
     * @param  \Tune\Http\Request  $request
     * @return mixed
     */
    public function auth($request);

    /**
     * Return the valid authentication response.
     *
     * @param  \Tune\Http\Request  $request
     * @param  mixed  $result
     * @return mixed
     */
    public function validAuthenticationResponse($request, $result);

    /**
     * Broadcast the given event.
     *
     * @param  array  $channels
     * @param  string  $event
     * @param  array  $payload
     * @return void
     *
     * @throws \Tune\Broadcasting\BroadcastException
     */
    public function broadcast(array $channels, $event, array $payload = []);
}
