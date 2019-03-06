<?php

namespace Model;

class CategorieSocioProfessionnelle extends AbstractModel
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
     * @return CategorieSocioProfessionnelle
     */
    public function setCode(string $code): CategorieSocioProfessionnelle
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
     * @return CategorieSocioProfessionnelle
     */
    public function setNom(string $nom): CategorieSocioProfessionnelle
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
