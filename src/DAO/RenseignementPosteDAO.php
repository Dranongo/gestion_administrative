<?php

namespace DAO;

use Model\AbstractModel;
use Model\RenseignementPoste;

class RenseignementPosteDAO extends DatabaseDAO
{
    /**
     * @var string
     */
    protected $configFileName = 'renseignement_poste';

    /**
     * @var string
     */
    protected $tableName = 'renseignement_poste';

    /**
     * @param array $data
     * @param bool $recursive
     * @return AbstractModel
     */
    protected function buildDomainObject(array $data, bool $recursive = false): AbstractModel
    {
        $renseignementPoste = new RenseignementPoste();
        $renseignementPoste->setId($data['id'])
                           ->setCode($data['code'])
                           ->setNom($data['nom']);

        return $renseignementPoste;
    }
}