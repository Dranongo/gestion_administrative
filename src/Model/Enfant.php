<?php

namespace Model;

class Enfant extends AbstractModel
{
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
    protected $date;

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
     * @param \Datetime $date
     * @return Enfant
     */
    public function setDate(\Datetime $date): Enfant
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return \Datetime
     */
    public function getDate(): \Datetime
    {
        return $this->date;
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
