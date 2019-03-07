<?php

namespace DAO;


use Model\AbstractModel;
use Utils\DatabaseConnection;

abstract class DatabaseDAO
{
    /**
     * @var \PDO
     */
    private $connection;

    /**
     * @var string
     */
    protected $tableName;

    /**
     * DatabaseDAO constructor.
     */
    final public function __construct() 
    {
        $this->connection = DatabaseConnection::getInstance()->getConnection();
    }

    protected function getConnection()
    {

    }
}