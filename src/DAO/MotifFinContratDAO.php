<?php

namespace DAO;

use Model\AbstractModel;
use Model\MotifFinContrat;

class MotifFinContratDAO extends DatabaseDAO
{
    /**
     * @var string
     */
    protected $configFileName = 'motif_fin_contrat';

    /**
     * @var string
     */
    protected $tableName = 'motif_fin_contrat';

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
        $motifFinContrat = new MotifFinContrat();
        $motifFinContrat->setId($data['id'])
                        ->setCode($data['code'])
                        ->setNom($data['nom']);

         if ($recursive == true) {
            $config = $this->getConfig();
            $id = ['motifFinContrat' => $motifFinContrat->getId()];

            $tableContrats = $config['contrats'];
            $contratDAO = \Model\Contrat::getDAOInstance();
            $listContrats = $contratDAO->findBy($id, $tableContrats['orderBy']);
            $motifFinContrat->setContrats($listContrats);
        }

        return $motifFinContrat;
    }
}