<?php

namespace DAO;

use Model\AbstractModel;
use Model\Contrat;

class ContratDAO extends DatabaseDAO
{
    /**
     * @var string
     */
    protected $configFileName = 'contrat';

    /**
     * @var string
     */
    protected $tableName = 'contrat';

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
        $contrat = new Contrat();
        $contrat->setDateDebut($data['date_debut'])
                ->setDateFin($data['date_fin']);

        if ($recursive) {
            $salarieDAO = \Model\Salarie::getDAOInstance();
            $salarie = $salarieDAO->find($data['id_salarie'], false);
            $contrat->setSalarie($salarie);

            $renseignementPosteDAO = \Model\RenseignementPoste::getDAOInstance();
            $renseignementPoste = $renseignementPosteDAO->find($data['id_renseignement_poste'], false);
            $contrat->setRenseignementsPoste($renseignementPoste);

            $typeContratDAO = \Model\TypeContrat::getDAOInstance();
            $typeContrat = $typeContratDAO->find($data['id_type_contrat'], false);
            $contrat->setTypesContrat($salarie);
        }

        return $contrat;
    }
}