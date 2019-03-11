<?php

namespace Model;

class TypeContrat extends AbstractModel
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
     * @var array<DocumentType>
     */
    protected $documentTypes = [];

    /**
     * @var array<Contrat>
     */
    protected $contrats = [];

    /**
     * @param string $code
     * @return TypeContrat
     */
    public function setCode(string $code): TypeContrat
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
     * @return TypeContrat
     */
    public function setNom(string $nom): TypeContrat
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
     * @param array $documentTypes
     * @return TypeContrat
     */
    public function setDocumentTypes(array $documentTypes): TypeContrat
    {
        $this->removeAllDocumentTypes();
        foreach ($documentTypes as $documentType) {
            if ($documentType instanceof DocumentType) {
                $this->addDocumentType($documentType);
            }
        }

        return $this;
    }

    /**
     * @return TypeContrat
     */
    public function removeAllDocumentTypes(): TypeContrat
    {
        $this->documentTypes = [];

        return $this;
    }

    /**
     * @param DocumentType $documentType
     * @return TypeContrat
     */
    public function addDocumentType(DocumentType $documentType): TypeContrat
    {
        $this->documentTypes[] = $documentType;

        return $this;
    }

    /**
     * @param DocumentType $documentType
     * @return TypeContrat
     */
    public function removeDocumentType(DocumentType $documentType): TypeContrat
    {
        $key = array_search($documentType, $this->getDocumentTypes(), true);
        if ($key !== false) {
            unset($this->documentTypes[$key]);
        }

        return $this;
    }

    /**
     * @return array<DocumentType>
     */
    public function getDocumentTypes(): array
    {
        return $this->documentTypes;
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
