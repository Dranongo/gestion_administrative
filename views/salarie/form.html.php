<?php $form = $template->form ?>
<?php $formErrors = $template->formErrors ?>
<?php $salarie = $template->salarie ?>
<?php $formation = $template->formation ?>


    <div class="container-fluid ">
        <form action="" method="post" class="text-center">
            <div class="form-group md-form">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="qualite_Monsieur" name="salarie_form[qualite]" value="Monsieur">
                    <label class="custom-control-label" for="qualite_Monsieur">Monsieur</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="qualite_Madame" name="salarie_form[qualite]" value="Madame">
                    <label class="custom-control-label" for="qualite_Madame">Madame</label>
                </div>
            </div>
            <div class="form-row col-md">
                <div class="form-group col-md-2<?= $formErrors != null ? $formErrors['nom'] : '' ?>">
                    <label for="nom">Nom *</label>
                    <input type="text" class="form-control" id="nom" name="salarie_form[nom]"
                        value="<?= $form != null ? $form['nom'] : '' ?>">
                </div> 
                <div class="form-group col-md-2<?= $formErrors != null ? $formErrors['prenom'] : '' ?>">
                    <label for="prenom">Prénom *</label>
                    <input type="text" class="form-control" id="prenom" name="salarie_form[prenom]"
                        value="<?= $form != null ? $form['prenom'] : '' ?>">
                </div> 
            </div>
            <div class="form-group col-md-3 <?= $formErrors != null ? $formErrors['nom_jeune_fille'] : '' ?>">
                <label for="nom_jeune_fille">Nom de jeune fille </label>
                <input type="text" class="form-control" id="nom_jeune_fille" name="salarie_form[nom_jeune_fille]"
                    value="<?= $form != null ? $form['nom_jeune_fille'] : '' ?>">
            </div> 
            <div class="form-group col-md-3 <?= $formErrors != null ? $formErrors['nationalite'] : '' ?>">
                <label for="nationalite">Nationalité *</label>
                <input type="text" class="form-control" id="nationalite" name="salarie_form[nationalite]"
                    value="<?= $form != null ? $form['nationalite'] : '' ?>">
            </div>
            <div class="form-row col-md">
                <div class="form-group col-md-2 <?= $formErrors != null ? $formErrors['date_naissance'] : '' ?>">
                    <label for="date_naissance">Date de naissance *</label>
                    <input type="text" class="form-control" id="date_naissance" name="salarie_form[date_naissance]"
                        value="<?= $form != null ? $form['date_naissance'] : '' ?>">
                </div> 
                <div class="form-group col-md-2 <?= $formErrors != null ? $formErrors['lieu_naissance'] : '' ?>">
                    <label for="lieu_naissance">Lieu de naissance *</label>
                    <input type="text" class="form-control" id="lieu_naissance" name="salarie_form[lieu_naissance]"
                        value="<?= $form != null ? $form['lieu_naissance'] : '' ?>">
                </div>
            </div>
            <div class="form-group col-md-4 <?= $formErrors != null ? $formErrors['adresse'] : '' ?>">
                <label for="adresse">Adresse *</label>
                <input type="text" class="form-control" id="adresse" name="salarie_form[adresse]"
                    value="<?= $form != null ? $form['adresse'] : '' ?>">
            </div>
            <div class="form-row col-md"> 
                <div class="form-group col-md-2 <?= $formErrors != null ? $formErrors['code_postal'] : '' ?>">
                    <label for="code_postal">Code Postal *</label>
                    <input type="text" class="form-control" id="code_postal" name="salarie_form[code_postal]"
                        value="<?= $form != null ? $form['code_postal'] : '' ?>">
                </div> 
                <div class="form-group col-md-2 <?= $formErrors != null ? $formErrors['ville'] : '' ?>">
                    <label for="ville">Ville *</label>
                    <input type="text" class="form-control" id="ville" name="salarie_form[ville]"
                        value="<?= $form != null ? $form['ville'] : '' ?>">
                </div>
            </div> 
            <div class="form-group col-md-4 <?= $formErrors != null ? $formErrors['telephone'] : '' ?>">
                <label for="telephone">Numéro de téléphone *</label>
                <input type="text" class="form-control" id="telephone" name="salarie_form[telephone]"
                    value="<?= $form != null ? $form['telephone'] : '' ?>">
            </div>
            <div class="form-row col-md">
                <div class="form-group col-md-3 <?= $formErrors != null ? $formErrors['mail_professionnel'] : '' ?>">
                    <label for="mail_professionnel">Email professionnel *</label>
                    <input type="text" class="form-control" id="mail_professionnel" name="salarie_form[mail_professionnel]"
                        value="<?= $form != null ? $form['mail_professionnel'] : '' ?>">
                </div> 
                <div class="form-group col-md-3 <?= $formErrors != null ? $formErrors['mail_personnel'] : '' ?>">
                    <label for="mail_personnel">Email personnel *</label>
                    <input type="text" class="form-control" id="mail_personnel" name="salarie_form[mail_personnel]"
                        value="<?= $form != null ? $form['mail_personnel'] : '' ?>">
                </div>
            </div> 
            <div class="form-group col-md-4<?= $formErrors != null ? $formErrors['numero_securite_sociale'] : '' ?>">
                <label for="numero_securite_sociale">Numéro de sécurité social *</label>
                <input type="text" class="form-control" id="numero_securite_sociale" name="salarie_form[numero_securite_sociale]"
                    value="<?= $form != null ? $form['numero_securite_sociale'] : '' ?>">
            </div> 
            <div class="form-group col-md-3 <?= $formErrors != null ? $formErrors['remuneration'] : '' ?>">
                <label for="remuneration">Rémunération *</label>
                <input type="text" class="form-control" id="remuneration" name="salarie_form[remuneration]"
                    value="<?= $form != null ? $form['remuneration'] : '' ?>">
            </div>
            <div class="form-group col-md <?= $formErrors != null ? $formErrors['en_poste'] : '' ?>">
                <label>Le salarié(e) est-il/elle en poste ?</label><br />
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="en_poste_oui" name="salarie_form[en_poste]" value="1">
                    <label class="custom-control-label" for="en_poste_oui">Oui</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="en_poste_non" name="salarie_form[en_poste]" value="0">
                    <label class="custom-control-label" for="en_poste_non">Non</label>
                </div>
            </div>
            <div class="form-group col-md-4 <?= $formErrors != null ? $formErrors['situation_familiale'] : '' ?>">
                <label for="situation_familiale">Situation familiale *</label>
                <select id="situation_familiale" name="salarie_form[situation_familiale]" class="custom-select">
                    <option value="">Choisissez une situation familiale</option>
                    <?php foreach($salarie->getSituationFamilialePossibles() as $value): ?> 
                            <option value="<?= $value ?>"><?= $value ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-4 <?= $formErrors != null ? $formErrors['langues_etrangeres'] : '' ?>">
                <label for="langues_etrangeres">Langues *</label>
                <input type="text" class="form-control" id="langues_etrangeres" name="salarie_form[langues_etrangeres]"
                    value="<?= $form != null ? $form['langues_etrangeres'] : '' ?>">
            </div>
            <div class="form-group col-md <?= $formErrors != null ? $formErrors['autre_activite'] : '' ?>">
                <label>Le salarié(e) exerce-t-il(elle) une activité professionnel secondaire ?</label><br />
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="autre_activite_oui" name="salarie_form[autre_activite]" value="1">
                    <label class="custom-control-label" for="autre_activite_oui">Oui</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="autre_activite_non" name="salarie_form[autre_activite]" value="0">
                    <label class="custom-control-label" for="autre_activite_non">Non</label>
                </div>
            </div>
            <div class="form-group col-md-4 <?= $formErrors != null ? $formErrors['details_autre_activite'] : '' ?>">
                <label for="details_autre_activite">Détails activité secondaire </label>
                <input type="text" class="form-control" id="details_autre_activite" name="salarie_form[details_autre_activite]"
                    value="<?= $form != null ? $form['details_autre_activite'] : '' ?>">
            </div>
            <div class="form-group col-md <?= $formErrors != null ? $formErrors['autorisation_travail_mineur'] : '' ?>">
                <label>Le salarié(e) possède une autorisation écrite de travail de ses responsables légaux ?</label><br />
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="autorisation_travail_mineur_oui" name="salarie_form[autorisation_travail_mineur]" value="1">
                    <label class="custom-control-label" for="autorisation_travail_mineur_oui">Oui</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="autorisation_travail_mineur_non" name="salarie_form[autorisation_travail_mineur]" value="0">
                    <label class="custom-control-label" for="autorisation_travail_mineur_non">Non</label>
                </div>
            </div>
            <div class="form-group col-md <?= $formErrors != null ? $formErrors['statut_handicap'] : '' ?>">
                <label>Le salarié(e) est-il(elle) reconnu comme un travailleur handicapé ?</label><br />
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="statut_handicap_oui" name="salarie_form[statut_handicap]" value="1">
                    <label class="custom-control-label" for="statut_handicap_oui">Oui</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="statut_handicap_non" name="salarie_form[statut_handicap]" value="0">
                    <label class="custom-control-label" for="statut_handicap_non">Non</label>
                </div>
            </div>
            <div class="form-group col-md-4 <?= $formErrors != null ? $formErrors['taux_invalidite'] : '' ?>">
                <label for="taux_invalidite">Détails taux invalidité *</label>
                <input type="text" class="form-control" id="taux_invalidite" name="salarie_form[taux_invalidite]"
                    value="<?= $form != null ? $form['taux_invalidite'] : '' ?>">
            </div>

            <?php require_once 'formFormation.html.php' ?>
            <?php require_once 'formEnfant.html.php' ?>
            <?php require_once 'formContactUrgence.html.php' ?>
            <?php require_once 'formDocument.html.php' ?>
                    
            <button type="submit" class="pull-right btn btn-success">Enregistrer</button>
        </form>
    </div>    