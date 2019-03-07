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
     * @param AbstractModel $entity
     * @return bool
     */
    public function save(AbstractModel $entity): bool
    {
        
    }

    /**
     * @param AbstractModel $entity
     * @return bool
     */
    protected function insert(AbstractModel $entity): bool
    {
        
    }

    /**
     * @param AbstractModel $entity
     * @return bool
     */
    protected function update(AbstractModel $entity): bool
    {

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
    protected function modelValuesToDatabase(AbstractModel $entity): array
    {
        $fieldsArray = [];
        foreach ($this->modelToDatabaseFields() as $param => $field) {
            $getter = 'get' . ucfirst($param);
            if (method_exists($entity, $getter)) {
                $value = $entity->{$getter}();
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