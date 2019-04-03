        <?php require_once 'formRenseignementPoste.html.php' ?>
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
        <?php require_once 'formTypeContrat.html.php' ?>