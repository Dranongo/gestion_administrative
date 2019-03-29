<?php

namespace Controller;


use Model\User;
use Model\Salarie;
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
        $salarie = new Salarie();
        $formErrors = [];
        $successMessage = $errorMessage = '';

        if ($request->isPost()) {
            if (count($formErrors) === 0) {
                $salarie->setQualite($form['gender'])
                        ->setNom($form['lastName'])
                        ->setPrenom($form['firstName'])
                        ->setNomJeuneFille($form['maidenName'])
                        ->setNationalite($form['nationality'])
                        ->setDateNaissance(DateHelper::convertformbaseDateToDateTime($form['birthdate']))
                        ->setLieuNaissance($form['birthplace'])
                        ->setAdresse($form['address'])
                        ->setCodePostal($form['postalCode'])
                        ->setVille($form['city'])
                        ->setTelephone($form['phoneNumber'])
                        ->setMailProfessionnel($form['professionnaleEmail'])
                        ->setMailPersonnel($form['personalEmail'])
                        ->setNumeroSecuriteSociale($form['socialSecurityNumber'])
                        ->setRemuneration($form['salary'])
                        ->setEnPoste($form['currentlyEmployed'])
                        ->setSituationFamiliale($form['familyStatus'])
                        ->setLangues($form['languages'])
                        ->setAutreActivite($form['additionalActivity'])
                        ->setDetailActivite($form['detailsAdditionalActivity'])
                        ->setAutorisationTravailMineur($form['parentalPermit'])
                        ->setStatutHandicap($form['disabledWorker'])
                        ->setTauxInvalidite($form['detailsDisabledWorker']);
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