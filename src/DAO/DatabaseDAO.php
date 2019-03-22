<?php

namespace DAO;


use Model\AbstractModel;
use Utils\DatabaseConnection;
use Utils\DateHelper;
use Utils\SqlHelper;

/**
 * This class is used as Repository for each Model class to make the link between them and the database
 * Class DatabaseDAO
 * @package DAO
 */
abstract class DatabaseDAO
{
    /**
     * @var string
     */
    const __DATABASE_CONFIG_DIR__ = __SRC_DIR__ . 'database' . DIRECTORY_SEPARATOR;

    /**
     * @var array
     */
    protected $config;

    /**
     * @var \PDO
     */
    private $connection;

    /**
     * DatabaseDAO constructor.
     * @throws \Exception
     */
    final private function __construct()
    {
        if (! property_exists(static::class, 'configFileName') ||
            ! property_exists(static::class, 'tableName')
        ) {
            throw new \Exception(static::class . ' needs configFileName and tableName properties');
        }
        $this->connection = DatabaseConnection::getInstance()->getConnection();
        $this->modelToDatabaseFields();
    }

    /**
     * Clone method is not allowed
     * @throws \Exception
     */
    final private function __clone()
    {
        throw new \Exception('Clone method is not allowed');
    }

    /**
     * @return DatabaseDAO
     * @throws \Exception
     */
    public static function getInstance(): DatabaseDAO
    {
        if (! property_exists(static::class, '_instance')) {
            throw new \Exception(static::class . ' needs static $_instance property');
        }
        if (! static::$_instance instanceof DatabaseDAO) {
            static::$_instance = new static();
        }

        return static::$_instance;
    }

    /**
     * @return array
     */
    final public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array $orderBy
     * @param bool $recursive
     * @param int|null $limit
     * @param int|null $offset
     * @return array
     */
    public function findAll(array $orderBy = [], bool $recursive = false, ?int $limit = null, ?int $offset = null): array
    {
        $sqlQuery = "SELECT *
                       FROM $this->tableName";
        $sqlQuery .= SqlHelper::convertDataToSqlQuery($criteria, $orderBy, $limit, $offset);

        $stmt = $this->connection->query($sqlQuery);

        $fetchResult = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $arrayResult = [];

        for ($i=0; $i < count($fetchResult); $i++) { 
            $arrayResult[] = $this->buildDomainObject($fetchResult[$i], $recursive);
        }

        return $arrayResult;
    }

    /**
     * @param int $id
     * @param bool $recursive
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
     * @param array $orderBy
     * @param bool $recursive
     * @param int|null $limit
     * @param int|null $offset
     * @return array
     */
    public function findBy(
        array $criteria,
        array $orderBy = [],
        bool $recursive = false,
        ?int $limit = null,
        ?int $offset = null
    ): array
    {
        $criteria = $this->nameToKeyConfig($criteria);
        $orderBy = $this->nameToKeyConfig($orderBy);

        $sqlQuery = "SELECT *
                       FROM $this->tableName";
        $sqlQuery .= SqlHelper::convertDataToSqlQuery($criteria, $orderBy, $limit, $offset);
        
        $stmt = $this->connection->query($sqlQuery);

        $fetchResult = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $arrayResult = [];

        for ($i=0; $i < count($fetchResult); $i++) { 
            $arrayResult[] = $this->buildDomainObject($fetchResult[$i], $recursive);
        }

        return $arrayResult;
    }

    /**
     * @param AbstractModel $model
     * @return boolean
     */
    public function save(AbstractModel $model): bool
    {
        if ($model->getId() === null) {
           return $this->insert($model);
        } else { 
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
        
        $sqlQuery = "INSERT INTO $this->tableName";
        $sqlQuery .= SqlHelper::convertDataToInsertQuery($fieldsArray);
        
        return $this->query($sqlQuery);
    }

    /**
     * @param AbstractModel $model
     * @return bool
     */
    protected function update(AbstractModel $model): bool
    {
        $fieldsArray = $this->modelValuesToDatabase($model);
        $modelId = $model->getId();

        $sqlQuery = "UPDATE $this->tableName";
        $sqlQuery .= SqlHelper::convertDataToUpdateQuery($fieldsArray, $modelId);

        return $this->query($sqlQuery);
    }

    /**
     * @return \PDO
     */
    protected function getConnection(): \PDO
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
        foreach ($this->getConfig() as $param => $field) {
            $getter = 'get' . ucfirst($param);
            if (method_exists($model, $getter)) {
                $value = $model->{$getter}();
                if ($value instanceof \DateTime) {
                    $value = DateHelper::convertDateTimeToDatabaseFormat($value);
                } elseif ($value instanceof AbstractModel) {
                    $value = $value->getId();
                }
                
                $fieldsArray[$field] = $value;
            }
        }
        return $fieldsArray;
    }

    /**
     * @param string $sqlQuery
     * @return bool
     */
    protected function query(string $sqlQuery): bool
    {
        try {
            $result = $this->connection->query($sqlQuery);
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
     * @param string $sqlQuery
     * @return array
     */
    public function querySql(string $sqlQuery): array
    {
        $stmt = $this->connection->query($sqlQuery);

        $results = [];

        if ($stmt !== false) {
            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $results;
    }

    /**
     * @param array $arrayParam
     * @return array
     */
    protected function nameToKeyConfig(array $arrayParam): array
    {
        $config = $this->getConfig();

        foreach ($arrayParam as $key => $value) {
            if (array_key_exists($key, $config) && $config[$key] != $key) {
                $arrayParam[$config[$key]] = $arrayParam[$key];
                unset($arrayParam[$key]);
            }
        }
        return $arrayParam;
    }

    /**
     * @return void
     * @throw \Exception 
     */
    final protected function modelToDatabaseFields(): void
    {
        $filePath = self::__DATABASE_CONFIG_DIR__ . $this->configFileName . '.php';

        if (is_file($filePath)) {
            $this->config = require $filePath;
        } else {
            throw new \Exception(get_class($this) . ' Config File not found');
        }
    }

    /**
     * @param array $data
     * @param bool $recursive
     * @return AbstractModel
     */
    protected abstract function buildDomainObject(array $data, bool $recursive = false): AbstractModel;

    /**
     * @param AbstractModel $model
     * @param string $parameter
     * @return array
     */
    protected function getManyToManyRelationFromObject(AbstractModel $model, string $parameter): array
    {
        // TODO: Add $limit and $offset parameters
        $config = $this->getConfig();
        if (array_key_exists($parameter, $config) && is_array($config[$parameter])) {
            $table = $config[$parameter];
            $sql = "SELECT *
                    FROM $table[tableName]
                    WHERE $table[foreignKey] = {$model->getId()}";
        } else {
            return [];
        }

        if (array_key_exists('className', $config[$parameter])) {
            /** @var AbstractModel $relationModel */
            $relationModel = '\\Model\\' . $config[$parameter]['className'];
            /** @var DatabaseDAO $relationDAO */
            $relationDAO = $relationModel::getDAOInstance();
        } else {
            return [];
        }

        $results = [];

        // If the relation table has some additional fields
        if (array_key_exists('otherFields', $config[$parameter])) {
            if (is_array($config[$parameter]['otherFields'])) {
                foreach ($this->querySql($sql) as $result) {
                    $relation = $relationDAO->find($result[$config[$parameter]['otherForeignKey']], false);
                    foreach ($config[$parameter]['otherFields'] as $modelParameter => $field) {
                        $method = 'set' . ucfirst($modelParameter);
                        if (method_exists($relationModel, $method)) {
                            if (substr($modelParameter, 0, 4) === 'date') {
                                $field = $result[$field] !== null ? 
                                    DateHelper::convertDatabaseDateToDateTime($result[$field]) : null;
                            } else {
                                $field = $result[$field];
                            }
                            $relation->$method($field);
                        }
                    }
                    $results[] = $relation;
                }
            }
        } else {
            // Initialize an array to set all the Ids
            $idsResults = [];
            foreach ($this->querySql($sql) as $result) {
                $idsResults[] = $result[$config[$parameter]['otherForeignKey']];
            }
            $orderBy = array_key_exists('orderBy', $config[$parameter]) && is_array($config[$parameter]['orderBy']) ?
                $config[$parameter]['orderBy'] : [];
            $results = $relationDAO->findBy(['id' => $idsResults], $orderBy, false);
        }

        return $results;
    }
}