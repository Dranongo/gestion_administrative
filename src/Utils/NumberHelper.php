<?php

namespace Utils;

/**
 * This class contains method to convert and compare some number in the form.
 * This is a singleton with static methods. 
 * Class NumberHelper
 * @package Utils
 */
class NumberHelper
{
    /**
     * 
     *
     * @param integer $number
     * @param integer $limitLength
     * @return boolean
     */
    public static function checkSocialSecurityNumber(int $number, int $limitLength = 15): bool 
    {
        return strlen($number) == $limitLength;
    }

    /**
     * 
     *
     * @param integer $salary
     * @param integer $limitLength
     * @return boolean
     */
    public static function checkSalary(int $salary, int $limitLength = 6): bool 
    {
        return is_numeric($salary) && strlen($salary) <= $limitLength;
    }

    /**
     * 
     *
     * @param string $postalCode
     * @param integer $limitLength
     * @return boolean
     */
    public static function checkPostalCode(string $postalCode, int $limitLength = 5): bool 
    {
        return is_numeric($postalCode) && strlen($postalCode) == $limitLength;
    }

    /**
     * 
     *
     * @param string $phoneNumber
     * @param integer $limitLength
     * @return boolean
     */
    public static function checkPhoneNumber(string $phoneNumber, int $limitLength = 10): bool 
    {
        return is_numeric($phoneNumber) && strlen($phoneNumber) == $limitLength;
    }
    
    /**
     * 
     *
     * @param integer $residencePermitNumber
     * @param integer $limitLength
     * @return boolean
     */
    public static function checkResidencePermitNumber(int $residencePermitNumber, int $limitLength = 10): bool 
    {
        return is_numeric($residencePermitNumber) && strlen($residencePermitNumber) <= $limitLength;
    }
}