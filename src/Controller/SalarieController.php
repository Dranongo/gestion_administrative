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
            'title' => 'Affichage Salarié',
            'error' => 'An error has occured destroying the session'
        ];
    }

    /**
     *
     */
    public function createAction()
    {
        $request = $this->getRequest();

        /** A modifier */
        $formSalarie = $request->getRequest('salarie_form');
        $formEnfant = $request->getRequest('enfant_form');
        $formFormation = $request->getRequest('enfant_form');
        $formContactUrgence = $request->getRequest('contact_urgence_form');
        $formDocument =  $request->getRequest('document_form');

        /** A modifier */
        $salarie = new Salarie();
        $formation = new Formation();

        /** A modifier */
        $salarieDAO = SalarieDAO::getInstance();
        $categorieSocioProfessionnelleDAO = CategorieSocioProfessionnelleDAO::getInstance();
        $categories = $categorieSocioProfessionnelleDAO->findAll();
        $typeContratDAO = TypeContratDAO::getInstance();
        $typesContrat = $typeContratDAO->findAll();
        $typeDocumentDAO = DocumentTypeDAO::getInstance();
        $typesDocument = $typeDocumentDAO->findAll();
        $renseignementPosteDAO = RenseignementPosteDAO::getInstance();
        $renseignementsPoste = $renseignementPosteDAO->findAll();

        $formErrors = [];
        $successMessage = $errorMessage = '';
        $jsFiles = ['/js/createRowTable.js'];

        if ($request->isPost()) {
            if (count($formErrors) === 0) {
                $salarie = $salarieDAO->hydrate($formSalarie);
                $salarieDAO->save($salarie);
            }
        }
        return [
            'title' => 'Creation d\'une fiche de renseignements à l\'embauche',
            'formSalarie' => $formSalarie,
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


}