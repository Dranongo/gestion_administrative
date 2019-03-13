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
    protected $DAOClassName;

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
    final public function getDAOClassName(): string
    {
        return $this->DAOClassName;
    }

    final public function getDAOInstance(): \DAO\DatabaseDAO
    {
        $DAOClassName = '\\DAO\\' . $this->getDAOClassName();
        if (class_exists($DAOClassName)) {
            return $DAOClassName::getInstance();
        } else {
            throw new \Exception(self::class . ' DAO not found');
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
            $possibleValues = $this->{method}();
            return is_array($possibleValues) && in_array($value, $possibleValues);
        }
        return false;
    }    
}