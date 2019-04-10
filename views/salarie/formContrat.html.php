	<?php use Utils\FormHelper; ?>
		<h2>Contrat</h2>
		<div class="form-row">
            <div class="form-group col-md-6">
                <label for="renseignement_poste">Renseignement du poste *</label>
				<select id="renseignement_poste" 
					class="custom-select <?= FormHelper::editFieldErrors($formErrors, 'contrat_form[id_renseignement_poste]') ?>" 
					name="salarie_form[contrat_form[id_renseignement_poste]]">
					<option value="">Renseignement du poste</option>	
                    <?php foreach ($renseignementsPoste as $renseignementPoste): ?> 
                        <option value="<?= $renseignementPoste->getId() ?>"><?= $renseignementPoste->getNom() ?></option>
                    <?php endforeach; ?>	
				</select>
				<?= FormHelper::setFeedbackInvalidity($formErrors, 'contrat_form[id_renseignement_poste]') ?>
            </div>
			<div class="form-group col-md-6">
                <label for="type_contrat">Type du contrat *</label>
				<select id="type_contrat" 
					class="custom-select <?= FormHelper::editFieldErrors($formErrors, 'contrat_form[id_type_contrat]') ?>" 
					name="salarie_form[contrat[id_type_contrat]]">
					<option value="">Type du contrat</option>
                    <?php foreach ($typesContrat as $typeContrat): ?> 
                        <option value="<?= $typeContrat->getId() ?>"><?= $typeContrat->getNom() ?></option>
                    <?php endforeach; ?>	
				</select>
				<?= FormHelper::setFeedbackInvalidity($formErrors, 'contrat_form[id_type_contrat]') ?>
            </div>
        </div>
        <div class="form-row">
			<div class="form-group col-md-6">
				<label for="date_debut_contrat">Date de début du contrat *</label>
				<input type="date" id="date_debut_contrat"
					class="form-control <?= FormHelper::editFieldErrors($formErrors, 'date_debut') ?>" 
					name="salarie_form[contrat_form[date_debut]]">
				<?= FormHelper::setFeedbackInvalidity($formErrors, 'contrat_form[date_debut]') ?>
			</div>
			<div class="form-group col-md-6">
				<label for="date_debut_contrat">Date de fin du contrat</label>
				<input type="date" id="date_fin_contrat"
					class="form-control <?= FormHelper::editFieldErrors($formErrors, 'date_fin') ?>"
					name="salarie_form[contrat_form[date_fin]]">
			</div>
			<?= FormHelper::setFeedbackInvalidity($formErrors, 'contrat_form[date_fin]') ?>
        </div>
		<div class="form-row">
			<div class="form-group col-md-6 offset-md-6">
                <label for="motif_fin_contrat">Motif fin de contrat</label>
				<select id="motif_fin_contrat" 
					class="custom-select <?= FormHelper::editFieldErrors($formErrors, 'contrat_form[id_motif_fin_contrat]') ?>" 
					name="salarie_form[contrat[id_motif_fin_contrat]]">
					<option value="">Motif fin de contrat</option>
                    <?php foreach ($motifsFinContrat as $motifFinContrat): ?> 
                        <option value="<?= $motifFinContrat->getId() ?>"><?= $motifFinContrat->getNom() ?></option>
                    <?php endforeach; ?>	
				</select>
				<?= FormHelper::setFeedbackInvalidity($formErrors, 'contrat_form[id_motif_fin_contrat]') ?>
            </div>
		</div>