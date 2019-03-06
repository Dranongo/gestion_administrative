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
     * TODO: Create a Singleton class
     */

    final private function __construct()
    {
    }

    final private function __clone()
    {
        trigger_error("Le clonage n'est pas autorisé", E_USER_ERROR);
    }

    final public static function getInstance()
    {
        if(is_null(self::$_instance)){
            self::$_instance = new DatabaseConnection();
            $config = require __CONFIG_DIR__ . 'database.php';
            $dsn = $config['driver'] . ':dbname=' . $config['dbname'] . ';host=' . $config['host'] . ';charset=' . $config['charset'];
            self::$_connection = new \PDO($dsn, $config['user'], $config['password']);
        }
        return self::$_instance;
    }

}