<?php

namespace Controller;

use Model\User;
use Model\Salarie;
use Model\Formation;
use DAO\SalarieDAO;
use DAO\EnfantDAO;
use DAO\FormationDAO;
use DAO\ContratDAO;
use DAO\DocumentDAO;
use DAO\ContactUrgenceDAO;
use DAO\CategorieSocioProfessionnelleDAO;
use DAO\TypeContratDAO;
use DAO\DocumentTypeDAO;
use DAO\RenseignementPosteDAO;
use DAO\MotifFinContratDAO;
use Service\Router;
use Service\Request;
use Service\Template;
use Utils\DateHelper;
use Utils\NumberHelper;
use Utils\StringHelper;

class SalarieController extends AbstractController
{
    /**
     *
     */
    public function listAction()
    {
        return [
            'title' => 'Affichage de la fiche de renseignements du salarié',
            'error' => 'An error has occured destroying the session'
        ];
    }

    /**
     * Collect the form's data to create an employee
     */
    public function createAction()
    {
        $request = $this->getRequest();

        $formSalarie = $request->getRequest('salarie_form');
        $formSalarie['enfants'] = $request->getRequest('enfant_form');
        $formSalarie['contacts'] = $request->getRequest('contact_urgence_form');
        $formSalarie['documents'] = $request->getRequest('document_form');
        $formSalarie['formations'] = $request->getRequest('formation_form');
        $formSalarie['contrat'] = $request->getRequest('contrat_form');
        $formSalarie['categorieSocioProfessionnelle'] = $request->getRequest('categorie_socio_professionnelle_form');
        $formSalarie['travailleurEtranger'] = $request->getRequest('travailleur_etranger_form');

        $salarie = new Salarie();
        $formation = new Formation();

        $salarieDAO = SalarieDAO::getInstance();
        $enfantDAO = EnfantDAO::getInstance();
        $formationDAO = FormationDAO::getInstance();
        $contratDAO = ContratDAO::getInstance();
        $documentDAO = DocumentDAO::getInstance();
        $contactUrgenceDAO = ContactUrgenceDAO::getInstance();

        $categories = CategorieSocioProfessionnelleDAO::getInstance()->findAll();
        $typesContrat = TypeContratDAO::getInstance()->findAll();
        $typesDocument = DocumentTypeDAO::getInstance()->findAll();
        $renseignementsPoste = RenseignementPosteDAO::getInstance()->findAll();
        $motifsFinContrat = MotifFinContratDAO::getInstance()->findAll();

        $formErrors = [];
        $successMessage = $errorMessage = '';
        $jsFiles = [
            '/js/createRowTable.js',
            '/js/generateName.js'
        ];

        if ($request->isPost()) {
            if ($this->isFormValid($formSalarie, $formErrors)) {
                $salarie = $salarieDAO->hydrate($formSalarie);
                
                if($salarieDAO->save($salarie)){
                    $idSalarie = $salarieDAO->getLastInsertId();
                    $enfantDAO->saveAll($formSalarie['enfants'], $idSalarie);
                    $formationDAO->saveAll($formSalarie['formations'], $idSalarie);
                    $documentDAO->saveAll($formSalarie['documents'], $idSalarie);
                    $contactUrgenceDAO->saveAll($formSalarie['contacts'], $idSalarie);

                    //$contratDAO->saveAll($formSalarie['contrat'], $idSalarie);
                }
            }
        }
        return [
            'title' => 'Creation d\'une fiche de renseignements à l\'embauche',
            'formSalarie' => $formSalarie,
            'formErrors' => $formErrors,
            'salarie' => $salarie,
            'formation' => $formation,
            'categories' => $categories,
            'typesContrat' => $typesContrat,
            'typesDocument' => $typesDocument,
            'renseignementsPoste' => $renseignementsPoste,
            'motifsFinContrat' => $motifsFinContrat,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'jsFiles' => $jsFiles
        ];
    }

    /**
     * @param array $form
     * @param array $formErrors
     * @return bool
     */
    protected function isFormValid(array $form, array &$formErrors): bool
    {
        $this->checkFormSalarie($form, $formErrors);
        return count($formErrors) === 0;
    }

    /**
     * @param array $form
     * @param array $formErrors
     * @return void
     */
    protected function checkFormSalarie(array $form, array &$formErrors)
    {
        $radioFields = [ 
            'qualite',
            'en_poste',
            'autre_activite',
            'autorisation_travail_mineur',
            'statut_handicap'
        ];

        $this->checkRadioField($form, $formErrors, $radioFields);

        foreach ($form as $key => $value) {
            if (is_array($value)) {
                if ($key == 'enfants') {
                    $this->checkFormEnfant($value, $formErrors);
                } elseif ($key == 'formations') {
                    $this->checkFormFormation($value, $formErrors);
                } elseif ($key == 'contacts') {
                    $this->checkFormContactUrgence($value, $formErrors);
                } elseif ($key == 'documents') {
                    $this->checkFormDocument($value, $formErrors);
                } elseif ($key == 'contrat') {
                    $this->checkFormContrat($value, $formErrors);
                } elseif ($key == 'categorieSocioProfessionnelle') {
                    $this->checkFormCategorieSocioProfessionnelle($value, $formErrors);
                } elseif ($key == 'travailleurEtranger') {
                    $this->checkFormTravailleurEtranger($value, $formErrors);
                }
                continue;
            } elseif (trim($value) == "") {
                if ($key == 'nom_jeune_fille' && array_key_exists('qualite', $form) && $form['qualite'] == 'Monsieur') {
                    continue;
                }
                if ($key == 'details_autre_activite' && 
                    (! array_key_exists('autre_activite', $form) || $form['autre_activite'] == '0')) {
                    continue;
                }
                if ($key == 'taux_invalidite' && 
                    (! array_key_exists('statut_handicap', $form) || $form['statut_handicap'] == '0')) {
                    continue;
                }
                if ($key == 'enfants' || $key == 'formations' || $key == 'documents') {
                    continue;
                }
                $formErrors[$key] = 'Le champ est obligatoire ';
            } elseif ($key == 'telephone' && !NumberHelper::checkPhoneNumber($value)) {
                $formErrors[$key] = 'Le numéro de téléphone est incorrect ';
            } elseif ($key == 'code_postal' && !NumberHelper::checkPostalCode($value)) {
                $formErrors[$key] = 'Le code postal est incorrect';
            } elseif ($key == 'remuneration' && !NumberHelper::checkSalary($value)) {
                $formErros[$key] = 'Le salaire est invalide';
            } elseif ($key == 'numero_securite_sociale' && !NumberHelper::checkSocialSecurityNumber($value)) {
                $formErrors[$key] = 'Le numéro de sécurite sociale est incorrect';
            } elseif ($key == 'mail_professionnel' || $key == 'mail_personnel' && !StringHelper::isEmailValid($value)) {
                $formErros[$key] = 'L\'email est incorrect';
            }
        }
    }

    /**
     * @param array $form
     * @param array $formErrors
     * @param array $radioFields
     * @return void
     */
    protected function checkRadioField(array $form, array &$formErrors, array $radioFields)
    {
        foreach ($radioFields as $radioField) {
            if (! array_key_exists($radioField, $form)) {
                $formErrors[$radioField] = 'Veuillez sélectionner une réponse';
            }
        }
    }

    /**
     * @param array $form
     * @param array $formErrors
     * @return void
     */
    protected function checkFormTravailleurEtranger(array $form, array &$formErrors)
    {
        if (!NumberHelper::checkResidencePermitNumber($form['num_carte_sejour'])) {
            $formErros['travailleurEtranger']['num_carte_sejour'] = 'Le numéro de carte de séjour est incorrect';
        }
        if (DateHelper::isDateBefore(
            DateHelper::convertDatabaseDateToDateTime($form['date_limite_validite']), 
            DateHelper::convertDatabaseDateToDateTime($form['date_autorisation_embauche']))) {
            $formErrors['travailleurEtranger']['date_limite_validite'] = ' La date limite doit être supérieure à celle du début';
            $formErrors['travailleurEtranger']['date_autorisation_embauche'] = 'La date de début doit être inférieure à la limite';
        }
    }

    /**
     * @param array $form
     * @param array $formErrors
     * @return void
     */
    protected function checkFormContrat(array $form, array &$formErrors)
    {
        foreach ($form as $key => $value) {
            if (trim($value) == "") {
                if ($key == 'date_fin') {
                    continue;
                }
                if ($key == 'id_motif_fin_contrat' && 
                (! array_key_exists('date_fin', $form) || $form['date_fin'] == '')) {
                    continue;
                }
                $formErrors['contrat'][$key] = ' Le champ est obligatoire  ';
            } elseif (DateHelper::isDateBefore(
                    DateHelper::convertDatabaseDateToDateTime($form['date_fin']), 
                    DateHelper::convertDatabaseDateToDateTime($form['date_debut']))) {
                $formErrors['contrat']['date_fin'] = ' La date de fin de contrat doit être supérieure à celle du début';
                $formErrors['contrat']['date_debut'] = 'La date de début de contrat doit être inférieure à celle de fin';
            }
        }
    }

    /**
     * @param array $form
     * @param array $formErrors
     * @return void
     */
    protected function checkFormEnfant(array $form, array &$formErrors)
    {
        foreach ($form as $key => $enfant) {
            foreach ($enfant as $paramEnfant => $value) {
                if (trim($value) == "") {
                    $formErrors['enfants'][$key][$paramEnfant] = ' Le champ est obligatoire  ';
                }
            }
        }
    }

    /**
     * @param array $form
     * @param array $formErrors
     * @return void
     */
    protected function checkFormFormation(array $form, array &$formErrors)
    {
        foreach ($form as $key => $formation) {
            foreach ($formation as $paramFormation => $value) {
                if (trim($value) == "") {
                    $formErrors['formations'][$key][$paramFormation] = ' Le champ est obligatoire  ';
                }
            }
        }
    }

    /**
     * @param array $form
     * @param array $formErrors
     * @return void
     */
    protected function checkFormContactUrgence(array $form, array &$formErrors)
    {
        foreach ($form as $key => $contact) {
            if ($key == 0) {
                foreach ($contact as $paramContact => $value) {
                    if (trim($value) == "") {
                        $formErrors['contacts'][$key][$paramContact] = ' Le champ est obligatoire ';
                    }elseif ($paramContact == 'telephone' && !NumberHelper::checkPhoneNumber($value)) {
                        $formErrors['contacts'][$key][$paramContact] = 'Le numéro de téléphone est incorrect ';
                    }
                }                
            }
        }
    }

    /**
     * @param array $form
     * @param array $formErrors
     * @return void
     */
    protected function checkFormDocument(array $form, array &$formErrors)
    {
        foreach ($form as $key => $document) {
            if ($document['document'] != null) {
                if($document['type_document'] == '') {
                    $formErrors['document']['typeDocument'] = 'Le type de document doit être renseigné';                    
                }
            }
        }
    }

    /**
     * @param array $form
     * @param array $formErrors
     * @return void
     */
    protected function checkFormCategorieSocioProfessionnelle(array $form, array &$formErrors)
    {
        foreach ($form as $key => $value) {
            if (trim($value) == "") {
                $formErrors['categorieSocioProfessionnelle'][$key] = ' Le champ est obligatoire  ';
            } elseif (DateHelper::isDateBefore(
                DateHelper::convertDatabaseDateToDateTime($form['date_fin']), 
                DateHelper::convertDatabaseDateToDateTime($form['date_debut']))) {
                $formErrors['categorieSocioProfessionnelle']['date_fin'] = ' La date de fin du statut doit être supérieure à celle du début';
                $formErrors['categorieSocioProfessionnelle']['date_debut'] = 'La date de début du statut doit être inférieure à celle de fin';
            }
        }
    }
}