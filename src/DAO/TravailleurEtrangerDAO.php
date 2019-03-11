<?php

namespace DAO;

use Model\AbstractModel;
use Model\TravailleurEtranger;

class TravailleurEtrangerDAO extends DatabaseDAO
{
    /**
     * @var string
     */
    protected $tableName = 'travailleur_etranger';

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
                            ->setDateAutorisationEmbauche(new \DateTime($data['date_autorisation_embauche']))
                            ->setNumeroCarteSejour($data['num_carte_sejour'])
                            ->setDateLimiteValidite(new \DateTime($data['date_limite_validite']));
        if ($recursive) {
            $salarieDAO = new SalarieDAO();
            $salarie = $salarieDAO->find($data['id_salarie'], false);
            $formation->setSalarie($salarie);
        }

        return $travailleurEtranger;
    }

    /**
     * @return array
     */
    protected function modelToDatabaseFields(): array
    {
        return [
            'id' => 'id',
            'autorisationTravail' => 'autorisation_travail',
            'dateAutorisationEmbauche' => 'date_autorisation_embauche',
            'numeroCarteSejour' => 'num_carte_sejour',
            'dateLimiteValidite' => 'date_limite_validite',
            'salarie' => 'id_salarie'
        ];
    }
}