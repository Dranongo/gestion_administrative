<?php

namespace Model;

class TypeContrat extends AbstractModel
{
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
     * @return TypeContrat
     */
    public function setCode(string $code): TypeContrat
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
     * @return TypeContrat
     */
    public function setNom(string $nom): TypeContrat
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
