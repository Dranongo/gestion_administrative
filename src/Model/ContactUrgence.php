<?php

namespace Model;

class ContactUrgence extends AbstractModel
{
    /**
     * @var string
     */
    protected static $DAOClassName = 'ContactUrgenceDAO';

    /**
     * @var string
     */
    protected $nom;

    /**
     * @var string
     */
    protected $prenom;

    /**
     * @var string
     */
    protected $lien;

    /**
     * @var string
     */
    protected $telephone;

    /**
     * @var Salarie
     */
    protected $salarie;

    /**
     * @param string $nom
     * @return ContactUrgence
     */
    public function setNom(string $nom): ContactUrgence
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
     * @return ContactUrgence
     */
    public function setPrenom(string $prenom): ContactUrgence
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
     * @param string $lien
     * @return ContactUrgence
     */
    public function setLien(string $lien): ContactUrgence
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * @return string
     */
    public function getLien(): string
    {
        return $this->lien;
    }

    /**
     * @param string $telephone
     * @return ContactUrgence
     */
    public function setTelephone(string $telephone): ContactUrgence
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param Salarie $salarie
     * @return ContactUrgence
     */
    public function setSalarie(Salarie $salarie): ContactUrgence
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
