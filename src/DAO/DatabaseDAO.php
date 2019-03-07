<?php

namespace DAO;


use Model\AbstractModel;
use Utils\DatabaseConnection;

abstract class DatabaseDAO
{
    /**
     * @var \PDO
     */
    protected $connection;

    /**
     * @var string
     */
    protected $tableName;

    /**
     * DatabaseDAO constructor.
     */
    public function __construct() 
    {
        $this->connection = DatabaseConnection::getInstance()->getConnection();
    }
}