<?php $form = $template->form ?>
<?php $formErrors = $template->formErrors ?>

<form action="" method="post">
        <div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input" id="genderMale" name="salarie_form[gender]" value="Monsieur">
			<label class="custom-control-label" for="GenderMale">Monsieur</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" class="custom-control-input" id="genderFemale" name="salarie_form[gender]" value="Madame">
			<label class="custom-control-label" for="GenderFemale">Madame</label>
		</div>

        <div class="form-group <?= !is_null($formErrors) ? $formErrors['firstName'] : '' ?>">
            <label for="firstName">Prénom *</label>
            <input type="text" class="form-control" id="firstName" name="salarie_form[firstName]"
                   value="<?= !is_null($form) ? $form['firstName'] : '' ?>">
        </div> 
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['lastName'] : '' ?>">
            <label for="lastName">Nom *</label>
            <input type="text" class="form-control" id="lastName" name="salarie_form[lastName]"
                   value="<?= !is_null($form) ? $form['lastName'] : '' ?>">
        </div> 
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['maidenName'] : '' ?>">
            <label for="maidenName">Nom de jeune fille *</label>
            <input type="text" class="form-control" id="maidenName" name="salarie_form[maidenName]"
                   value="<?= !is_null($form) ? $form['maidenName'] : '' ?>">
        </div> 
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['nationality'] : '' ?>">
            <label for="nationality">Nationality *</label>
            <input type="text" class="form-control" id="nationality" name="salarie_form[nationality]"
                   value="<?= !is_null($form) ? $form['nationality'] : '' ?>">
        </div> 
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['birthdate'] : '' ?>">
            <label for="birthdate">Date de naissance *</label>
            <input type="text" class="form-control" id="birthdate" name="salarie_form[birthdate]"
                   value="<?= !is_null($form) ? $form['birthdate'] : '' ?>">
        </div> 
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['birthplace'] : '' ?>">
            <label for="birthplace">Lieu de naissance *</label>
            <input type="text" class="form-control" id="birthplace" name="salarie_form[birthplace]"
                   value="<?= !is_null($form) ? $form['birthplace'] : '' ?>">
        </div>
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['address'] : '' ?>">
            <label for="address">Adresse *</label>
            <input type="text" class="form-control" id="address" name="salarie_form[address]"
                   value="<?= !is_null($form) ? $form['address'] : '' ?>">
        </div> <div class="form-group <?= !is_null($formErrors) ? $formErrors['postalCode'] : '' ?>">
            <label for="postalCode">Code Postal *</label>
            <input type="text" class="form-control" id="postalCode" name="salarie_form[postalCode]"
                   value="<?= !is_null($form) ? $form['postalCode'] : '' ?>">
        </div> 
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['city'] : '' ?>">
            <label for="city">Ville *</label>
            <input type="text" class="form-control" id="city" name="salarie_form[city]"
                   value="<?= !is_null($form) ? $form['city'] : '' ?>">
        </div> 
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['phoneNumber'] : '' ?>">
            <label for="phoneNumber">Numéro de téléphone *</label>
            <input type="text" class="form-control" id="phoneNumber" name="salarie_form[phoneNumber]"
                   value="<?= !is_null($form) ? $form['phoneNumber'] : '' ?>">
        </div> 
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['professionalEmail'] : '' ?>">
            <label for="professionalEmail">Email professionnel *</label>
            <input type="text" class="form-control" id="professionalEmail" name="salarie_form[professionalEmail]"
                   value="<?= !is_null($form) ? $form['professionalEmail'] : '' ?>">
        </div> 
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['personalEmail'] : '' ?>">
            <label for="personalEmail">Email personnel *</label>
            <input type="text" class="form-control" id="personalEmail" name="salarie_form[personalEmail]"
                   value="<?= !is_null($form) ? $form['personalEmail'] : '' ?>">
        </div> 
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['socialSecurityNumber'] : '' ?>">
            <label for="socialSecurityNumber">Numéro de sécurité social *</label>
            <input type="text" class="form-control" id="socialSecurityNumber" name="salarie_form[socialSecurityNumber]"
                   value="<?= !is_null($form) ? $form['socialSecurityNumber'] : '' ?>">
        </div> 
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['salary'] : '' ?>">
            <label for="salary">Rémunération *</label>
            <input type="text" class="form-control" id="salary" name="salarie_form[salary]"
                   value="<?= !is_null($form) ? $form['salary'] : '' ?>">
        </div>         
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['languages'] : '' ?>">
            <label for="languages">Langues *</label>
            <input type="text" class="form-control" id="languages" name="salarie_form[languages]"
                   value="<?= !is_null($form) ? $form['languages'] : '' ?>">
        </div> 
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['detailAdditionalActivity'] : '' ?>">
            <label for="detailAdditionalActivity">Détails activité secondaire *</label>
            <input type="text" class="form-control" id="detailAdditionalActivity" name="salarie_form[detailAdditionalActivity]"
                   value="<?= !is_null($form) ? $form['detailAdditionalActivity'] : '' ?>">
        </div> 
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['detailsDisabledWorker'] : '' ?>">
            <label for="detailsDisabledWorker">Détails taux invalidité *</label>
            <input type="text" class="form-control" id="detailsDisabledWorker" name="salarie_form[detailsDisabledWorker]"
                   value="<?= !is_null($form) ? $form['detailsDisabledWorker'] : '' ?>">
        </div> 

















</form>