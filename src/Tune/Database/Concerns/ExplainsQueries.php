<?php

namespace Tune\Database\Concerns;

use Tune\Support\Collection;

trait ExplainsQueries
{
    /**
     * Explains the query.
     *
     * @return \Tune\Support\Collection
     */
    public function explain()
    {
        $sql = $this->toSql();

        $bindings = $this->getBindings();

        $explanation = $this->getConnection()->select('EXPLAIN '.$sql, $bindings);

        return new Collection($explanation);
    }
}
