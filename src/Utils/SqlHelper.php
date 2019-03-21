<?php

namespace Utils;

/**
 * This class contains method in the application.
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
     * DateHelper constructor.
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

    public static function convertDataToSqlRequest(string $nameTable, 
        array $criteria, 
        array $orderBy, 
        ?int $limit, 
        ?int $offset)
    : string
    {
        return "SELECT * FROM $nameTable"
            . static::addWhereClause($criteria) 
            . static::addOrderByKeyword($orderBy) 
            . static::addLimitRestrictions($limit, $offset);
    }

    public static function convertValuesToDatabaseFormat(array $fieldsArray): ?string
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

    public static function addWhereClause(array $criteria): ?string
    {
        return count($criteria) == 0 ? "" : " WHERE " . static::convertValuesToDatabaseFormat($criteria);
    }

    public static function addOrderByKeyword(array $orderBy): ?string
    {
        $string = ["=", "'"];
        return count($orderBy) == 0 ? "" : " ORDER BY " . str_replace($string, "", static::convertValuesToDatabaseFormat($orderBy));
    }
    public static function addLimitRestrictions(?int $limit, ?int $offset): ?string
    {
        return $limit == null ? "" : " LIMIT " . $limit . static::addOffset($offset);
    }

    public static function addOffset(?int $offset): string
    {
        return $offset == null ? "" : " OFFSET " . $offset;
    }
}