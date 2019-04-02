<?php

namespace Controller;


use Model\User;
use Model\Salarie;
use Model\Formation;
use DAO\SalarieDAO;
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
            'title' => 'Affichage Salarie',
            'error' => 'An error has occured destroying the session'
        ];
    }

    public function createAction()
    {
        $request = $this->getRequest();
        $form = $request->getRequest('salarie_form');
        $salarie = new Salarie();
        $formation = new Formation();
        $salarieDAO = SalarieDAO::getInstance();
        $formErrors = [];
        $successMessage = $errorMessage = '';
        $jsFiles = ['/js/createRowTable.js'];

        if ($request->isPost()) {
            if (count($formErrors) === 0) {
                $salarie = $salarieDAO->hydrate($form);
            }
        }
        return [
            'title' => 'Creation Salarie',
            'form' => $form,
            'formErrors' => $formErrors,
            'salarie' => $salarie,
            'formation' => $formation,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'jsFiles' => $jsFiles
        ];
    }
}