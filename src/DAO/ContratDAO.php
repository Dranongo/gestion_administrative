<?php

namespace DAO;

use Model\AbstractModel;
use Model\Contrat;

class ContratDAO extends DatabaseDAO
{
    /**
     * @var string
     */
    protected $tableName = 'contrat';

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
            $salarieDAO = new SalarieDAO();
            $salarie = $salarieDAO->find($data['id_salarie'], false);
            $contrat->setSalarie($salarie);

            $renseignementPosteDAO = new RenseignementPosteDAO();
            $renseignementPoste = $renseignementPosteDAO->find($data['id_renseignement_poste'], false);
            $contrat->setRenseignementPoste($renseignementPoste);

            $typeContratDAO = new TypeContratDAO();
            $typeContrat = $typeContratDAO->find($data['id_type_contrat'], false);
            $contrat->setTypeContrat($typeContrat);
        }

        return $contrat;
    }
}