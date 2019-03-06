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
                $this->documents[$document->getId()] = $document;
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
        $this->documents[$document->getId()] = $document;

        return $this;
    }

    /**
     * @param Document $document
     * @return DocumentType
     */
    public function removeDocument(Document $document): DocumentType
    {
        $document = $this->getDocuments();
        if (array_key_exists($document->getId(), $documents)) {
            unset($documents[$document->getId()]);
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

}