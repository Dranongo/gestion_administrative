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

    /**
     * @return array
     */
    public function findAll(): array
    {
        $sql = "SELECT * 
                FROM $this->tableName";

        $stmt = $this->connection->query($sql);

        $fetchResult = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $arrayResult=[];

        for ($i=0; $i < count($fetchResult); $i++) { 
            $arrayResult[] = $this->buildDomainObject($fetchResult[$i], true);
        }

        return $arrayResult;
    }

    /**
     * @param int $id
     * @return AbstractModel|null
     */
    public function find(int $id, bool $recursive = true): ?AbstractModel
    {
        $sql = "SELECT *
                FROM $this->tableName
                WHERE id = $id";
                
        $stmt = $this->connection->query($sql);

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return is_array($result) ? $this->buildDomainObject($result, $recursive) : null;
    }

    /**
     * @param array $criteria
     * @param array $order
     * @return array
     */
    public function findBy(array $criteria, array $orderBy = []): array
    {
        
    }

    /**
     * @param AbstractModel $model
     * @return bool
     */
    public function save(AbstractModel $model): bool
    {
        
    }

    /**
     * @param AbstractModel $model
     * @return bool
     */
    protected function insert(AbstractModel $model): bool
    {
        foreach ($model->modelValuesToDatabase() as $key => $value) {
            $sql = "INSERT INTO $this->tableName ($key)
                    VALUES ($value)
                    ";
        }

        /*
        $stmt = $this->connection->query($sql);*/
    }

    /**
     * @param AbstractModel $model
     * @return bool
     */
    protected function update(AbstractModel $model): bool
    {
        $sql = "UPDATE $this->tableName
                SET";
    }

    /**
     * @return \PDO
     */
    protected function getConnection() : \PDO
    {
        return $this->connection;
    }

    /**
     * @return array
     */
    protected function modelValuesToDatabase(AbstractModel $model): array
    {
        $fieldsArray = [];
        foreach ($this->modelToDatabaseFields() as $param => $field) {
            $getter = 'get' . ucfirst($param);
            if (method_exists($model, $getter)) {
                $value = $model->{$getter}();
                if ($value instanceof \DateTime) {
                    $value = $value->format('Y-m-d H:i:s');
                } elseif ($value instanceof AbstractModel) {
                    $value = $value->getId();
                }
                
                $fieldsArray[$field] = $value;
            }
        }

        return $fieldsArray;
    }

    /**
     * @param array $data
     * @param bool $recursive
     * @return AbstractModel
     */
    protected abstract function buildDomainObject(array $data, bool $recursive = false): AbstractModel;

    /**
     * @return array
     */
    protected abstract function modelToDatabaseFields(): array;
}