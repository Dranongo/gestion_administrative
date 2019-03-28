<?php

namespace Model;

class Enfant extends AbstractModel
{
    /**
     * @var string
     */
    protected static $DAOClassName = 'EnfantDAO';

    /**
     * @var string
     */
    protected $nom;

    /**
     * @var string
     */
    protected $prenom;

    /**
     * @var \Datetime
     */
    protected $dateNaissance;

    /**
     * @var Salarie
     */
    protected $salarie;

    /**
     * @param string $nom
     * @return Enfant
     */
    public function setNom(string $nom): Enfant
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

    /**
     * @param string $niveau
     * @return Enfant
     */
    public function setPrenom(string $prenom): Enfant
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param \Datetime $dateNaissance
     * @return Enfant
     */
    public function setDateNaissance(\Datetime $dateNaissance): Enfant
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * @return \Datetime
     */
    public function getDateNaissance(): \Datetime
    {
        return $this->dateNaissance;
    }

    /**
     * @param Salarie $salarie
     * @return Enfant
     */
    public function setSalarie(Salarie $salarie): Enfant
    {
        $this->salarie = $salarie;

        return $this;
    }

    /**
     * @return Salarie
     */
    public function getSalarie(): Salarie
    {
        return $this->salarie;
    }
}
