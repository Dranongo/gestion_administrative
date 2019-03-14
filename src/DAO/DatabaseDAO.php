<?php

namespace DAO;


use Model\AbstractModel;
use Utils\DatabaseConnection;

abstract class DatabaseDAO
{
    /**
     * @var string
     */
    const __DATABASE_CONFIG_DIR__ = __SRC_DIR__ . 'database' . DIRECTORY_SEPARATOR;

    /**
     * @var string
     */
    protected $configFileName;

    /**
     * @var string
     */
    protected $config;

    /**
     * @var \PDO
     */
    private $connection;

    /**
     * @var string
     */
    protected $tableName;

    /**
     * @var DatabaseDAO
     */
    protected static $_instance = null;

    /**
     * DatabaseDAO constructor.
     */
    final private function __construct()
    {
        $this->connection = DatabaseConnection::getInstance()->getConnection();
        $this->modelToDatabaseFields();
    }

    /**
     * Clone method is not allowed
     */
    final private function __clone()
    {
        throw new \Exception("Le clonage n'est pas autorisé");
    }

    /**
     * @return DatabaseDAO
     */
    public static function getInstance(): DatabaseDAO
    {
        if (! self::$_instance instanceof DatabaseDAO) {
            self::$_instance = new static();
        }

        return self::$_instance;
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
     * @param ?int $limit
     * @param ?int $offset
     * @return array
     */
    public function findAll(array $orderBy = [], bool $recursive = false, ?int $limit = null, ?int $offset = null): array
    {
        $sql = "SELECT * 
                FROM $this->tableName";

        $stmt = $this->connection->query($sql);

        $fetchResult = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $arrayResult = [];

        for ($i=0; $i < count($fetchResult); $i++) { 
            $arrayResult[] = $this->buildDomainObject($fetchResult[$i], false);
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
     * @param ?int $limit
     * @param ?int $offset
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
        //$modelDatabase = $this->modelToDatabaseFields();
        //$criteria = $this->keyModelToDataBase($modelDatabase, $criteria);

        $stringCriteria = $this->valuesToDatabaseFormat($criteria);
        $stringOrderBy = $this->valuesToDatabaseFormat($orderBy);

        $search = array("=", "'");
        $stringOrderBy = str_replace($search, "", $stringOrderBy);

        $sql = "SELECT * 
                FROM $this->tableName
                WHERE $stringCriteria 
                ORDER BY $stringOrderBy";

        $stmt = $this->connection->query($sql);

        $fetchResult = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $arrayResult = [];

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
            } elseif (is_bool($value)) {
                $fieldsArray[$key] = intval($value);
            } elseif ($value == null) {
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
        $cpt = 0;
        $fields = "";
        foreach ($fieldsArray as $key => $value) {
            $fields .= ($cpt++ ? ", " : "") . addslashes($key) . " = '" . addslashes($value) . "'";
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
     * @param string $key
     * @return array
     */
    protected function keyModelToDataBase(string $key): string
    {
        $tableau = $this->modelToDatabaseFields();

        return array_key_exists($key, $tableau) ? $tableau[$key] : "";
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
}