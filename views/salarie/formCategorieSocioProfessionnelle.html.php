        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nom_categorie_socio_professionnelle">Categorie Socio-Professionnelle</label>
				<select id="nom_categorie_socio_professionnelle" class="custom-select" name="categorie_socio_professionnelle_form[nom]">
					<option value="">Catégorie Socio-professionnelle</option>
                    <?php foreach($categories as $categorie): ?> 
                        <option value="<?= $categorie->getId() ?>"><?= $categorie->getNom() ?></option>
                    <?php endforeach; ?>
				</select>
            </div>
        </div>
        <div class="form-row">
			<div class="form-group col-md-6">
				<label for="date_debut_categorie">Date de début du statut social</label>
				<input type="date" id="date_debut_categorie" class="form-control" name="categorie_socio_professionnelle_form[date_debut]">
			</div>
			<div class="form-group col-md-6">
				<label for="date_fin_categorie">Date de fin du statut social</label>
				<input type="date" id="date_fin_categorie" class="form-control" name="categorie_socio_professionnelle_form[date_fin]">
			</div>
        </div>