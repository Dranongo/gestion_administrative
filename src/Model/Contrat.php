<?php

namespace Model;

class Contrat extends AbstractModel
{
    /**
     * @var string
     */
    protected static $DAOClassName = 'ContratDAO';

	/**
     * @var \DateTime
     */
    protected $dateDebut;

    /**
     * @var ?\DateTime
     */
    protected $dateFin;

	/**
     * @var Salarie
     */
    protected $salarie;

    /**
     * @var RenseignementPoste
     */
    protected $renseignementPoste;

    /**
     * @var TypeContrat
     */
    protected $typeContrat;

    /**
     * @var MotifFinContrat
     */
    protected $motifFinContrat;

    /**
     * @param \DateTime $dateDebut
     * @return Contrat
     */
    public function setDateDebut(\DateTime $dateDebut): Contrat
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateDebut(): ?\DateTime
    {
        return $this->dateDebut;
    }

    /**
     * @param \DateTime $dateFin
     * @return Contrat
     */
    public function setDateFin(?\DateTime $dateFin): Contrat
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateFin(): ?\DateTime
    {
        return $this->dateFin;
    }

    /**
     * @param Salarie $salarie
     * @return Contrat
     */
    public function setSalarie(Salarie $salarie): Contrat
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

    /**
     * @param RenseignementPoste $renseignementPoste
     * @return Contrat
     */
    public function setRenseignementPoste(RenseignementPoste $renseignementPoste): Contrat
    {
        $this->renseignementPoste = $renseignementPoste;

        return $this;   
    }

    /**
     * @return RenseignementPoste
     */
    public function getRenseignementPoste(): RenseignementPoste
    {
        return $this->renseignementPoste;
    }

    /**
     * @param TypeContrat $typeContrat
     * @return Contrat
     */
    public function setTypeContrat(TypeContrat $typeContrat): Contrat
    {
        $this->typeContrat = $typeContrat;

        return $this;
    }

    /**
     * @return TypeContrat
     */
	public function getTypeContrat(): TypeContrat
    {
        return $this->typeContrat;
    }

    /**
     * @param MotifFinContrat $motifFinContrat
     * @return Contrat
     */
     public function setMotifFinContrat(MotifFinContrat $motifFinContrat): Contrat
     {
         $this->motifFinContrat = $motifFinContrat;

        return $this;
     } 

    /**
     * @return MotifFinContrat
     */
    public function getMotifFinContrat(): MotifFinContrat
    {
        return $this->motifFinContrat;
    }
}