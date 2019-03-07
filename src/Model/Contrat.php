<?php

namespace Model;

class Contrat extends AbstractModel
{
	/**
     * @var array<Salarie>
     */
    protected $salaries = [];

    /**
     * @var array<RenseignementPoste>
     */
    protected $renseignementsPoste = [];

    /**
     * @var array<TypeContrat>
     */
    protected $typesContrat = [];

    /**
     * @var \DateTime
     */
    protected $dateDebutContrat;

    /**
     * @var \DateTime
     */
    protected $dateFinContrat;

    /**
     * @param array $salaries
     * @return Contrat
     */
    public function setSalaries(array $salaries): Contrat
    {
        $this->removeAllSalaries();
        foreach ($salaries as $salarie) {
            if ($salarie instanceof Salarie) {
                $this->salaries[$salarie->getId()] = $salarie;
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
        $this->salaries[$salarie->getId()] = $salarie;

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
                $this->renseignementsPoste[$renseignementPoste->getId()] = $renseignementPoste;
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
        $this->renseignementsPoste[$renseignementPoste->getId()] = $renseignementPoste;

        return $this;
    }

    /**
     * @param RenseignementPoste $renseignementPoste
     * @return Contrat
     */
    public function removeRenseignementPoste(RenseignementPoste $renseignementPoste): Contrat
    {
        $renseignementPoste = $this->getSalaries();
        if (array_key_exists($renseignementPoste->getId(), $renseignementsPoste)) {
            unset($renseignementsPoste[$renseignementPoste->getId()]);
        }

        return $this;
    }

    /**
     * @return array<RenseignementPoste>
     */
    public function getRenseignementPoste(): array
    {
        return $this->renseignementsPoste;
    }

    /**
     * @param array $typesContrat
     * @return Contrat
     */
    public function setTypesContrat(array $typesContrat): Contrat
    {
        $this->removeAllTypesContrat();
        foreach ($typesContrat as $typeContrat) {
            if ($typeContrat instanceof TypeContrat) {
                $this->typesContrat[$typeContrat->getId()] = $typeContrat;
            }
        }

        return $this;
    }

    /**
     * @return Contrat
     */
    public function removeAllTypesContrat(): Contrat
    {
        $this->typesContrat = [];

        return $this;
    }

    /**
     * @param TypeContrat $typeContrat
     * @return Contrat
     */
    public function addTypeContrat(TypeContrat $typeContrat): Contrat
    {
        $this->typesContrat[$typeContrat->getId()] = $typeContrat;

        return $this;
    }

    /**
     * @param TypeContrat $typeContrat
     * @return Contrat
     */
    public function removeTypeContrat(TypeContrat $typeContrat): Contrat
    {
        $typeContrat = $this->getTypesContrat();
        if (array_key_exists($typeContrat->getId(), $typesContrat)) {
            unset($typesContrat[$typeContrat->getId()]);
        }

        return $this;
    }

    /**
     * @return array<TypeContrat>
     */
    public function getTypesContrat(): array
    {
        return $this->typesContrat;
    }

    /**
     * @param \DateTime $dateDebutContrat
     * @return Contrat
     */
    public function setDateDebutContrat(\DateTime $dateDebutContrat): Contrat
    {
        $this->dateDebutContrat = $dateDebutContrat;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateDebutContrat(): ?\DateTime
    {
        return $this->dateDebutContrat;
    }

    /**
     * @param \DateTime $dateFinContrat
     * @return Contrat
     */
    public function setDateFinContrat(\DateTime $dateFinContrat): Contrat
    {
        $this->dateFinContrat = $dateFinContrat;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateFinContrat(): ?\DateTime
    {
        return $this->dateFinContrat;
    }
}