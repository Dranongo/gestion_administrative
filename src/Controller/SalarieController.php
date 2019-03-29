<?php

namespace Controller;


use Model\User;
use Model\Salarie;
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
            'error' => 'An error has occured destroying the session',
            'template' => $this->getTemplateName()
        ];
    }

    public function createAction()
    {
        $request = $this->getRequest();
        $form = $request->getRequest('salarie_form');
        $salarie = new \Model\Salarie();
        $salarieDAO = \DAO\SalarieDAO::getInstance();
        $formErrors = [];
        $successMessage = $errorMessage = '';

        if ($request->isPost()) {
            if (count($formErrors) === 0) {
                $salarieDAO->buildDomainObject($form);
            }
        }
        return [
            'title' => 'Creation Salarie',
            'form' => $form,
            'formErrors' => $formErrors,
            'salarie' => $salarie,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'template' => $this->getTemplateName()
        ];
    }
}