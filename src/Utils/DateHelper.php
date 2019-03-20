<?php

namespace Utils;

/**
 * This class contains method to convert and compare the dates in the application.
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
     * Check if the $dateToCompare parameter is between the start date and the end date.
     * If one of the two parameters is null then it will compare the $dateToCompare just with the one that is not null.
     * @param \DateTime $dateToCompare
     * @param \DateTime|null $startDate
     * @param \DateTime|null $endDate
     * @return bool
     * @throws \Exception
     */
    public static function isDateInInterval(
        \DateTime $dateToCompare,
        ?\DateTime $startDate = null,
        ?\DateTime $endDate = null
    ): bool
    {
        if ($startDate === null && $endDate === null) {
            return false;
        }

        if ($startDate === null xor $endDate === null) {
            return $startDate === null ? $dateToCompare < $endDate : $dateToCompare > $startDate;
        } else {
            return $dateToCompare > $startDate && $dateToCompare < $endDate;
        }
    }

    /**
     * Check if the $dateToCompare parameter is before the $dateEnd parameter.
     * If the $dateEnd parameter is null, then $dateToCompare will be compared with the current date.
     * @param \DateTime $dateToCompare
     * @param \DateTime|null $dateEnd
     * @return bool
     * @throws \Exception
     */
    public static function isDateBefore(\DateTime $dateToCompare, ?\DateTime $dateEnd = null): bool
    {
        if ($dateEnd === null) {
            $dateEnd = new \DateTime();
        }

        return $dateToCompare < $dateEnd;
    }

    /**
     * Check if the $dateToCompare parameter is after the $dateStart parameter.
     * If the $dateStart parameter is null, then $dateToCompare will be compared with the current date.
     * @param \DateTime $dateToCompare
     * @param \DateTime|null $dateStart
     * @return bool
     * @throws \Exception
     */
    public static function isDateAfter(\DateTime $dateToCompare, ?\DateTime $dateStart = null): bool
    {
        if ($dateStart === null) {
            $dateStart = new \DateTime();
        }

        return $dateToCompare < $dateStart;
    }
}