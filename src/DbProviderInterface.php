<?php

namespace Bone\Db;

use PDO;

interface DbProviderInterface
{
    /**
     * @return PDO
     */
    public function getDb(): PDO;

    /**
     * @param PDO $connection
     */
    public function setDb(PDO $connection): void;

}