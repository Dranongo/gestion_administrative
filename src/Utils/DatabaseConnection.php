<?php

namespace Utils;

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
        $config = require __CONFIG_DIR__ . 'database.php';
        $dsn = $config['driver'] . ':dbname=' . $config['dbname'] . ';host=' . $config['host'] . ';charset=' . $config['charset'];
        self::$_connection = new \PDO($dsn, $config['user'], $config['password']);
    }

    /**
     * Clone method is not allowed
     */
    final private function __clone()
    {
        throw new \Exception("Le clonage n'est pas autorisé");
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