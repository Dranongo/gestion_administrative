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
        $renseignementPoste = new RenseignementPoste();
        $renseignementPoste->setId($data['id'])
                           ->setCode($data['code'])
                           ->setNom($data['nom']);

        if ($recursive == true) {
            $config = $this->getConfig();
            $id = ['renseignementsPoste' => $renseignementPoste->getId()];

            $tableContrats = $config['contrats'];
            $contratDAO = \Model\Contrat::getDAOInstance();
            $listContrats = $contratDAO->findBy($id, $tableContrats['orderBy']);
            $renseignementPoste->setContrats($listContrats);
        }

        return $renseignementPoste;
    }
}