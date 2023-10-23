<?php

namespace Tune\Database\PDO;

use Doctrine\DBAL\Driver\AbstractPostgreSQLDriver;
use Tune\Database\PDO\Concerns\ConnectsToDatabase;

class PostgresDriver extends AbstractPostgreSQLDriver
{
    use ConnectsToDatabase;

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'pdo_pgsql';
    }
}
