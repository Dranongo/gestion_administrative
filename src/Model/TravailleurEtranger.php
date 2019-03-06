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
    protected $dateAutorisation;

    /**
     * @var \DateTime
     */
    protected $dateLimite;

    /**
     * @var int
     */
    protected $numCarteSejour;

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
     * @param \DateTime $dateAutorisation
     * @return TravailleurEtranger
     */
    public function setDateAutorisation(\DateTime $dateAutorisation): TravailleurEtranger
    {
        $this->dateAutorisation = $dateAutorisation;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateAutorisation(): \DateTime
    {
        return $this->dateAutorisation;
    }

    /**
     * @param \DateTime $dateLimite
     * @return TravailleurEtranger
     */
    public function setDateLimite(\DateTime $dateLimite): TravailleurEtranger
    {
        $this->dateLimite = $dateLimite;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateLimite(): \DateTime
    {
        return $this->dateLimite;
    }

    /**
     * @param int $numCarteSejour
     * @return TravailleurEtranger
     */
    public function setNumCarteSejour(int $numCarteSejour): TravailleurEtranger
    {
        $this->numCarteSejour = $numCarteSejour;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumCarteSejour(): int
    {
        return $this->numCarteSejour;
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
