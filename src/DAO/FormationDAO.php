<?php

namespace DAO;

use Model\AbstractModel;
use Model\Formation;

class FormationDAO extends DatabaseDAO
{
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
            $salarieDAO = new SalarieDAO();
            $salarie = $salarieDAO->find($data['id_salarie'], false);
            $formation->setSalarie($salarie);
        }

        return $formation;
    }

    /**
     * @return array
     */
    protected function modelToDatabaseFields(): array
    {
        return [
            'id' => 'id',
            'nom' => 'nom',
            'niveau' => 'formation',
            'organisme' => 'organisme',
            'lieu' => 'lieu',
            'dateDebut' => 'date_debut',
            'dateFin' => 'date_fin',
            'obtenu' => 'obtenu',
            'idSalarie' => 'id_salarie'
        ];
    }
}