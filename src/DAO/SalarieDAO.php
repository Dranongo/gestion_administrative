<?php

namespace DAO;

use Model\AbstractModel;
use Model\Salarie;

class SalarieDAO extends DatabaseDAO
{
    /**
     * @var string
     */
    protected $configFileName = 'salarie';

    /**
     * @var string
     */
    protected $tableName = 'salarie';

    /**
     * @param array $data
     * @param bool $recursive
     * @return AbstractModel
     */
    protected function buildDomainObject(array $data, bool $recursive = false): AbstractModel
    {
        $salarie = new Salarie();
        $salarie->setId($data['id'])
                ->setQualite($data['qualite'])
                ->setNom($data['nom'])
                ->setPrenom($data['prenom'])
                ->setNomJeuneFille($data['nom_jeune_fille'])
                ->setNationalite($data['nationalite'])
                ->setDateNaissance(new \DateTime($data['date_naissance']))
                ->setLieuNaissance($data['lieu_naissance'])
                ->setAdresse($data['adresse'])
                ->setCodePostal($data['code_postal'])
                ->setVille($data['ville'])
                ->setTelephone($data['telephone'])
                ->setMailProfessionnel($data['mail_professionnel'])
                ->setMailPersonnel($data['mail_personnel'])
                ->setNumeroSecuriteSociale($data['numero_securite_sociale'])
                ->setRemuneration($data['remuneration'])
                ->setEnPoste($data['en_poste'])
                ->setSituationFamiliale($data['situation_familiale'])
                ->setLangues($data['langues_etrangeres'])
                ->setAutreActivite($data['autre_activite'])
                ->setDetailActivite($data['details_autre_activite'])
                ->setAutorisationTravailMineur($data['autorisation_travail_mineur'])
                ->setStatutHandicap($data['statut_handicap'])
                ->setTauxInvalidite($data['taux_invalidite']);

        return $salarie;
    }
}