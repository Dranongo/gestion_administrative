<?php

namespace DAO;

use Model\AbstractModel;
use Model\Formation;

class FormationDAO extends DatabaseDAO
{
    /**
     * 
     */
    protected $configFileName = 'formation';

    /**
     * @var string
     */
    protected $tableName = 'formation';

    /**
     * @param array $data
     * @param bool $recursive
     * @return AbstractModel
     */
    protected function buildDomainObject(array $data, bool $recursive = false): AbstractModel
    {
        $formation = new Formation();
        $formation->setId($data['id'])
                  ->setNom($data['nom'])
                  ->setNiveau($data['niveau'])
                  ->setOrganisme($data['organisme'])
                  ->setLieu($data['lieu'])
                  ->setDateDebut(new \DateTime($data['date_debut']))
                  ->setDateFin(new \DateTime($data['date_fin']))
                  ->setObtenu($data['obtenu']);

        if ($recursive) {
          
        }

        return $formation;
    }
}