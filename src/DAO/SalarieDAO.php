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

        if ($recursive == true) {
            $config = $this->getConfig();
            $id = ['salarie' => $salarie->getId()];
            
            $tableFormations = $config['formations'];
            $formationDAO = \Model\Formation::getDAOInstance();
            $listFormations = $formationDAO->findBy($id, $tableFormations['orderBy']);
            $salarie->setFormations($listFormations);            

            $tableContactsUrgence = $config['contactsUrgence'];
            $contactsUrgenceDAO = \Model\ContactUrgence::getDAOInstance();
            $listContactsUrgence = $contactsUrgenceDAO->findBy($id, []);
            $salarie->setContactsUrgence($listContactsUrgence);

            $tableDocument = $config['documents'];
            $documentDAO = \Model\Document::getDAOInstance();
            $listDocuments = $documentDAO->findBy($id, []);
            $salarie->setDocuments($listDocuments);

            /*$tableCategorieSocioProfessionnelle = $config['categoriesSocioProfessionnelles'];
            $categoriesSocioProfessionnelleDAO = \Model\CategorieSocioProfessionnelle::getDAOInstance();
            $listCategorieSocioProfessionnelle = $categoriesSocioProfessionnelleDAO->findBy($id, []);
            $salarie->setCategoriesSocioProfessionnelles($listCategorieSocioProfessionnelle); */
        }

        return $salarie;
    }
}