		<?php use Utils\FormHelper; ?>
		<h2>Catégorie Socio-professionnelle</h2>
		<div class="form-row">
            <div class="form-group col-md-6">
				<select id="nom_categorie_socio_professionnelle" 
					class="custom-select <?= FormHelper::editFieldErrors($formErrors, 'nom', 'categorieSocioProfessionnelle') ?>" 
					name="categorie_socio_professionnelle_form[nom]">
					<option value="">Catégorie Socio-professionnelle</option>
                    <?php foreach($categories as $categorie): ?> 
                        <option value="<?= $categorie->getId() ?>"><?= $categorie->getNom() ?></option>
                    <?php endforeach; ?>
				</select>
				<span><?= FormHelper::setFeedbackInvalidity($formErrors, 'nom', 'categorieSocioProfessionnelle') ?></span>
            </div>
        </div>
        <div class="form-row">
			<div class="form-group col-md-6">
				<label for="date_debut_categorie">Date de début du statut social</label>
				<input type="date" id="date_debut_categorie" 
					class="form-control <?= FormHelper::editFieldErrors($formErrors, 'date_debut', 'categorieSocioProfessionnelle') ?>" 
					name="categorie_socio_professionnelle_form[date_debut]">
				<span><?= FormHelper::setFeedbackInvalidity($formErrors, 'date_debut', 'categorieSocioProfessionnelle') ?></span>
			</div>
			<div class="form-group col-md-6">
				<label for="date_fin_categorie">Date de fin du statut social</label>
				<input type="date" id="date_fin_categorie" 
					class="form-control <?= FormHelper::editFieldErrors($formErrors, 'date_fin', 'categorieSocioProfessionnelle') ?>" 
					name="categorie_socio_professionnelle_form[date_fin]">
				<span><?= FormHelper::setFeedbackInvalidity($formErrors, 'date_fin', 'categorieSocioProfessionnelle') ?></span>
			</div>
        </div>