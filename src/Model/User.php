<?php

namespace Model;


class User extends AbstractModel implements \Serializable
{
    /**
     * @var string
     */
    protected static $DAOClassName = 'UserDAO';

    /**
     * @var string
     */
    protected $firstname;

    /**
     * @var string
     */
    protected $lastname;

    /**
     * @var string
     */
    protected $mail;

    /**
     * @var string
     */
    protected $password;

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getFirstname() . ' ' . $this->getLastname();
    }

    public function serialize()
    {
        return serialize(get_object_vars($this));
    }

    public function unserialize($serialized)
    {
        foreach (unserialize($serialized) as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * @param string $firstname
     * @return User
     */
    public function setFirstname(string $firstname): User
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $lastname
     * @return User
     */
    public function setLastname(string $lastname): User
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $mail
     * @return User
     */
    public function setMail(string $mail): User
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}