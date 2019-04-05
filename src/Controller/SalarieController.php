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
use Service\Router;
use Service\Request;
use Service\Template;
use Utils\DateHelper;

class SalarieController extends AbstractController
{
    /**
     * @var array
     */
    protected $formSalarie;

    /**
     * @var array
     */
    protected $formEnfant;

    /**
     * @var array
     */
    protected $formFormation;

    /**
     * @var array
     */
    protected $formContactUrgence;

    /**
     * @var array
     */
    protected $formDocument;

    /**
     * @var array
     */
    protected $formContrat;

    /**
     *
     */
    public function listAction()
    {
        return [
            'title' => 'Affichage de la fiche de renseignement du salarié',
            'error' => 'An error has occured destroying the session'
        ];
    }

    /**
     * Collect the form's data to create an employee
     */
    public function createAction()
    {
        $request = $this->getRequest();
        $this->collectDataForm($request);

        $salarie = new Salarie();
        $formation = new Formation();

        $salarieDAO = SalarieDAO::getInstance();
        $categories = $this->getDatabaseReference(CategorieSocioProfessionnelleDAO::getInstance());
        $typesContrat = $this->getDatabaseReference(TypeContratDAO::getInstance());
        $typesDocument = $this->getDatabaseReference(DocumentTypeDAO::getInstance());
        $renseignementsPoste = $this->getDatabaseReference(RenseignementPosteDAO::getInstance());

        $formErrors = [];
        $successMessage = $errorMessage = '';
        $jsFiles = ['/js/createRowTable.js'];

        if ($request->isPost()) {
            if (count($formErrors) === 0) {
                $salarie = $salarieDAO->hydrate($this->formSalarie);
                $salarieDAO->save($salarie);

                //$this->saveData(\DAO\ContratDAO::getInstance(), $this->formContrat, $salarie);
                $this->saveData(\DAO\EnfantDAO::getInstance(), $this->formEnfant, $salarie);
                $this->saveData(\DAO\ContactUrgenceDAO::getInstance(), $this->formContactUrgence, $salarie);
                //$this->saveData(\DAO\FormationDAO::getInstance(), $this->formFormation, $salarie);
                //$this->saveData(\DAO\DocumentDAO::getInstance(), $this->formDocument, $salarie);
            }
        }
        return [
            'title' => 'Creation d\'une fiche de renseignements à l\'embauche',
            'formSalarie' => $this->formSalarie,
            'formContrat' => $this->formContrat,            
            'formEnfant' => $this->formEnfant,
            'formFormation' => $this->formFormation,
            'formContactUrgence' => $this->formContactUrgence,
            'formDocument' => $this->formDocument,
            'formErrors' => $formErrors,
            'salarie' => $salarie,
            'formation' => $formation,
            'categories' => $categories,
            'typesContrat' => $typesContrat,
            'typesDocument' => $typesDocument,
            'renseignementsPoste' => $renseignementsPoste,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'jsFiles' => $jsFiles
        ];
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    protected function collectDataForm(Request $request)
    {
        $this->formSalarie = $request->getRequest('salarie_form');
        $this->formEnfant = $request->getRequest('enfant_form');
        $this->formFormation = $request->getRequest('formation_form');
        $this->formContactUrgence = $request->getRequest('contact_urgence_form');
        $this->formDocument =  $request->getRequest('document_form');
        $this->formContrat = $request->getRequest('contrat_form');
    }

    /**
     * Get the table's reference in the database
     *
     * @param \DAO\DatabaseDAO $modelDAO
     * @return array
     */
    protected function getDatabaseReference(\DAO\DatabaseDAO $modelDAO): array
    {
       return $modelDAO->findAll();
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
        return count($formErrors) === 0;
    }

    /**
     * @param array $form
     * @param array $formErrors
     * @return void
     */
    protected function checkFormSalarie(array $form, array &$formErrors)
    {

    }

    /**
     * @param array $form
     * @param array $formErrors
     * @return void
     */
    protected function checkFormContrat(array $form, array &$formErrors)
    {

    }

    /**
     * @param array $form
     * @param array $formErrors
     * @return void
     */
    protected function checkFormEnfant(array $form, array &$formErrors)
    {

    }

    /**
     * @param array $form
     * @param array $formErrors
     * @return void
     */
    protected function checkFormFormation(array $form, array &$formErrors)
    {

    }

    /**
     * @param array $form
     * @param array $formErrors
     * @return void
     */
    protected function checkFormContactUrgence(array $form, array &$formErrors)
    {

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