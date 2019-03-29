<?php

namespace Utils;

/**
 * This class contains method to convert and compare some integer in the form.
 * This is a singleton with static methods. 
 * Class IntegerHelper
 * @package Utils
 */
class IntegerHelper
{
    /**
     * @var IntegerHelper|null
     */
    private static $_instance = null;

    /**
     * IntegerHelper constructor.
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
     * @return IntegerHelper
     */
    public static function getInstance(): IntegerHelper
    {
        if (! self::$_instance instanceof IntegerHelper) {
            self::$_instance = new static();
        }

        return self::$_instance;
    }

    public static function checkSocialSecurityNumber(int $number, int $limitLength = 15): bool 
    {
        return strlen($number) == $limitLength;
    }

    public static function checkSalary(int $salary, int $limitLength = 6): bool 
    {
        return is_numeric($salary) && strlen($salary) <= $limitLength;
    }

    public static function checkPostalCode(int $postalCode, int $limitLength = 5): bool 
    {
        return is_numeric($postalCode) && strlen($postalCode) == $limitLength;
    }

    public static function checkPhoneNumber(int $phoneNumber, int $limitLength = 10): bool 
    {
        return is_numeric($phoneNumber) && strlen($phoneNumber) == $limitLength;
    }
    
    public static function checkResidencePermitNumber(int $residencePermitNumber, int $limitLength = 10): bool 
    {
        return is_numeric($residencePermitNumber) && strlen($residencePermitNumber) <= $limitLength;
    }
}