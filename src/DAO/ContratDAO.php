<?php

namespace DAO;

use Model\AbstractModel;
use Model\Contrat;

class ContratDAO extends DatabaseDAO
{
    /**
     * @var string
     */
    protected $configFileName = 'contrat';

    /**
     * @var string
     */
    protected $tableName = 'contrat';

    /**
     * @param array $data
     * @param bool $recursive
     * @return AbstractModel
     */
    protected function buildDomainObject(array $data, bool $recursive = false): AbstractModel
    {
        $contrat = new Contrat();
        $contrat->setDateDebut($data['date_debut'])
                ->setDateFin($data['date_fin']);

        if ($recursive) {
            
        }

        return $contrat;
    }
}