<?php

namespace DAO;

use Model\AbstractModel;
use Model\TravailleurEtranger;
use Utils\DateHelper;

class TravailleurEtrangerDAO extends DatabaseDAO
{
    /**
     * @var string
     */
    protected $configFileName = 'travailleur_etranger';

    /**
     * @var string
     */
    protected $tableName = 'travailleur_etranger';

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
        $travailleurEtranger = new TravailleurEtranger();
        $travailleurEtranger->setId($data['id'])
                            ->setAutorisationTravail($data['autorisation_travail'])
                            ->setDateAutorisationEmbauche(DateHelper::convertDatabaseDateToDateTime($data['date_autorisation_embauche']))
                            ->setNumeroCarteSejour($data['num_carte_sejour'])
                            ->setDateLimiteValidite(DateHelper::convertDatabaseDateToDateTime($data['date_limite_validite']));
        if ($recursive) {
            $salarieDAO = \Model\Salarie::getDAOInstance();
            $salarie = $salarieDAO->find($data['id_salarie'], false);
            $travailleurEtranger->setSalarie($salarie);
        }

        return $travailleurEtranger;
    }
}