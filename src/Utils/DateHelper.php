<?php

namespace Utils;

/**
 * This class contains method to convert and format the dates in the application.
 * This is a singleton with static methods. 
 * Class DateHelper
 * @package Utils
 */
class DateHelper
{
    /**
     * @var DateHelper|null
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
     * @return DateHelper
     */
    public static function getInstance(): DateHelper
    {
        if (! self::$_instance instanceof DateHelper) {
            self::$_instance = new static();
        }

        return self::$_instance;
    }

    /**
     * Check if the parameter is null or a string.
     * If it is a string then it will return a DateTime object else null
     * @param string|null $databaseDate
     * @return \DateTime|null
     * @throws \Exception
     */
    public static function convertDatabaseDateToDateTime(?string $databaseDate): ?\DateTime
    {
        return $databaseDate === null ? null : new \DateTime($databaseDate);
    }

    /**
     * Check if the parameter is null or a DateTime object.
     * If it is a DateTime object then if will convert it to the Database string format and return it as a string
     * else null
     * @param \DateTime|null $dateTime
     * @return string|null
     */
    public static function convertDateTimeToDatabaseFormat(?\DateTime $dateTime): ?string
    {
        return $dateTime === null ? null : $dateTime->format('Y-m-d H:i:s');
    }

    /**
     * Check if the current date is between the start date and the end date.
     * If one of the two parameters is null then it will compare the current date just with it.
     * @param \DateTime|null $startDate
     * @param \DateTime|null $endDate
     * @return bool
     * @throws \Exception
     */
    public static function isCurrentDate(?\DateTime $startDate, ?\DateTime $endDate): bool
    {
        if (is_null($startDate) && is_null($endDate)) {
            return false;
        }

        $currentDate = new \DateTime();

        if (is_null($startDate) xor is_null($endDate)) {
            return is_null($startDate) ? $currentDate < $endDate : $currentDate > $startDate;
        } else {
            return $currentDate > $startDate && $currentDate < $endDate;
        }
    }
}