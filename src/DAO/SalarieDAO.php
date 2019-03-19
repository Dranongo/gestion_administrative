<?php

namespace DAO;

use Model\AbstractModel;
use Model\CategorieSocioProfessionnelle;
use Model\Formation;
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
            $formationDAO = Formation::getDAOInstance();
            $listFormations = $formationDAO->findBy($id, $tableFormations['orderBy']);
            $salarie->setFormations($listFormations);            

            $tableEnfants = $config['enfants'];
            $enfantDAO = \Model\Enfant::getDAOInstance();
            $listEnfants = $enfantDAO->findBy($id, $tableEnfants['orderBy']);
            $salarie->setEnfants($listEnfants);          

            $tableContrats = $config['contrats'];
            $contratDAO = \Model\Contrat::getDAOInstance();
            $listContrats = $contratDAO->findBy($id, $tableContrats['orderBy']);
            $salarie->setContrats($listContrats);

            $tableContactsUrgence = $config['contactsUrgence'];
            $contactsUrgenceDAO = \Model\ContactUrgence::getDAOInstance();
            $listContactsUrgence = $contactsUrgenceDAO->findBy($id, []);
            $salarie->setContactsUrgence($listContactsUrgence);

            $tableDocument = $config['documents'];
            $documentDAO = \Model\Document::getDAOInstance();
            $listDocuments = $documentDAO->findBy($id, []);
            $salarie->setDocuments($listDocuments);

            foreach ($this->getManyToManyRelationFromObject($salarie, 'categoriesSocioProfessionnelles') as $data) {
                /** @var CategorieSocioProfessionnelle $categorieSocioProfessionnelle */
                $categorieSocioProfessionnelle = CategorieSocioProfessionnelleDAO::getInstance()->find($data['id_categorie_socio_professionnelle'], false);
                $categorieSocioProfessionnelle->setDateDebutSalarie(new \DateTime($data['date_debut']))
                    ->setDateFinSalarie(new \DateTime($data['date_debut']));
                $salarie->addCategorieSocioProfessionnelle($categorieSocioProfessionnelle);
            }
        }

        return $salarie;
    }
}