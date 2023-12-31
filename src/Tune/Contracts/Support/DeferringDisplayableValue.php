<?php

namespace Tune\Contracts\Support;

interface DeferringDisplayableValue
{
    /**
     * Resolve the displayable value that the class is deferring.
     *
     * @return \Tune\Contracts\Support\Htmlable|string
     */
    public function resolveDisplayableValue();
}
