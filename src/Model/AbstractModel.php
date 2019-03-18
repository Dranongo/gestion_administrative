<?php

namespace Model;

abstract class AbstractModel
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected static $DAOClassName = '';

    public function __construct() {}

    /**
     * @param int $id
     * @return AbstractModel
     */
    final public function setId(int $id): AbstractModel
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    final public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    final public static function getDAOClassName(): string
    {
        return static::$DAOClassName;
    }

    /**
     * @return \DAO\DatabaseDAO
     * @throws \Exception
     */
    final public static function getDAOInstance(): \DAO\DatabaseDAO
    {
        $DAOClassName = '\\DAO\\' . static::getDAOClassName();
        if (class_exists($DAOClassName) && $DAOClassName instanceof \DAO\DatabaseDAO) {
            return $DAOClassName::getInstance();
        } else {
            throw new \Exception(static::class . ' DAO not found');
        }
    }

    /**
     * @param string $parameter
     * @param string $value
     * @return bool
     */
    final public function isInPossibleChoices(string $parameter, string $value): bool
    {
        $method = 'get' . ucfirst($parameter);
        if (method_exists($this, $method)) {
            $possibleValues = $this->{$method}();
            return is_array($possibleValues) && in_array($value, $possibleValues);
        }
        return false;
    }

    /**
     * @return \DAO\DatabaseDAO
     */
    final public function save(): \DAO\DatabaseDAO
    {
        return static::getDAOInstance()->save($this);
    }

}