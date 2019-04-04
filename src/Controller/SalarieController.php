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
use Service\Template;
use Utils\DateHelper;

class SalarieController extends AbstractController
{

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

        $formSalarie = $request->getRequest('salarie_form');
        $formEnfant = $request->getRequest('enfant_form');
        $formFormation = $request->getRequest('formation_form');
        $formContactUrgence = $request->getRequest('contact_urgence_form');
        $formDocument =  $request->getRequest('document_form');
        $formContrat = $request->getRequest('contrat_form');

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
                $salarie = $salarieDAO->hydrate($formSalarie);
                $salarieDAO->save($salarie);

                //$this->saveData(\DAO\ContratDAO::getInstance(), $formContrat, $salarie);
                $this->saveData(\DAO\EnfantDAO::getInstance(), $formEnfant, $salarie);
                $this->saveData(\DAO\ContactUrgenceDAO::getInstance(), $formContactUrgence, $salarie);
                $this->saveData(\DAO\FormationDAO::getInstance(), $formFormation, $salarie);
                //$this->saveData(\DAO\DocumentDAO::getInstance(), $formDocument, $salarie);
            }
        }
        return [
            'title' => 'Creation d\'une fiche de renseignements à l\'embauche',
            'formSalarie' => $formSalarie,
            'formContrat' => $formContrat,            
            'formEnfant' => $formEnfant,
            'formFormation' => $formFormation,
            'formContactUrgence' => $formContactUrgence,
            'formDocument' => $formDocument,
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


}