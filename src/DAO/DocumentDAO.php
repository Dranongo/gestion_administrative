<?php

namespace DAO;

use Model\AbstractModel;
use Model\Document;

class DocumentDAO extends DatabaseDAO
{
    /**
     * @var string
     */
    protected $configFileName = 'document';

    /**
     * @var string
     */
    protected $tableName = 'document';

    /**
     * @var DatabaseDAO
     */
    protected static $_instance = null;

    /**
     * @param array $data
     * @param bool $recursive
     * @return AbstractModel
     */
    protected function buildDomainObject(array $data, bool $recursive = false): AbstractModel
    {
        $document = new Document();
        $document->setId($data['id'])
                 ->setNom($data['nom']);

        if ($recursive) {
            $salarieDAO = \Model\Salarie::getDAOInstance();
            $salarie = $salarieDAO->find($data['id_salarie'], false);
            $document->setSalarie($salarie);

            $documentTypeDAO = \Model\DocumentType::getDAOInstance();
            $documentType = $documentTypeDAO->find($data['id_type_document'], false);
            $document->setDocumentType($documentType);
        }
        return $document;
    }
}