<?php

namespace Utils;

/**
 * This class contains method to convert data into request sql in the application.
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
     * Undocumented function
     *
     * @param array $criteria
     * @param array $orderBy
     * @param int|null $limit
     * @param int|null $offset
     * @return string
     */
    public static function convertDataToSqlRequest(array $criteria, 
        array $orderBy, 
        ?int $limit, 
        ?int $offset)
    : string
    {
        return static::addWhereClause($criteria) 
             . static::addOrderByKeyword($orderBy) 
             . static::addLimitRestrictions($limit, $offset);
    }

    /**
     * Undocumented function
     *
     * @param array $fieldsArray
     * @return string|null
     */
    public static function convertValuesToRequestFormat(array $fieldsArray): ?string
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
     * @param array $fieldsArray
     * @return array
     */
    protected function convertValuesToInsertRequestFormat(array $fieldsArray): array
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
     * Undocumented function
     *
     * @param array $fieldsArray
     * @return string
     */
    public static function convertDataToInsertRequest(array $fieldsArray): string
    {
        $fieldsArray = self::convertValuesToInsertRequestFormat($fieldsArray);

        $dataBaseFields = implode(", ", array_keys($fieldsArray));
        $valueModel = implode(", ", array_values($fieldsArray));

        return " ($dataBaseFields) VALUES ($valueModel)";
    }

    /**
     * Undocumented function
     *
     * @param array $fieldsArray
     * @param integer $id
     * @return string
     */
    public static function convertDataToUpdateRequest(array $fieldsArray, int $id): string
    {
        $fields = convertValuesToRequestFormat($fieldsArray);
        
        return "SET $fields WHERE id = $id";
    }

    /**
     * Undocumented function
     *
     * @param array $criteria
     * @return string|null
     */
    public static function addWhereClause(array $criteria): ?string
    {
        return count($criteria) == 0 ? "" : " WHERE " . str_replace(",", "AND", self::convertValuesToRequestFormat($criteria));
    }

    /**
     * Undocumented function
     *
     * @param array $orderBy
     * @return string|null
     */
    public static function addOrderByKeyword(array $orderBy): ?string
    {
        $string = ["=", "'"];
        return count($orderBy) == 0 ? "" : " ORDER BY " . str_replace($string, "", self::convertValuesToRequestFormat($orderBy));
    }

    /**
     * Undocumented function
     *
     * @param int|null $limit
     * @param int|null $offset
     * @return string|null
     */
    public static function addLimitRestrictions(?int $limit, ?int $offset): ?string
    {
        return $limit == null ? "" : " LIMIT " . $limit . self::addOffset($offset);
    }

    /**
     * Undocumented function
     *
     * @param int|null $offset
     * @return string
     */
    public static function addOffset(?int $offset): string
    {
        return $offset == null ? "" : " OFFSET " . $offset;
    }
}