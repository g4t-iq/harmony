<?php

namespace Tune\Broadcasting;

use Tune\Container\Container;
use Tune\Contracts\Cache\Repository;
use Tune\Contracts\Queue\ShouldBeUnique;

class UniqueBroadcastEvent extends BroadcastEvent implements ShouldBeUnique
{
    /**
     * The unique lock identifier.
     *
     * @var mixed
     */
    public $uniqueId;

    /**
     * The number of seconds the unique lock should be maintained.
     *
     * @var int
     */
    public $uniqueFor;

    /**
     * Create a new event instance.
     *
     * @param  mixed  $event
     * @return void
     */
    public function __construct($event)
    {
        $this->uniqueId = get_class($event);

        if (method_exists($event, 'uniqueId')) {
            $this->uniqueId .= $event->uniqueId();
        } elseif (property_exists($event, 'uniqueId')) {
            $this->uniqueId .= $event->uniqueId;
        }

        if (method_exists($event, 'uniqueFor')) {
            $this->uniqueFor = $event->uniqueFor();
        } elseif (property_exists($event, 'uniqueFor')) {
            $this->uniqueFor = $event->uniqueFor;
        }

        parent::__construct($event);
    }

    /**
     * Resolve the cache implementation that should manage the event's uniqueness.
     *
     * @return \Tune\Contracts\Cache\Repository
     */
    public function uniqueVia()
    {
        return method_exists($this->event, 'uniqueVia')
                ? $this->event->uniqueVia()
                : Container::getInstance()->make(Repository::class);
    }
}
