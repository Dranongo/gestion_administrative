<?php

namespace DAO;

use Model\AbstractModel;
use Model\Enfant;

class EnfantDAO extends DatabaseDAO
{
    /**
     * @var string
     */
    protected $tableName = 'enfant';

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
            $salarieDAO = new SalarieDAO();
            $salarie = $salarieDAO->find($data['id_salarie'], false);
            $formation->setSalarie($salarie);
        }

        return $enfant;
    }

    /**
     * @return array
     */
    protected function modelToDatabaseFields(): array
    {
        return [
            'id' => 'id',
            'nom' => 'nom',
            'prenom' => 'prenom',
            'dateNaissance' => 'date_naissance',
            'salarie' => 'id_salarie'
        ];
    }
}