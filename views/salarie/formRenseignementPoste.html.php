        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nom_renseignement_poste">Renseignement Poste</label>
				<select id="nom_renseignement_poste" class="custom-select" name="renseignement_poste_form[nom]">
					<option value="">Renseignement du poste</option>	
                    <?php foreach($renseignementsPoste as $renseignementPoste): ?> 
                        <option value="<?= $renseignementPoste->getId() ?>"><?= $renseignementPoste->getNom() ?></option>
                    <?php endforeach; ?>	
				</select>
            </div>
        </div>