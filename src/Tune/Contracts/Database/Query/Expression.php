<?php

namespace Tune\Contracts\Database\Query;

use Tune\Database\Grammar;

interface Expression
{
    /**
     * Get the value of the expression.
     *
     * @param  \Tune\Database\Grammar  $grammar
     * @return string|int|float
     */
    public function getValue(Grammar $grammar);
}
