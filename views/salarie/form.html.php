<?php $form = $template->form ?>
<?php $formErrors = $template->formErrors ?>
<?php $salarie = $template->salarie ?>

<form action="" method="post">
        <div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input" id="genderMale" name="salarie_form[gender]" value="Monsieur">
			<label class="custom-control-label" for="genderMale">Monsieur</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input" id="genderFemale" name="salarie_form[gender]" value="Madame">
			<label class="custom-control-label" for="genderFemale">Madame</label>
		</div>
        <div class="form-row">
            <div class="form-group col-md-6 <?= $formErrors != null ? $formErrors['firstName'] : '' ?>">
                <label for="firstName">Prénom *</label>
                <input type="text" class="form-control" id="firstName" name="salarie_form[firstName]"
                    value="<?= $form != null ? $form['firstName'] : '' ?>">
            </div> 
            <div class="form-group col-md-6 <?= $formErrors != null ? $formErrors['lastName'] : '' ?>">
                <label for="lastName">Nom *</label>
                <input type="text" class="form-control" id="lastName" name="salarie_form[lastName]"
                    value="<?= $form != null ? $form['lastName'] : '' ?>">
            </div> 
        </div>
        <div class="form-group <?= $formErrors != null ? $formErrors['maidenName'] : '' ?>">
            <label for="maidenName">Nom de jeune fille *</label>
            <input type="text" class="form-control" id="maidenName" name="salarie_form[maidenName]"
                   value="<?= $form != null ? $form['maidenName'] : '' ?>">
        </div> 
        <div class="form-group <?= $formErrors != null ? $formErrors['nationality'] : '' ?>">
            <label for="nationality">Nationalité *</label>
            <input type="text" class="form-control" id="nationality" name="salarie_form[nationality]"
                   value="<?= $form != null ? $form['nationality'] : '' ?>">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 <?= $formErrors != null ? $formErrors['birthdate'] : '' ?>">
                <label for="birthdate">Date de naissance *</label>
                <input type="text" class="form-control" id="birthdate" name="salarie_form[birthdate]"
                    value="<?= $form != null ? $form['birthdate'] : '' ?>">
            </div> 
            <div class="form-group col-md-6 <?= $formErrors != null ? $formErrors['birthplace'] : '' ?>">
                <label for="birthplace">Lieu de naissance *</label>
                <input type="text" class="form-control" id="birthplace" name="salarie_form[birthplace]"
                    value="<?= $form != null ? $form['birthplace'] : '' ?>">
            </div>
        </div>
        <div class="form-group <?= $formErrors != null ? $formErrors['address'] : '' ?>">
            <label for="address">Adresse *</label>
            <input type="text" class="form-control" id="address" name="salarie_form[address]"
                   value="<?= $form != null ? $form['address'] : '' ?>">
        </div>
        <div class="form-row"> 
            <div class="form-group col-md-4 <?= $formErrors != null ? $formErrors['postalCode'] : '' ?>">
                <label for="postalCode">Code Postal *</label>
                <input type="text" class="form-control" id="postalCode" name="salarie_form[postalCode]"
                    value="<?= $form != null ? $form['postalCode'] : '' ?>">
            </div> 
            <div class="form-group col-md-8 <?= $formErrors != null ? $formErrors['city'] : '' ?>">
                <label for="city">Ville *</label>
                <input type="text" class="form-control" id="city" name="salarie_form[city]"
                    value="<?= $form != null ? $form['city'] : '' ?>">
            </div>
        </div> 
        <div class="form-group <?= $formErrors != null ? $formErrors['phoneNumber'] : '' ?>">
            <label for="phoneNumber">Numéro de téléphone *</label>
            <input type="text" class="form-control" id="phoneNumber" name="salarie_form[phoneNumber]"
                   value="<?= $form != null ? $form['phoneNumber'] : '' ?>">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 <?= $formErrors != null ? $formErrors['professionalEmail'] : '' ?>">
                <label for="professionalEmail">Email professionnel *</label>
                <input type="text" class="form-control" id="professionalEmail" name="salarie_form[professionalEmail]"
                    value="<?= $form != null ? $form['professionalEmail'] : '' ?>">
            </div> 
            <div class="form-group col-md-6 <?= $formErrors != null ? $formErrors['personalEmail'] : '' ?>">
                <label for="personalEmail">Email personnel *</label>
                <input type="text" class="form-control" id="personalEmail" name="salarie_form[personalEmail]"
                    value="<?= $form != null ? $form['personalEmail'] : '' ?>">
            </div>
        </div> 
        <div class="form-group <?= $formErrors != null ? $formErrors['socialSecurityNumber'] : '' ?>">
            <label for="socialSecurityNumber">Numéro de sécurité social *</label>
            <input type="text" class="form-control" id="socialSecurityNumber" name="salarie_form[socialSecurityNumber]"
                   value="<?= $form != null ? $form['socialSecurityNumber'] : '' ?>">
        </div> 
        <div class="form-group <?= $formErrors != null ? $formErrors['salary'] : '' ?>">
            <label for="salary">Rémunération *</label>
            <input type="text" class="form-control" id="salary" name="salarie_form[salary]"
                   value="<?= $form != null ? $form['salary'] : '' ?>">
        </div>
        <div class="form-group <?= $formErrors != null ? $formErrors['currentlyEmployed'] : '' ?>">
            <label>Le salarié(e) est-il/elle en poste ?</label><br />
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="currentlyEmployedYes" name="salarie_form[currentlyEmployed]" value="1">
                <label class="custom-control-label" for="currentlyEmployedYes">Oui</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="currentlyEmployedNo" name="salarie_form[currentlyEmployed]" value="0">
                <label class="custom-control-label" for="currentlyEmployedNo">Non</label>
            </div>
        </div>
        <div class="form-group <?= $formErrors != null ? $formErrors['familyStatus'] : '' ?>">
            <label for="familyStatus">Situation familiale *</label>
			<select id="familyStatus" name="salarie_form[familyStatus]" class="custom-select">
				<option value="">Choisissez une situation familiale</option>
                <?php foreach($salarie->getSituationFamilialePossibles() as $value): ?> 
                        <option value="<?= $value ?>"><?= $value ?></option>
                <?php endforeach; ?>
			</select>
		</div>
        <div class="form-group <?= $formErrors != null ? $formErrors['languages'] : '' ?>">
            <label for="languages">Langues *</label>
            <input type="text" class="form-control" id="languages" name="salarie_form[languages]"
                   value="<?= $form != null ? $form['languages'] : '' ?>">
        </div>
        <div class="form-group <?= $formErrors != null ? $formErrors['additionalActivity'] : '' ?>">
            <label>Le salarié(e) exerce-t-il(elle) une activité professionnel secondaire ?</label><br />
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="additionalActivityYes" name="salarie_form[additionalActivity]" value="1">
                <label class="custom-control-label" for="additionalActivityYes">Oui</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="additionalActivityNo" name="salarie_form[additionalActivity]" value="0">
                <label class="custom-control-label" for="additionalActivityNo">Non</label>
            </div>
        </div>
        <div class="form-group <?= $formErrors != null ? $formErrors['detailAdditionalActivity'] : '' ?>">
            <label for="detailAdditionalActivity">Détails activité secondaire *</label>
            <input type="text" class="form-control" id="detailAdditionalActivity" name="salarie_form[detailAdditionalActivity]"
                   value="<?= $form != null ? $form['detailAdditionalActivity'] : '' ?>">
        </div>
        <div class="form-group <?= $formErrors != null ? $formErrors['parentalPermit'] : '' ?>">
            <label>Le salarié(e) possède une autorisation écrite de travail de ses responsables légaux ?</label><br />
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="parentalPermitYes" name="salarie_form[parentalPermit]" value="1">
                <label class="custom-control-label" for="parentalPermitYes">Oui</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="parentalPermitNo" name="salarie_form[parentalPermit]" value="0">
                <label class="custom-control-label" for="parentalPermitNo">Non</label>
            </div>
        </div>
        <div class="form-group <?= $formErrors != null ? $formErrors['disabledWorker'] : '' ?>">
            <label>Le salarié(e) est-il(elle) reconnu comme un travailleur handicapé ?</label><br />
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="disabledWorkerYes" name="salarie_form[disabledWorker]" value="1">
                <label class="custom-control-label" for="disabledWorkerYes">Oui</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="disabledWorkerNo" name="salarie_form[disabledWorker]" value="0">
                <label class="custom-control-label" for="disabledWorkerNo">Non</label>
            </div>
        </div>
        <div class="form-group <?= $formErrors != null ? $formErrors['detailsDisabledWorker'] : '' ?>">
            <label for="detailsDisabledWorker">Détails taux invalidité *</label>
            <input type="text" class="form-control" id="detailsDisabledWorker" name="salarie_form[detailsDisabledWorker]"
                   value="<?= $form != null ? $form['detailsDisabledWorker'] : '' ?>">
        </div>
        <button type="submit" class="pull-right btn btn-success">Enregistrer</button>
</form>