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
     * @var \DateTime
     */
    protected $dateDebutSalarie;

    /**
     * @var \DateTime
     */
    protected $dateFinSalarie;

    /**
     * @var array<Salarie>
     */
    protected $salaries = [];

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

    /**
     * @param \DateTime $dateDebutSalarie
     * @return CategorieSocioProfessionnelle
     */
    public function setDateDebutSalarie(\DateTime $dateDebutSalarie): CategorieSocioProfessionnelle
    {
        $this->dateDebutSalarie = $dateDebutSalarie;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateDebutSalarie(): ?\DateTime
    {
        return $this->dateDebutSalarie;
    }

    /**
     * @param \DateTime $dateFinSalarie
     * @return CategorieSocioProfessionnelle
     */
    public function setDateFinSalarie(\DateTime $dateFinSalarie): CategorieSocioProfessionnelle
    {
        $this->dateFinSalarie = $dateFinSalarie;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateFinSalarie(): ?\DateTime
    {
        return $this->dateFinSalarie;
    }

    /**
     * @param array $salaries
     * @return CategorieSocioProfessionnelle
     */
    public function setSalaries(array $salaries): CategorieSocioProfessionnelle
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
     * @return CategorieSocioProfessionnelle
     */
    public function removeAllSalaries(): CategorieSocioProfessionnelle
    {
        $this->salaries = [];

        return $this;
    }

    /**
     * @param salarie $salarie
     * @return CategorieSocioProfessionnelle
     */
    public function addSalarie(salarie $salarie): CategorieSocioProfessionnelle
    {
        $this->salaries[$salarie->getId()] = $salarie;

        return $this;
    }

    /**
     * @param salarie $salarie
     * @return CategorieSocioProfessionnelle
     */
    public function removeSalarie(salarie $salarie): CategorieSocioProfessionnelle
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
}
