<?php

namespace DAO;

use Model\AbstractModel;
use Model\DocumentType;

class DocumentTypeDAO extends DatabaseDAO
{
    /**
     * @var string
     */
    protected $configFileName = 'type_document';

    /**
     * @var string
     */
    protected $tableName = 'type_document';

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
        $documentType = new DocumentType();
        $documentType->setId($data['id'])
                           ->setCode($data['code'])
                           ->setNom($data['nom'])
                           ->setStatutEtranger($data['statut_etranger']);

        if ($recursive = true) {
            $config = $this->getConfig();
            $id = ['documentType' => $documentType->getId()];
            
            $tableDocument = $config['documents'];
            $documentDAO = \Model\Document::getDAOInstance();
            $listDocuments = $documentDAO->findBy($id, []);
            $documentType->setDocuments($listDocuments);
        }

        return $documentType;
    }
}