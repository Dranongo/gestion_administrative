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
     * @var \DateTime
     */
    protected $dateFin;

	/**
     * @var array<Salarie>
     */
    protected $salaries = [];

    /**
     * @var array<RenseignementPoste>
     */
    protected $renseignementsPoste = [];

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
    public function setDateFin(\DateTime $dateFin): Contrat
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
     * @param array $salaries
     * @return Contrat
     */
    public function setSalaries(array $salaries): Contrat
    {
        $this->removeAllSalaries();
        foreach ($salaries as $salarie) {
            if ($salarie instanceof Salarie) {
                $this->addSalarie($salarie);
            }
        }

        return $this;
    }

    /**
     * @return Contrat
     */
    public function removeAllSalaries(): Contrat
    {
        $this->salaries = [];

        return $this;
    }

    /**
     * @param Salarie $salarie
     * @return Contrat
     */
    public function addSalarie(Salarie $salarie): Contrat
    {
        $this->salaries[] = $salarie;

        return $this;
    }

    /**
     * @param Salarie $salarie
     * @return Contrat
     */
    public function removeSalarie(Salarie $salarie): Contrat
    {
        $salarie = $this->getSalaries();
        if (array_key_exists($salarie->getId(), $salaries)) {
            unset($salaries[$salarie->getId()]);
        }

        $key = array_search($salarie, $this->getSalaries(), true);
        if ($key !== false) {
            unset($this->salaries[$key]);
        }

        return $this;
    }

    /**
     * @return array<Salarie>
     */
    public function getSalaries(): array
    {
        return $this->salaries;
    }

    /**
     * @param array $renseignementsPoste
     * @return Contrat
     */
    public function setRenseignementsPoste(array $renseignementsPoste): Contrat
    {
        $this->removeAllRenseignementsPoste();
        foreach ($renseignementsPoste as $renseignementPoste) {
            if ($renseignementPoste instanceof RenseignementPoste) {
                $this->addRenseignementPoste($renseignementPoste);
            }
        }

        return $this;
    }

    /**
     * @return Contrat
     */
    public function removeAllRenseignementsPoste(): Contrat
    {
        $this->renseignementsPoste = [];

        return $this;
    }

    /**
     * @param RenseignementPoste $renseignementPoste
     * @return Contrat
     */
    public function addRenseignementPoste(RenseignementPoste $renseignementPoste): Contrat
    {
        $this->renseignementsPoste[] = $renseignementPoste;

        return $this;
    }

    /**
     * @param RenseignementPoste $renseignementPoste
     * @return Contrat
     */
    public function removeRenseignementPoste(RenseignementPoste $renseignementPoste): Contrat
    {
        $key = array_search($renseignementPoste, $this->getRenseignementsPoste(), true);
        if ($key !== false) {
            unset($this->renseignementsPoste[$key]);
        }

        return $this;
    }

    /**
     * @return array<RenseignementPoste>
     */
    public function getRenseignementsPoste(): array
    {
        return $this->renseignementsPoste;
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