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