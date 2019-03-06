<?php

namespace Model;

class RenseignementPoste extends AbstractModel
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
     * @return RenseignementPoste
     */
    public function setCode(string $code): RenseignementPoste
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
     * @return RenseignementPoste
     */
    public function setNom(string $nom): RenseignementPoste
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
