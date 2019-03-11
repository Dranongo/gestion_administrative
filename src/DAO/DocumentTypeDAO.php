<?php

namespace DAO;

use Model\AbstractModel;
use Model\DocumentType;

class DocumentTypeDAO extends DatabaseDAO
{
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

    /**
     * @return array
     */
    protected function modelToDatabaseFields(): array
    {
        return [
            'id' => 'id',
            'code' => 'code',
            'nom' => 'nom',
            'statutEtranger' => 'statut_etranger'
        ];
    }
}