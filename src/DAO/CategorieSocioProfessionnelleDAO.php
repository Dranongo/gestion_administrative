<?php

namespace DAO;

use Model\AbstractModel;
use Model\CategorieSocioProfessionnelle;

class CategorieSocioProfessionnelleDAO extends DatabaseDAO
{
    /**
     * @var string
     */
    protected $configFileName = 'categorie_socio_professionnelle';

    /**
     * @var string
     */
    protected $tableName = 'categorie_socio_professionnelle';

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
        $categorieSocioProfessionnelle = new CategorieSocioProfessionnelle();
        $categorieSocioProfessionnelle->setId($data['id'])
                                      ->setCode($data['code'])
                                      ->setNom($data['nom']);

        if ($recursive) {
            /** @var Salarie $salarie */
            foreach ($this->getManyToManyRelationFromObject($categorieSocioProfessionnelle, 'salaries') as $salarie) {
                $categorieSocioProfessionnelle->setSalarie($salarie);
            }
        }
        
        return $categorieSocioProfessionnelle;
    }
}