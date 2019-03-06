<?php

namespace Model;

class Document extends AbstractModel
{
    /**
     * @var string
     */
    protected $nom;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var DocumentType
     */
    protected $documentType;

    /**
     * @var Salarie
     */
    protected $salarie;

    /**
     * @var string
     */
    protected $extension;

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
     * @param string $content
     * @return Document
     */
    public function setContent(string $content): Document
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $extension
     * @return Document
     */
    public function setExtension(string $extension): Document
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * @return string
     */
    public function getExtension(): ?string
    {
        return $this->extension;
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
        $this->nom = $this->getDocumentType()->getUniqueCode(). '_' .time(). '_' .$this->getId(). '.' .$this->getExtension();

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