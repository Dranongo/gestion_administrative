<?php

namespace Model;

class DocumentType extends AbstractModel
{
    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $uniqueCode;

    /**
     * @var bool
     */
    protected $statutEtranger;

    /**
     * @var array<Document>
     */
    protected $documents = [];

    /**
     * @var array<TypeContrat>
     */
    protected $typesContrat = [];    

    /**
     * @param string $label
     * @return DocumentType
     */
    public function setLabel(string $label): DocumentType
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $uniqueCode
     * @return DocumentType
     */
    public function setUniqueCode(string $uniqueCode): DocumentType
    {   
        $this->uniqueCode = $uniqueCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getUniqueCode() : string
    {
        return $this->uniqueCode;
    }

    /**
     * @param bool $statutEtranger
     * @return DocumentType
     */
    public function setStatutEtranger(bool $statutEtranger): DocumentType
    {
        $this->statutEtranger = $statutEtranger;

        return $this;
    }

    /**
     * @return bool
     */
    public function getStatutEtranger(): bool
    {
        return $this->statutEtranger;
    }

    /**
     * @param array $documents
     * @return DocumentType
     */
    public function setDocuments(array $documents): DocumentType
    {
        $this->removeAllDocuments();
        foreach ($documents as $document) {
            if ($document instanceof Document) {
                $this->addDocument($document);
            }
        }

        return $this;
    }

    /**
     * @return DocumentType
     */
    public function removeAllDocuments(): DocumentType
    {
        $this->documents = [];

        return $this;
    }

    /**
     * @param Document $document
     * @return DocumentType
     */
    public function addDocument(Document $document): DocumentType
    {
        $this->documents[] = $document;

        return $this;
    }

    /**
     * @param Document $document
     * @return DocumentType
     */
    public function removeDocument(Document $document): DocumentType
    {
        $key = array_search($document, this->getDocuments(), true);
        if ($key !== false) {
            unset($this->documents[$key]);
        }

        return $this;
    }

    /**
     * @return array<Document>
     */
    public function getDocuments(): array
    {
        return $this->documents;
    }

    /**
     * @param array $typesContrat
     * @return DocumentType
     */
    public function setTypesContrat(array $typesContrat): DocumentType
    {
        $this->removeAllTypesContrat();
        foreach ($typesContrat as $typeContrat) {
            if ($typeContrat instanceof TypeContrat) {
                $this->addTypeContrat($typeContrat);
            }
        }

        return $this;
    }

    /**
     * @return DocumentType
     */
    public function removeAllTypesContrat(): DocumentType
    {
        $this->typesContrat = [];

        return $this;
    }

    /**
     * @param TypeContrat $typeContrat
     * @return DocumentType
     */
    public function addTypeContrat(TypeContrat $typeContrat): DocumentType
    {
        $this->typesContrat[] = $typeContrat;

        return $this;
    }

    /**
     * @param TypeContrat $typeContrat
     * @return DocumentType
     */
    public function removeTypeContrat(TypeContrat $typeContrat): DocumentType
    {
        $key = array_search($typeContrat, this->getTypesContrat(), true);
        if ($key !== false) {
            unset($this->typesContrat[$key]);
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
}