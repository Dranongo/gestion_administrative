<?php

namespace Controller;

use Model\User;
use Model\Salarie;
use Model\Formation;
use DAO\SalarieDAO;
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

        $salarie = new Salarie();
        $formation = new Formation();

        $salarieDAO = SalarieDAO::getInstance();
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
            var_dump('<pre>');
            var_dump($formSalarie);
            if ($this->isFormValid($formSalarie, $formErrors)) {
                
                $salarie = $salarieDAO->hydrate($formSalarie);
                //$salarieDAO->save($salarie);

                //$this->saveData(\DAO\ContratDAO::getInstance(), $this->formContrat, $salarie);
                //$this->saveData(\DAO\EnfantDAO::getInstance(), $this->formEnfant, $salarie);
                //$this->saveData(\DAO\ContactUrgenceDAO::getInstance(), $this->formContactUrgence, $salarie);
                //$this->saveData(\DAO\FormationDAO::getInstance(), $this->formFormation, $salarie);
                //$this->saveData(\DAO\DocumentDAO::getInstance(), $this->formDocument, $salarie);
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
     * Save data into database in relation with the employee previously created
     *
     * @param \DAO\DatabaseDAO $modelDAO
     * @param array $form
     * @param Salarie $salarie
     * @return void
     */
    protected function saveData(\DAO\DatabaseDAO $modelDAO, array $form, Salarie $salarie)
    {
        $model = $modelDAO->hydrate($form);
        $model->setSalarie($salarie);
        $modelDAO->save($model);
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
            if (trim($value) == "") {
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
                $formErrors[$key] = 'Le champ est obligatoire ';
            } elseif ($key == 'telephone' && !NumberHelper::checkPhoneNumber($value)) {
                $formErrors[$key] = 'Le numero de téléphone est incorrect ';
            } elseif ($key == 'code_postal' && !NumberHelper::checkPostalCode($value)) {
                $formErrors[$key] = 'Le code postal est incorrect';
            } elseif ($key == 'remuneration' && !NumberHelper::checkSalary($value)) {
                $formErros[$key] = 'Le salaire est invalide';
            } elseif ($key == 'numero_securite_sociale' && !NumberHelper::checkSocialSecurityNumber($value)) {
                $formErrors[$key] = 'Le numero de securite sociale est incorrect';
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
    protected function checkTravailleurEtranger(array $form, array &$formErrors)
    {

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
                if ($key == 'date_fin_contrat') {
                    continue;
                }
                if ($key == 'motif_fin_contrat' && 
                (! array_key_exists('date_fin_contrat', $form) || $form['date_fin_contrat'] == '')) {
                    continue;
                }
                $formErrors[$key] = ' Le champ est obligatoire  ';
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
        foreach ($form as $key => $value) {
            if (trim($value) == "") {
                $formErrors[$key] = ' Le champ est obligatoire  ';
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
        foreach ($form as $key => $value) {
            if (trim($value) == "") {
                $formErrors[$key] = ' Le champ est obligatoire  ';
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
        foreach ($form as $key => $value) {
            if (trim($value) == "") {
                $formErrors[$key] = 'Le champ est obligatoire';
            }
            elseif ($key == 'telephone' && !NumberHelper::checkPhoneNumber($value)) {
                $formErrors[$key] = ' Le numero de telephone est incorrect  ';
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

    }

    
}