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
}