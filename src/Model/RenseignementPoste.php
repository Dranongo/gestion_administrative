<?php

namespace Model;

class RenseignementPoste extends AbstractModel
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
     * @var array<Contrat>
     */
    protected $contrats = [];

    /**
     * @param string $code
     * @return RenseignementPoste
     */
    public function setCode(string $code): RenseignementPoste
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
     * @return RenseignementPoste
     */
    public function setNom(string $nom): RenseignementPoste
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
     * @return RenseignementPoste
     */
    public function setContrats(array $contrats): RenseignementPoste
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
     * @return RenseignementPoste
     */
    public function removeAllContrats(): RenseignementPoste
    {
        $this->contrats = [];

        return $this;
    }

    /**
     * @param Contrat $contrat
     * @return RenseignementPoste
     */
    public function addContrat(Contrat $contrat): RenseignementPoste
    {
        $this->contrats[] = $contrat;

        return $this;
    }

    /**
     * @param Contrat $contrat
     * @return RenseignementPoste
     */
    public function removeContrat(Contrat $contrat): RenseignementPoste
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
