<?php

namespace Model;

abstract class AbstractModel
{
    /**
     * @var integer
     */
    protected $id;

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
     * @param string $parameter
     * @param string $value
     * @return bool
     */
    final public function checkChoixPossibles(array $parameter, string $value): bool
    {
        $method = 'get' . ucfirst($parameter);
        if (method_exists($this, $method)) {
            $possibleValues = $this->{method}();
            return is_array($possibleValues) && in_array($value, $possibleValues);
        }
        return false;
    }    
}