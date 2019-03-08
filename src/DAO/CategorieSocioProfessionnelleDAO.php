<?php

namespace DAO;

use Model\AbstractModel;
use Model\CategorieSocioProfessionnelle;

class CategorieSocioProfessionnelleDAO extends DatabaseDAO
{
    /**
     * @var string
     */
    protected $tableName = 'categorie_socio_professionnelle';

    /**
     * @param array $data
     * @param bool $recursive
     * @return AbstractModel
     */
    protected function buildDomainObject(array $data, bool $recursive = false): AbstractModel
    {
        $categorieSocioProfessionnelle = new CategorieSocioProfessionnelle();
        $categorieSocioProfessionnelle->setId($data['id'])
                                      ->setCode($data['code'])
                                      ->setNom($data['nom']);

        return $categorieSocioProfessionnelle;
    }

    /**
     * @return array
     */
    protected function modelToDatabaseFields(): array
    {
        return [
            'id' => 'id',
            'code' => 'code',
            'nom' => 'nom',
        ];
    }
}