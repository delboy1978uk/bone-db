<?php

namespace Bone\Db;

use PDO;

trait HasDbTrait
{
    /** @var PDO */
    private $connection;

    public function getDb(): PDO
    {
        return $this->connection;
    }

    public function setDb(PDO $connection): void
    {
        $this->connection = $connection;
    }
}