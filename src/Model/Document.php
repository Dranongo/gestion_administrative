<?php

namespace Model;

class Document extends AbstractModel
{
    /**
     * @var string
     */
    protected static $DAOClassName = 'DocumentDAO';

    /**
     * @var string
     */
    protected $nom;

    /**
     * @var DocumentType
     */
    protected $documentType;

    /**
     * @var Salarie
     */
    protected $salarie;

    /**
     * @param string $nom
     * @return Document
     */
    public function setNom(string $nom): Document
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param DocumentType $documentType
     * @return Document
     */
    public function setDocumentType(DocumentType $documentType): Document
    {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * @return DocumentType
     */
    public function getDocumentType(): ?DocumentType
    {
        return $this->documentType;
    }

    /**
     * @param Salarie $salarie
     * @return Document
     */
    public function setSalarie(Salarie $salarie): Document
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

    /**
     * @return Document
     */
    public function generateNom(): Document
    {
        $this->nom = $this->getDocumentType()->getUniqueCode() . '_' . time() . '_' . $this->getId() . '.' . $this->getExtension();

        return $this;
    }

    /**
     * @return string
     */
    public function getDirectoryPath(): string
    {
        return __ATTACHMENT_DIR__ . $this->getSalarie()->getId() . DIRECTORY_SEPARATOR;
    }

    /**
     * @return string 
     */
    public function getFilePath(): string
    {
        return $this->getDirectoryPath() . $this->nom;
    }
}