<?php

namespace DAO;

use Model\AbstractModel;
use Model\TypeContrat;

class TypeContratDAO extends DatabaseDAO
{
    /**
     * @var string
     */
    protected $configFileName = 'type_contrat';

    /**
     * @var string
     */
    protected $tableName = 'type_contrat';

    /**
     * @param array $data
     * @param bool $recursive
     * @return AbstractModel
     */
    protected function buildDomainObject(array $data, bool $recursive = false): AbstractModel
    {
        $typeContrat = new TypeContrat();
        $typeContrat->setId($data['id'])
                    ->setCode($data['code'])
                    ->setNom($data['nom']);

        return $typeContrat;
    }
}