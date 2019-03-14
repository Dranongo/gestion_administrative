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

        return $documentType;
    }
}