<?php

namespace Utils;

/**
 * This class contains method to convert and compare some strings in the form.
 * This is a singleton with static methods. 
 * Class StringHelper
 * @package Utils
 */
class StringHelper
{
    /**
     * @var StringHelper|null
     */
    private static $_instance = null;

    /**
     * StringHelper constructor.
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
     * @return StringHelper
     */
    public static function getInstance(): StringHelper
    {
        if (! self::$_instance instanceof StringHelper) {
            self::$_instance = new static();
        }

        return self::$_instance;
    }

    /**
     * 
     *
     * @param string $email
     * @param boolean $required
     * 
     */
    public static function isEmailValid(string $email, bool $required = true)
    {
        return $required ? filter_var($email, FILTER_VALIDATE_EMAIL) : trim($email) == "" || filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Method that is used to encode the user passwords
     *
     * @param string $mail
     * @param string $password
     * @return string
     */
    public static function encodePassword(string $mail, string $password): string
    {
        return sha1(sha1(strtolower($mail)) . sha1($password));
    }
}