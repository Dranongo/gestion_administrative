        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nom_type_contrat">Type du contrat</label>
				<select id="nom_type_contrat" class="custom-select" name="type_contrat_form[nom]">
					<option value="">Type du contrat</option>
                    <?php foreach($typesContrat as $typeContrat): ?> 
                        <option value="<?= $typeContrat->getId() ?>"><?= $typeContrat->getNom() ?></option>
                    <?php endforeach; ?>	
				</select>
            </div>
        </div>