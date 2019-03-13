<?php

namespace Model;

class Formation extends AbstractModel
{
    /**
     * @var string
     */
    protected $DAOClassName = 'FormationDAO';

    /**
     * @var string
     */
    protected $nom;

    /**
     * @var string
     */
    protected $niveau;

    /**
     * @var array
     */
    protected $niveauxPossibles = [
        'Niveau I',
        'Niveau II',
        'Niveau III',
        'Niveau IV',
        'Niveau V',
        'Niveau V bis et VI'
    ];  

    /**
     * @var string
     */
    protected $organisme;

    /**
     * @var string
     */
    protected $lieu;

    /**
     * @var \DateTime
     */
    protected $dateDebut;

    /**
     * @var \DateTime
     */
    protected $dateFin;

    /**
     * @var bool
     */
    protected $obtenu;

    /**
     * @var Salarie
     */
    protected $salarie;

    /**
     * @param string $nom
     * @return Formation
     */
    public function setNom(string $nom): Formation
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
     * @return Formation
     */
    public function setNiveau(string $niveau): Formation
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * @return string
     */
    public function getNiveau(): string
    {
        return $this->niveau;
    }

    /**
     * @return array
     */
    public function getNiveauxPossibles() : array
    {
        return $this->niveauxPossibles;
    }

    /**
     * @param string $organisme
     * @return Formation
     */
    public function setOrganisme(string $organisme): Formation
    {
        $this->organisme = $organisme;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrganisme(): string
    {
        return $this->organisme;
    }

    /**
     * @param string $lieu
     * @return Formation
     */
    public function setLieu(string $lieu): Formation
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * @return string
     */
    public function getLieu(): string
    {
        return $this->lieu;
    }

    /**
     * @param \DateTime $dateDebut
     * @return Formation
     */
    public function setDateDebut(\DateTime $dateDebut): Formation
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateDebut(): \DateTime
    {
        return $this->dateDebut;
    }

    /**
     * @param \DateTime $dateFin
     * @return Formation
     */
    public function setDateFin(\DateTime $dateFin): Formation
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateFin(): \DateTime
    {
        return $this->dateFin;
    }

    /**
     * @param bool $obtenu
     * @return Formation
     */
    public function setObtenu(bool $obtenu): Formation
    {
        $this->obtenu = $obtenu;

        return $this;
    }

    /**
     * @return bool
     */
    public function getObtenu(): bool
    {
        return $this->obtenu;
    }

    /**
     * @param Salarie $salarie
     * @return Formation
     */
    public function setSalarie(Salarie $salarie): Formation
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
