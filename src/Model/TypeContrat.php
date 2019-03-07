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
    protected $documentTypes;

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
                $this->documentTypes[$documentType->getId()] = $documentType;
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
        $this->documentTypes[$documentType->getId()] = $documentType;

        return $this;
    }

    /**
     * @param DocumentType $documentType
     * @return TypeContrat
     */
    public function removeDocumentType(DocumentType $documentType): TypeContrat
    {
        $documentType = $this->getDocumentTypes();
        if (array_key_exists($documentType->getId(), $documentTypes)) {
            unset($documentTypes[$documentType->getId()]);
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
}
