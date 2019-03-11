<?php

namespace DAO;

use Model\AbstractModel;
use Model\ContactUrgence;

class ContactUrgenceDAO extends DatabaseDAO
{
    /**
     * @var string
     */
    protected $tableName = 'contact_urgence';

    /**
     * @param array $data
     * @param bool $recursive
     * @return AbstractModel
     */
    protected function buildDomainObject(array $data, bool $recursive = false): AbstractModel
    {
        $contactUrgence = new ContactUrgence();
        $contactUrgence->setId($data['id'])
                       ->setNom($data['nom'])
                       ->setPrenom($data['prenom'])
                       ->setLien($data['lien'])
                       ->setTelephone($data['telephone']);

        if ($recursive) {
            $salarieDAO = new SalarieDAO();
            $salarie = $salarieDAO->find($data['id_salarie'], false);
            $contactUrgence->setSalarie($salarie);
        }

        return $contactUrgence;
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
            'lien' => 'lien',
            'telephone' => 'telephone',
            'salarie' => 'id_salarie'
        ];
    }
}