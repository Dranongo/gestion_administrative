<?php

namespace DAO;

use Model\AbstractModel;
use Model\Contrat;
use Utils\DateHelper;

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
        if (array_key_exists('id', $data) && $data['id'] != null) {
            $contrat->setId($data['id']);
        }
        $contrat->setDateDebut(DateHelper::convertDatabaseDateToDateTime($data['date_debut']));

        if ($data['date_fin'] != null) {
            $contrat->setDateFin(DateHelper::convertDatabaseDateToDateTime($data['date_fin']));
        }

        if ($recursive) {
            $salarieDAO = \Model\Salarie::getDAOInstance();
            $salarie = $salarieDAO->find($data['id_salarie'], false);
            $contrat->setSalarie($salarie);

            $renseignementPosteDAO = \Model\RenseignementPoste::getDAOInstance();
            $renseignementPoste = $renseignementPosteDAO->find($data['id_renseignement_poste'], false);
            $contrat->setRenseignementPoste($renseignementPoste);

            $typeContratDAO = \Model\TypeContrat::getDAOInstance();
            $typeContrat = $typeContratDAO->find($data['id_type_contrat'], false);
            $contrat->setTypeContrat($typeContrat);

            if ($data['id_motif_fin_contrat'] != null) {
                $motifFinContratDAO = \Model\MotifFinContrat::getDAOInstance();
                $motifFinContrat = $motifFinContratDAO->find($data['id_motif_fin_contrat'], false);
                $contrat->setMotifFinContrat($motifFinContrat);
            }
        }

        return $contrat;
    }
}