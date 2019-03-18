<?php

namespace DAO;

use Model\AbstractModel;
use Model\MotifFinContrat;

class MotifFinContratDAO extends DatabaseDAO
{
    /**
     * @var string
     */
    protected $configFileName = 'motif_fin_contrat';

    /**
     * @var string
     */
    protected $tableName = 'motif_fin_contrat';

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
        $motifFinContrat = new RenseignementPoste();
        $motifFinContrat->setId($data['id'])
                        ->setCode($data['code'])
                        ->setNom($data['nom']);

        return $motif_fin_contrat;
    }
}