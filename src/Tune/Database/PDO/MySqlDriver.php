<?php

namespace Tune\Database\PDO;

use Doctrine\DBAL\Driver\AbstractMySQLDriver;
use Tune\Database\PDO\Concerns\ConnectsToDatabase;

class MySqlDriver extends AbstractMySQLDriver
{
    use ConnectsToDatabase;

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'pdo_mysql';
    }
}
