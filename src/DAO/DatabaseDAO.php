<?php

namespace DAO;


use Exception\FileNotFoundException;
use Exception\PDOException;
use Exception\SingletonException;
use Exception\ComiXExceptionInterface;
use Exception\ClassNotFoundException;
use Model\AbstractModel;
use Service\DatabaseConnection;
use Service\Logger;
use Service\Template;
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
     * @throws \Exception\SingletonException
     */
    final private function __construct()
    {
        if (! property_exists(static::class, 'configFileName') ||
            ! property_exists(static::class, 'tableName')
        ) {
            throw new SingletonException(static::class . ' needs configFileName and tableName properties');
        }
        $this->connection = DatabaseConnection::getInstance()->getConnection();
        $this->modelToDatabaseFields();
    }

    /**
     * Clone method is not allowed
     * @throws \Exception\SingletonException
     */
    final private function __clone()
    {
        throw new SingletonException('Clone method is not allowed');
    }

    /**
     * @return DatabaseDAO
     * @throws \Exception\SingletonException
     */
    public static function getInstance(): DatabaseDAO
    {
        if (! property_exists(static::class, '_instance')) {
            throw new SingletonException(static::class . ' needs static $_instance property');
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
    public function findAll(array $orderBy = [], 
        bool $recursive = false, 
        ?int $limit = null, 
        ?int $offset = null)
    : array
    {
        $sqlQuery = "SELECT *
                       FROM $this->tableName";
        $sqlQuery .= SqlHelper::getInstance()->convertDataToSqlQuery([], $orderBy, $limit, $offset);

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
        $sqlQuery .= SqlHelper::getInstance()->convertDataToSqlQuery($criteria, $orderBy, $limit, $offset);
        
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
           $result = $this->insert($model);
        } else { 
            $result = $this->update($model); 
        }
        return $result ? /*$this->editManyToManyRelation($model)*/ true : $result;
    }

    /**
     * @param AbstractModel $model
     * @return bool
     */
    protected function insert(AbstractModel $model): bool
    {
        $fieldsArray = $this->modelValuesToDatabase($model);
        
        $sqlQuery = "INSERT INTO $this->tableName";
        $sqlQuery .= SqlHelper::getInstance()->convertDataToInsertQuery($fieldsArray);
        
        $result = $this->query($sqlQuery);
        $model->setId($this->connection->lastInsertId());
        return $result;
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
        $sqlQuery .= SqlHelper::getInstance()->convertDataToUpdateQuery($fieldsArray, $modelId);

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
                if (!is_array($value)) {
                    $fieldsArray[$field] = $this->convertValueToFormatDatabase($value);
                }
            }
        }
        return $fieldsArray;
    }

    /**
     * Undocumented function
     *
     * @param $value
     * @return 
     */
    protected function convertValueToFormatDatabase($value)
    {
        if (!is_array($value)) {
            $result = $value;
            if ($value instanceof \DateTime) {
                $result = DateHelper::convertDateTimeToDatabaseFormat($value);
            } elseif (is_bool($value)) {
               $result = intval($value);
            } elseif ($value instanceof AbstractModel) {
                $result = $value->getId();
            }
            return $result;
        }
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
                throw new PDOException(implode($this->connection->errorInfo(), ','));
            }
        }
        catch(ComiXExceptionInterface $e) {
            Logger::getInstance()->error($e->getLoggerMessage());
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
            throw new FileNotFoundException(get_class($this) . ' Config File not found');
        }
    }

    /**
     * @param array $data
     * @param bool $recursive
     * @return AbstractModel
     */
    protected abstract function buildDomainObject(array $data, bool $recursive = false): AbstractModel;

    /**
     * Public alias for buildDomainObject method
     *
     * @param array $data
     * @param bool $recursive
     * @return AbstractModel
     */
    public function hydrate(array $data, bool $recursive = false): AbstractModel
    {
        return $this->buildDomainObject($data, $recursive);
    }

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
            $limit = array_key_exists('limit', $config[$parameter]) && is_int($config[$parameter]['limit']) ?
                $config[$parameter]['limit'] : 50;
            $offset = $limit != 0 && array_key_exists('offset', $config[$parameter]) && is_int($config[$parameter]['offset']) ?
                $config[$parameter]['offset'] : 0;
            $results = $relationDAO->findBy(['id' => $idsResults], $orderBy, false, $limit, $offset);
        }

        return $results;
    }

    /**
     * Edit relations between tables depending on the key mapped in the config file of the table
     * If the model's id isn't null, it will delete the relation
     * else it will insert the relation
     * @param AbstractModel $model
     * @return boolean
     */
    protected function editManyToManyRelation(AbstractModel $model): bool
    {
        if ($model->getId() === null) {
            return false;
        }

        $config = $this->getConfig();
        
        foreach ($config as $parameterName => $fieldName) {
            if (is_array($fieldName)) {
                if (array_key_exists('mapped', $fieldName) && $fieldName['mapped'] === true) {            
                    $this->deleteManyToManyRelation($model, $fieldName);
                    $result = $this->insertManyToManyRelation($model, $parameterName, $fieldName);
                } else {
                    continue;
                }
            } else {
                continue;
            }
        }
        return $result;
    }

    /**
     * Insert data in the relationship's table
     * @param AbstractModel $model
     * @param string $parameterName
     * @param array $fieldName
     * @return boolean
     */
    protected function insertManyToManyRelation(AbstractModel $model, string $parameterName, array $fieldName): bool
    {
        $getter = 'get' . ucfirst($parameterName);
        if (method_exists($model, $getter)) {
            $parameters = $model->{$getter}();
        } else {
            Logger::getInstance()->error("Method $getter not found in class $model, in " 
                . __FILE__ . "on" . __LINE__);
            return false;
        }
        
        $sql = '';
        /** @var AbstractModel $parameter */
        foreach ($parameters as $parameter) {
            if (array_key_exists('otherFields', $fieldName)) {
                $fieldDatabase = "";
                $otherField = "";
                foreach ($fieldName['otherFields'] as $key => $value) {
                    $getterOtherField = 'get' . ucfirst($key);
                    $otherField .= ", '" . $this->convertValueToFormatDatabase($parameter->{$getterOtherField}()) . "'";
                    $fieldDatabase .= ", " . $value; 
                }
                $sql .= " INSERT INTO $fieldName[tableName] ($fieldName[foreignKey], $fieldName[otherForeignKey] $fieldDatabase)
                    VALUES ({$model->getId()}, {$parameter->getId()} $otherField);";
            } else {
                $sql .= " INSERT INTO $fieldName[tableName] ($fieldName[foreignKey], $fieldName[otherForeignKey])
                    VALUES ({$model->getId()}, {$parameter->getId()});";
            }
        }
        return $this->query($sql);
    }

    /**
     * Delete data in the relationship's table
     * @param AbstractModel $model
     * @param array $fieldName
     * @return boolean
     */
    protected function deleteManyToManyRelation(AbstractModel $model, array $fieldName): bool
    {
        $sql = "DELETE FROM $fieldName[tableName]
                WHERE $fieldName[foreignKey] = {$model->getId()};";
        return $this->query($sql);
    }

}