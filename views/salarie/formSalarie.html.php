<?php

$formSalarie = $template->formSalarie;
$formErrors = $template->formErrors;
$salarie = $template->salarie; 
$formation = $template->formation; 
$categories = $template->categories; 
$typesContrat = $template->typesContrat; 
$typesDocument = $template->typesDocument; 
$renseignementsPoste = $template->renseignementsPoste; 
$motifsFinContrat = $template->motifsFinContrat; 
use Utils\FormHelper; 

?>

        <form action="" method="post" class="col-md-8 offset-md-2">
            <div class="form-row">
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input"
                            id="qualite_Monsieur" name="salarie_form[qualite]" value="Monsieur">
                        <label class="custom-control-label <?= FormHelper::editRadioFieldErrors($formErrors, 'qualite') ?>" 
                            for="qualite_Monsieur">Monsieur</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input"
                            id="qualite_Madame" name="salarie_form[qualite]" value="Madame">
                        <label class="custom-control-label <?= FormHelper::editRadioFieldErrors($formErrors, 'qualite') ?>" 
                            for="qualite_Madame">Madame</label>
                    </div>
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'qualite') ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nom">Nom *</label>
                    <input type="text" class="form-control <?= FormHelper::editFieldErrors($formErrors, 'nom') ?>" 
                        id="nom" name="salarie_form[nom]" 
                        value="<?= $salarie->getNom() ?>">
                    <?= FormHelper::setFeedbackInvalidity($formErrors, 'nom') ?></span>
                </div> 
                <div class="form-group col-md-6">
                    <label for="prenom">Prénom *</label>
                    <input type="text" class="form-control <?= FormHelper::editFieldErrors($formErrors, 'prenom') ?>" 
                        id="prenom" name="salarie_form[prenom]"
                        value="<?= $salarie->getPrenom() ?>">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'prenom') ?></span>
                </div> 
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="situation_familiale">Situation familiale *</label>
                    <select id="situation_familiale" name="salarie_form[situation_familiale]" 
                        class="custom-select <?= FormHelper::editFieldErrors($formErrors, 'situation_familiale') ?>">
                        <option value="">Choisissez une situation familiale</option>
                        <?php foreach($salarie->getSituationFamilialePossibles() as $value): ?> 
                                <option value="<?= $value ?>"><?= $value ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'situation_familiale') ?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="nom_jeune_fille">Nom de jeune fille </label>
                    <input type="text" class="form-control" id="nom_jeune_fille" name="salarie_form[nom_jeune_fille]"
                        value="<?= $salarie->getNomJeuneFille() ?>">
                </div>
            </div> 
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="date_naissance">Date de naissance *</label>
                    <input type="text" class="form-control <?= FormHelper::editFieldErrors($formErrors, 'date_naissance') ?>" 
                        id="date_naissance" name="salarie_form[date_naissance]" 
                        value="<?= $salarie->getDateNaissance() ?>">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'date_naissance') ?></span>
                </div> 
                <div class="form-group col-md-8">
                    <label for="lieu_naissance">Lieu de naissance *</label>
                    <input type="text" class="form-control <?= FormHelper::editFieldErrors($formErrors, 'lieu_naissance') ?>" 
                        id="lieu_naissance" name="salarie_form[lieu_naissance]"
                        value="<?= $salarie->getLieuNaissance() ?>">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'lieu_naissance') ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="adresse">Adresse *</label>
                    <input type="text" class="form-control <?= FormHelper::editFieldErrors($formErrors, 'adresse') ?>" 
                        id="adresse" name="salarie_form[adresse]"
                        value="<?= $salarie->getAdresse() ?>">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'adresse') ?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="adresse_complement">Adresse Complément</label>
                    <input type="text" class="form-control" 
                        id="adresse_complement" name="salarie_form[adresse_complement]"
                        value="<?= $salarie->getAdresseComplement() ?>">
                </div>   
            </div>
            <div class="form-row"> 
                <div class="form-group col-md-4">
                    <label for="code_postal">Code Postal *</label>
                    <input type="text" class="form-control <?= FormHelper::editFieldErrors($formErrors, 'code_postal') ?>" 
                        id="code_postal" name="salarie_form[code_postal]"
                        value="<?= $salarie->getCodePostal() ?>">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'code_postal') ?></span>
                </div> 
                <div class="form-group col-md-8">
                    <label for="ville">Ville *</label>
                    <input type="text" class="form-control <?= FormHelper::editFieldErrors($formErrors, 'ville') ?>" 
                        id="ville" name="salarie_form[ville]"
                        value="<?= $salarie->getVille() ?>">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'ville') ?></span>
                </div>
            </div> 
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="mail_professionnel">Email professionnel *</label>
                    <input type="text" class="form-control <?= FormHelper::editFieldErrors($formErrors, 'mail_professionnel') ?>" 
                        id="mail_professionnel" name="salarie_form[mail_professionnel]"
                        value="<?= $salarie->getMailProfessionnel() ?>">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'mail_professionnel') ?></span>
                </div> 
                <div class="form-group col-md-6">
                    <label for="mail_personnel">Email personnel *</label>
                    <input type="text" class="form-control <?= FormHelper::editFieldErrors($formErrors, 'mail_personnel') ?>" 
                        id="mail_personnel" name="salarie_form[mail_personnel]"
                        value="<?= $salarie->getMailPersonnel() ?>">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'mail_personnel') ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="telephone">Numéro de téléphone *</label>
                    <input type="text" class="form-control <?= FormHelper::editFieldErrors($formErrors, 'telephone') ?>" 
                        id="telephone" name="salarie_form[telephone]"
                        value="<?= $salarie->getTelephone() ?>">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'telephone') ?></span>
                </div>
                <div class="form-group col-md-8">
                    <label for="numero_securite_sociale">Numéro de sécurité social *</label>
                    <input type="text" class="form-control <?= FormHelper::editFieldErrors($formErrors, 'numero_securite_sociale') ?>" 
                        id="numero_securite_sociale" name="salarie_form[numero_securite_sociale]"
                        value="<?= $salarie->getNumeroSecuriteSociale() ?>">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'numero_securite_sociale') ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="remuneration">Rémunération *</label>
                    <input type="text" class="form-control <?= FormHelper::editFieldErrors($formErrors, 'remuneration') ?>" 
                        id="remuneration" name="salarie_form[remuneration]"
                        value="<?= $salarie->getRemuneration() ?>">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'remuneration') ?></span>
                </div>
                <div class="form-group col-md-6">
                    <label>Le/La salarié(e) est-il/elle en poste ?</label><br />
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="en_poste_oui" name="salarie_form[en_poste]" value="1">
                        <label class="custom-control-label <?= FormHelper::editRadioFieldErrors($formErrors, 'en_poste') ?>" 
                            for="en_poste_oui">Oui</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="en_poste_non" name="salarie_form[en_poste]" value="0">
                        <label class="custom-control-label <?= FormHelper::editRadioFieldErrors($formErrors, 'en_poste') ?>" 
                            for="en_poste_non">Non</label>
                    </div>
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'en_poste') ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nationalite">Nationalité *</label>
                    <input type="text" class="form-control <?= FormHelper::editFieldErrors($formErrors, 'nationalite') ?>" 
                        id="nationalite" name="salarie_form[nationalite]"
                        value="<?= $salarie->getNationalite() ?>">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'nationalite') ?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="langues_etrangeres">Langues *</label>
                    <input type="text" class="form-control <?= FormHelper::editFieldErrors($formErrors, 'langues_etrangeres') ?>" 
                        id="langues_etrangeres" name="salarie_form[langues_etrangeres]"
                        value="<?= $salarie->getLanguesEtrangeres() ?>">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'langues_etrangeres') ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Le/La salarié(e) exerce-t-il/elle une activité professionnelle secondaire ?</label><br />
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="autre_activite_oui" name="salarie_form[autre_activite]" value="1">
                        <label class="custom-control-label <?= FormHelper::editRadioFieldErrors($formErrors, 'autre_activite') ?>" 
                            for="autre_activite_oui">Oui</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="autre_activite_non" name="salarie_form[autre_activite]" value="0">
                        <label class="custom-control-label <?= FormHelper::editRadioFieldErrors($formErrors, 'autre_activite') ?>" 
                            for="autre_activite_non">Non</label>
                    </div>
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'autre_activite') ?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="details_autre_activite">Détails activité secondaire </label>
                    <input type="text" class="form-control" id="details_autre_activite" name="salarie_form[details_autre_activite]"
                        value="<?= $salarie->getDetailsAutreActivite() ?>">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'details_autre_activite') ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Le/La salarié(e) possède une autorisation écrite de travail de ses responsables légaux ?</label><br />
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="autorisation_travail_mineur_oui" name="salarie_form[autorisation_travail_mineur]" value="1">
                        <label class="custom-control-label <?= FormHelper::editRadioFieldErrors($formErrors, 'autorisation_travail_mineur') ?>" 
                            for="autorisation_travail_mineur_oui">Oui</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="autorisation_travail_mineur_non" name="salarie_form[autorisation_travail_mineur]" value="0">
                        <label class="custom-control-label <?= FormHelper::editRadioFieldErrors($formErrors, 'autorisation_travail_mineur') ?>" 
                            for="autorisation_travail_mineur_non">Non</label>
                    </div>
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'autorisation_travail_mineur') ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Le/La salarié(e) est-il/elle reconnu(e) comme un(e) travailleur/euse handicapé(e) ?</label><br />
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="statut_handicap_oui" name="salarie_form[statut_handicap]" value="1">
                        <label class="custom-control-label <?= FormHelper::editRadioFieldErrors($formErrors, 'statut_handicap') ?>" 
                            for="statut_handicap_oui">Oui</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="statut_handicap_non" name="salarie_form[statut_handicap]" value="0">
                        <label class="custom-control-label <?= FormHelper::editRadioFieldErrors($formErrors, 'statut_handicap') ?>" 
                            for="statut_handicap_non">Non</label>
                    </div>
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'statut_handicap') ?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="taux_invalidite">Détails taux invalidité </label>
                    <input type="text" class="form-control" id="taux_invalidite" name="salarie_form[taux_invalidite]"
                        value="<?= $salarie->getTauxInvalidite() ?>">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'taux_invalidite') ?></span>
                </div>
            <div>
            <?php require_once 'formFormation.html.php' ?>
            <?php require_once 'formEnfant.html.php' ?>
            <?php require_once 'formContactUrgence.html.php' ?>
            <?php require_once 'formDocument.html.php' ?>
            <?php require_once 'formCategorieSocioProfessionnelle.html.php' ?>
            <?php require_once 'formTravailleurEtranger.html.php' ?>
            <?php require_once 'formContrat.html.php' ?>
                    
            <button type="submit" id="envoyer" class="pull-right btn btn-danger">Enregistrer</button>
        </form>
     