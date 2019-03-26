<?php

namespace Service;

use Exception\SingletonException;

class DatabaseConnection
{
    /**
     * @var DatabaseConnection|null
     */
    private static $_instance = null;

    /**
     * @var \PDO
     */
    protected static $_connection = null;

    /**
     * DatabaseConnection constructor.
     */
    final private function __construct()
    {
        $config = require __CONFIG_DIR__ . 'config.php';
        $databaseConfig = $config['database'];
        $dsn = $databaseConfig['driver'] . ':dbname=' . $databaseConfig['dbname'] . ';host=' . $databaseConfig['host'] . ';charset=' . $databaseConfig['charset'];
        self::$_connection = new \PDO($dsn, $databaseConfig['user'], $databaseConfig['password']);
    }

    /**
     * Clone method is not allowed
     */
    final private function __clone()
    {
        throw new SingletonException('Clone Method is not allowed');
    }

    /**
     * @return DatabaseConnection
     */
    final public static function getInstance(): DatabaseConnection
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new DatabaseConnection();
        }
        return self::$_instance;
    }

    /**
     * @var \PDO
     */
    public function getConnection(): \PDO
    {
        return self::$_connection;
    }
}