<?php

namespace DAO;

use Model\AbstractModel;
use Model\Salarie;

class SalarieDAO extends DatabaseDAO
{
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
                ->setMailPro($data['mail_professionnel'])
                ->setMailPerso($data['mail_personnel'])
                ->setNumSecu($data['num_secu'])
                ->setRemuneration($data['remuneration'])
                ->setEnPoste($data['salarie_en_poste'])
                ->setSituationFamiliale($data['situation_familiale'])
                ->setLangues($data['langues_etrangeres'])
                ->setAutreActivite($data['autre_activite'])
                ->setDetailActivite($data['details_autre_activite'])
                ->setAutorisationTravailMineur($data['autorisation_travail_mineur'])
                ->setStatutHandicap($data['statut_handicap'])
                ->setTauxInvalidite($data['taux_invalidite']);

        return $salarie;
    }

    /**
     * @return array
     */
    protected function modelToDatabaseFields(): array
    {
        return [
            'id' => 'id',
            'qualite' => 'qualite',
            'nom' => 'nom',
            'prenom' => 'prenom',
            'nomJeuneFille' => 'nom_jeune_fille',
            'nationalite' => 'nationalite',
            'dateNaissance' => 'date_naissance',
            'adresse' => 'adresse',
            'codePostal' => 'code_postal',
            'ville' => 'ville',
            'telephone' => 'telephone',
            'mailProfessionnel' => 'mail_professionnel',
            'mailPersonnel' => 'mail_personnel',
            'numSecu' => 'num_secu',
            'remuneration' => 'remuneration',
            'enPoste' => 'salarie_en_poste',
            'situationFamiliale' => 'situation_familiale',
            'langues' => 'langues_etrangeres',
            'autreActivite' => 'autre_activite',
            'detailActivite' => 'details_autre_activite',
            'autorisationTravailMineur' => 'autorisation_travail_mineur',
            'statutHandicap' => 'statut_handicap',
            'tauxInvalidite' => 'taux_invalidite'
        ];
    }
}