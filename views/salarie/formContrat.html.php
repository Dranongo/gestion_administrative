	<?php use Utils\FormHelper; ?>
		<h2>Contrat</h2>
		<div class="form-row">
            <div class="form-group col-md-6">
                <label for="renseignement_poste">Renseignement du poste *</label>
				<select id="renseignement_poste" 
					class="custom-select <?= FormHelper::editFieldErrors($formErrors, 'id_renseignement_poste', 'contrat') ?>" 
					name="contrat_form[id_renseignement_poste]">
					<option value="">Renseignement du poste</option>	
                    <?php foreach ($renseignementsPoste as $renseignementPoste): ?> 
                        <option value="<?= $renseignementPoste->getId() ?>"><?= $renseignementPoste->getNom() ?></option>
                    <?php endforeach; ?>	
				</select>
				<span><?= FormHelper::setFeedbackInvalidity($formErrors, 'id_renseignement_poste', 'contrat') ?></span>
            </div>
			<div class="form-group col-md-6">
                <label for="type_contrat">Type du contrat *</label>
				<select id="type_contrat" 
					class="custom-select <?= FormHelper::editFieldErrors($formErrors, 'id_type_contrat', 'contrat') ?>" 
					name="contrat_form[id_type_contrat]">
					<option value="">Type du contrat</option>
                    <?php foreach ($typesContrat as $typeContrat): ?> 
                        <option value="<?= $typeContrat->getId() ?>"><?= $typeContrat->getNom() ?></option>
                    <?php endforeach; ?>	
				</select>
				<span><?= FormHelper::setFeedbackInvalidity($formErrors, 'id_type_contrat', 'contrat') ?></span>
            </div>
        </div>
        <div class="form-row">
			<div class="form-group col-md-6">
				<label for="date_debut_contrat">Date de début du contrat *</label>
				<input type="date" id="date_debut_contrat"
					class="form-control <?= FormHelper::editFieldErrors($formErrors, 'date_debut', 'contrat') ?>" 
					name="contrat_form[date_debut]">
				<?= FormHelper::setFeedbackInvalidity($formErrors, 'date_debut', 'contrat') ?></span>
			</div>
			<div class="form-group col-md-6">
				<label for="date_debut_contrat">Date de fin du contrat</label>
				<input type="date" id="date_fin_contrat"
					class="form-control <?= FormHelper::editFieldErrors($formErrors, 'date_fin', 'contrat') ?>"
					name="contrat_form[date_fin]">
				<span><?= FormHelper::setFeedbackInvalidity($formErrors, 'date_fin', 'contrat') ?></span>
			</div>
        </div>
		<div class="form-row">
			<div class="form-group col-md-6 offset-md-6">
                <label for="motif_fin_contrat">Motif fin de contrat</label>
				<select id="motif_fin_contrat" 
					class="custom-select <?= FormHelper::editFieldErrors($formErrors, 'id_motif_fin_contrat', 'contrat') ?>" 
					name="contrat_form[id_motif_fin_contrat]">
					<option value="">Motif fin de contrat</option>
                    <?php foreach ($motifsFinContrat as $motifFinContrat): ?> 
                        <option value="<?= $motifFinContrat->getId() ?>"><?= $motifFinContrat->getNom() ?></option>
                    <?php endforeach; ?>	
				</select>
				<span><?= FormHelper::setFeedbackInvalidity($formErrors, 'id_motif_fin_contrat', 'contrat') ?></span>
            </div>
		</div>