<?php

namespace Model;

class TravailleurEtranger extends AbstractModel
{
    /**
     * @var bool
     */
    protected $autorisationTravail;

    /**
     * @var \DateTime
     */
    protected $dateAutorisationEmbauche;

    /**
     * @var \DateTime
     */
    protected $dateLimiteValidite;

    /**
     * @var int
     */
    protected $numeroCarteSejour;

    /**
     * @var Salarie
     */
    protected $salarie;

    /**
     * @param bool $autorisationTravail
     * @return TravailleurEtranger
     */
    public function setAutorisationTravail(bool $autorisationTravail): TravailleurEtranger
    {
        $this->autorisationTravail = $autorisationTravail;

        return $this;
    }

    /**
     * @return bool
     */
    public function getAutorisationTravail(): bool
    {
        return $this->autorisationTravail;
    }

    /**
     * @param \DateTime $dateAutorisationEmbauche
     * @return TravailleurEtranger
     */
    public function setDateAutorisationEmbauche(\DateTime $dateAutorisationEmbauche): TravailleurEtranger
    {
        $this->dateAutorisationEmbauche = $dateAutorisationEmbauche;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateAutorisationEmbauche(): \DateTime
    {
        return $this->dateAutorisationEmbauche;
    }

    /**
     * @param int $numeroCarteSejour
     * @return TravailleurEtranger
     */
    public function setNumeroCarteSejour(int $numeroCarteSejour): TravailleurEtranger
    {
        $this->numeroCarteSejour = $numeroCarteSejour;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumeroCarteSejour(): int
    {
        return $this->numeroCarteSejour;
    }

    /**
     * @param \DateTime $dateLimiteValidite
     * @return TravailleurEtranger
     */
    public function setDateLimiteValidite(\DateTime $dateLimiteValidite): TravailleurEtranger
    {
        $this->dateLimiteValidite = $dateLimiteValidite;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateLimiteValidite(): \DateTime
    {
        return $this->dateLimiteValidite;
    }

    /**
     * @param Salarie $salarie
     * @return TravailleurEtranger
     */
    public function setSalarie(Salarie $salarie): TravailleurEtranger
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
