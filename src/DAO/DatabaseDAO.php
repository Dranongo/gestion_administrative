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
            $arrayResult[] = $this->buildDomainObject($fetchResult[$i], false);
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
        //$modelDatabase = $this->modelToDatabaseFields();
        //$criteria = $this->keyModelToDataBase($modelDatabase, $criteria);

        $stringCriteria = $this->valuesToDatabaseFormat($criteria);
        $stringOrderBy = $this->valuesToDatabaseFormat($orderBy);

        $b = array("=", "'");
        $stringOrderBy = str_replace($b, "", $stringOrderBy);

        $sql = "SELECT * 
                FROM $this->tableName
                WHERE $stringCriteria 
                ORDER BY $stringOrderBy";
        var_dump($sql);

        $stmt = $this->connection->query($sql);

        $fetchResult = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $arrayResult=[];

        for ($i=0; $i < count($fetchResult); $i++) { 
            $arrayResult[] = $this->buildDomainObject($fetchResult[$i], false);
        }

        return $arrayResult;
    }

    /**
     * @param AbstractModel $model
     * @return bool
     */
    public function save(AbstractModel $model): bool
    {
        if ($model->getId() === null) {
           return $this->insert($model);
        }
        else { 
            return $this->update($model); 
        }
    }

    /**
     * @param AbstractModel $model
     * @return bool
     */
    protected function insert(AbstractModel $model): bool
    {
        $fieldsArray = $this->modelValuesToDatabase($model);
        $fieldsArray = $this->valuesToDatabaseFormatInsert($fieldsArray);

        $dataBaseFields = implode(", ", array_keys($fieldsArray));
        $valueModel = implode(", ", array_values($fieldsArray));

        $sql = "INSERT INTO $this->tableName 
                ($dataBaseFields) 
                VALUES 
                ($valueModel)";

        return $this->query($sql);
    }

    /**
     * @param AbstractModel $model
     * @return bool
     */
    protected function update(AbstractModel $model): bool
    {
        $fieldsArray = $this->modelValuesToDatabase($model);
        $fields = $this->valuesToDatabaseFormat($fieldsArray);
        $modelId = $model->getId();       

        $sql = "UPDATE $this->tableName 
                SET
                $fields
                WHERE
                id = $modelId";

        return $this->query($sql);
    }

    /**
     * @return \PDO
     */
    protected function getConnection() : \PDO
    {
        return $this->connection;
    }

    /**
     * @param AbstractModel $model
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
     * @param array $fieldsArray
     * @return array
     */
    protected function valuesToDatabaseFormatInsert(array $fieldsArray) : array
    {
        foreach ($fieldsArray as $key => $value) {
            if (is_string($value)) {
                $fieldsArray[$key] = "'" . addslashes($value) . "'";
            }
            elseif (is_bool($value)) {
                $fieldsArray[$key] = intval($value);
            }
            elseif ($value == null) {
                $fieldsArray[$key] = 'null';
            }
        }
        return $fieldsArray;
    }

    /**
     * @param array $fieldsArray
     * @return string
     */
    protected function valuesToDatabaseFormat(array $fieldsArray) : string
    {
        $cpt = 1;
        $fields = "";
        foreach ($fieldsArray as $key => $value) {
            $fields .= addslashes($key) . " = '" . addslashes($value) . "'";
            if ($cpt < count($fieldsArray)) {
                $fields .= ", ";
            }
            $cpt++;
        }
        return $fields;
    }

    /**
     * @param string $requestSql
     * @return bool
     */
    protected function query(string $requestSql): bool
    {
        try {
            $result = $this->connection->query($requestSql);
            if (! $result) {
                throw new \Exception(implode($this->connection->errorInfo(), ','));   
            }
        }
        catch(\Exception $e) {
            echo '<pre>';
            print_r($e->getMessage());
        }

        return boolval($result);
    }

    /**
     * @param array $modelDatabase
     * @param array $dataModel
     * @return array
     */
    protected function keyModelToDataBase(array $modelDatabase, array $dataModel): array
    {
        foreach ($dataModel as $key => $value) {
            $keyModelToDataBase = $modelDatabase[$key];
            $dataModel[$keyModelToDataBase] = $dataModel[$key];
            
            unset($dataModel[$key]);
        }
        return $dataModel;
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