<?php

namespace DAO;

use Model\AbstractModel;
use Model\Enfant;

class EnfantDAO extends DatabaseDAO
{

    /**
     * @var string
     */
    protected $configFileName = 'enfant';

    /**
     * @var string
     */
    protected $tableName = 'enfant';

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
        $enfant = new Enfant();
        $enfant->setId($data['id'])
               ->setNom($data['nom'])
               ->setPrenom($data['prenom'])
               ->setDateNaissance(new \DateTime($data['date_naissance']));

        if ($recursive) {
            $salarieDAO = \Model\Salarie::getDAOInstance();
            $salarie = $salarieDAO->find($data['id_salarie'], false);
            $enfant->setSalarie($salarie);
        }

        return $enfant;
    }
}