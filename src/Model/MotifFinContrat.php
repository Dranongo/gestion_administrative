<?php

namespace Model;

class MotifFinContrat extends AbstractModel
{
    /**
     * @var string
     */
    protected static $DAOClassName = 'MotifFinContratDAO';

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $nom;

    /**
     * @var array<Contrat>
     */
    protected $contrats = [];

    /**
     * @param string $code
     * @return MotifFinContrat
     */
    public function setCode(string $code): MotifFinContrat
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
     * @return MotifFinContrat
     */
    public function setNom(string $nom): MotifFinContrat
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
     * @param array $contrats
     * @return TypeContrat
     */
    public function setContrats(array $contrats): TypeContrat
    {
        $this->removeAllContrats();
        foreach ($contrats as $contrat) {
            if ($contrat instanceof Contrat) {
                $this->addContrat($contrat);
            }
        }

        return $this;
    }

    /**
     * @return TypeContrat
     */
    public function removeAllContrats(): TypeContrat
    {
        $this->contrats = [];

        return $this;
    }

    /**
     * @param Contrat $contrat
     * @return TypeContrat
     */
    public function addContrat(Contrat $contrat): TypeContrat
    {
        $this->contrats[] = $contrat;

        return $this;
    }

    /**
     * @param Contrat $contrat
     * @return TypeContrat
     */
    public function removeContrat(Contrat $contrat): TypeContrat
    {
        $key = array_search($contrat, $this->getContrats(), true);
        if ($key !== false) {
            unset($this->contrats[$key]);
        }

        return $this;
    }

    /**
     * @return array<Contrat>
     */
    public function getContrats(): array
    {
        return $this->contrats;
    }
}
