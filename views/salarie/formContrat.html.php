		<h2>Contrat</h2>
		<div class="form-row">
            <div class="form-group col-md-6">
                <label for="renseignement_poste">Renseignement du poste</label>
				<select id="renseignement_poste" class="custom-select" name="contrat_form[id_renseignement_poste]">
					<option value="">Renseignement du poste</option>	
                    <?php foreach($renseignementsPoste as $renseignementPoste): ?> 
                        <option value="<?= $renseignementPoste->getId() ?>"><?= $renseignementPoste->getNom() ?></option>
                    <?php endforeach; ?>	
				</select>
            </div>
			<div class="form-group col-md-6">
                <label for="type_contrat">Type du contrat</label>
				<select id="type_contrat" class="custom-select" name="contrat[id_type_contrat]">
					<option value="">Type du contrat</option>
                    <?php foreach($typesContrat as $typeContrat): ?> 
                        <option value="<?= $typeContrat->getId() ?>"><?= $typeContrat->getNom() ?></option>
                    <?php endforeach; ?>	
				</select>
            </div>
        </div>
        <div class="form-row">
			<div class="form-group col-md-6">
				<label for="date_debut_contrat">Date de début du contrat</label>
				<input type="date" id="date_debut_contrat" class="form-control" name="contrat_form[date_debut]">
			</div>
			<div class="form-group col-md-6">
				<label for="date_debut_contrat">Date de fin du contrat</label>
				<input type="date" id="date_fin_contrat" class="form-control" name="contrat_form[date_fin]">
			</div>
        </div>