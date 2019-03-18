<?php

namespace Model;

class MotifFinContrat extends AbstractModel
{
    /**
     * @var string
     */
    protected static $DAOClassName = 'MotifFinContratDAO';

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $nom;

    /**
     * @param string $code
     * @return MotifFinContrat
     */
    public function setCode(string $code): MotifFinContrat
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $nom
     * @return MotifFinContrat
     */
    public function setNom(string $nom): MotifFinContrat
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }
}
