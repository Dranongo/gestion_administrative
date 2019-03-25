<?php

namespace Utils;

/**
 * This class contains method to convert data into sql query in the application.
 * This is a singleton with static methods. 
 * Class SqlHelper
 * @package Utils
 */
class SqlHelper
{
    /**
     * @var SqlHelper|null
     */
    private static $_instance = null;

    /**
     * SqlHelper constructor.
     */
    final private function __construct() {}

    /**
     * Clone method is not allowed
     */
    final private function __clone()
    {
        throw new \Exception("Le clonage n'est pas autorisé");
    }

    /**
     * @return SqlHelper
     */
    public static function getInstance(): SqlHelper
    {
        if (! self::$_instance instanceof SqlHelper) {
            self::$_instance = new static();
        }

        return self::$_instance;
    }

    /**
     * It will call functions to create the sql query from the parameters
     * and return the sql query as a string
     * @param array $criteria
     * @param array $orderBy
     * @param int|null $limit
     * @param int|null $offset
     * @return string
     */
    public function convertDataToSqlQuery(array $criteria = [], 
        array $orderBy = [], 
        ?int $limit, 
        ?int $offset)
    : string
    {
        return $this->addWhereClause($criteria) 
             . $this->addOrderByKeyword($orderBy) 
             . $this->addLimitRestrictions($limit, $offset);
    }

    /**
     * Convert the data in the array into the correct syntax for a sql query
     * return all the converted data as a string
     * or a empty string
     * @param array $fieldsArray
     * @return string
     */
    protected function convertValuesToQueryFormat(array $fieldsArray): string
    {
        $cpt = 0;
        $fields = "";
        foreach ($fieldsArray as $key => $value) {
            if (is_array($value)) {
                $fields .= ($cpt++ ? ", " : "") . addslashes($key) . ' IN (' . implode(',', $value) . ')';
            } else {
                $fields .= ($cpt++ ? ", " : "") . addslashes($key) . " = '" . addslashes($value) . "'";
            }
        }
        return $fields;
    }

    /**
     * Convert the data in the array into the correct syntax for a sql query with a where clause
     * return all the converted data as a string
     * or a empty string
     * @param array $fieldsArray
     * @return string
     */
    protected function convertValuesToQueryWhereFormat(array $fieldsArray): string
    {
        $cpt = 0;
        $fields = "";
        foreach ($fieldsArray as $key => $value) {
            if (is_array($value)) {
                $fields .= ($cpt++ ? " AND " : "") . addslashes($key) . ' IN (' . implode(',', $value) . ')';
            } else {
                $fields .= ($cpt++ ? " AND " : "") . addslashes($key) . " = '" . addslashes($value) . "'";
            }
        }
        return $fields;
    }

    /**
     * Convert the values in the array into the correct syntax for a sql insert into statement
     * return the converted array
     * @param array $fieldsArray
     * @return array
     */
    protected function convertValuesToInsertQueryFormat(array $fieldsArray): array
    {
        foreach ($fieldsArray as $key => $value) {
            if (is_string($value)) {
                $fieldsArray[$key] = "'" . addslashes($value) . "'";
            } elseif (is_bool($value)) {
                $fieldsArray[$key] = intval($value);
            } elseif ($value === null) {
                $fieldsArray[$key] = 'null';
            }
        }
        return $fieldsArray;
    }

    /**
     * Convert the data into the correct syntax for a sql insert into statement
     * return the data we need to insert as a string
     * @param array $fieldsArray
     * @return string
     */
    public function convertDataToInsertQuery(array $fieldsArray): string
    {
        $fieldsArray = $this->convertValuesToInsertQueryFormat($fieldsArray);

        $dataBaseFields = implode(", ", array_keys($fieldsArray));
        $valueModel = implode(", ", array_values($fieldsArray));

        return " ($dataBaseFields) VALUES ($valueModel)";
    }

    /**
     * Convert the data into the correct syntax for a sql update statement
     * return the data we need to update as a string
     * @param array $fieldsArray
     * @param integer $id
     * @return string
     */
    public function convertDataToUpdateQuery(array $fieldsArray, int $id): string
    {
        $fields = $this->convertValuesToQueryFormat($fieldsArray);
        
        return " SET $fields WHERE id = $id";
    }

    /**
     * Check if the table is empty or not.
     * If it is a string, then it will call another function to convert the data, in the table,
     * into the correct format for the sql WHERE clause in a query
     * and return a string for the sql query
     * else return a empty string
     * @param array $criteria
     * @return string
     */
    public static function addWhereClause(array $criteria): string
    {
        return count($criteria) == 0 ? "" : " WHERE " . self::getInstance()->convertValuesToQueryWhereFormat($criteria);
    }

    /**
     * Check if the table is empty or not.
     * If it isn't, then it will call another function to convert the data, in the table,
     * into the correct format for the sql ORDER BY keyword in a query
     * and return a string for the sql query
     * else return a empty string
     * @param array $orderBy
     * @return string
     */
    public function addOrderByKeyword(array $orderBy): string
    {
        $string = ["=", "'"];
        return count($orderBy) == 0 ? "" : " ORDER BY " . str_replace($string, "", $this->convertValuesToQueryFormat($orderBy));
    }

    /**
     * Check if the first parameter is null or a string.
     * If it is a integer, then it will call another function to check the second parameter 
     * and return a string for the sql query
     * else return a empty string
     * @param int|null $limit
     * @param int|null $offset
     * @return string
     */
    public function addLimitRestrictions(?int $limit, ?int $offset): string
    {
        return $limit == null ? "" : " LIMIT " . $limit . $this->addOffset($offset);
    }

    /**
     * Check if the parameter is null or a string.
     * If it is a integer, then it will return a string for the sql query
     * else return a empty string
     * @param int|null $offset
     * @return string
     */
    public function addOffset(?int $offset): string
    {
        return $offset == null ? "" : " OFFSET " . $offset;
    }
}