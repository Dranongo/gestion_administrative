        <h2>Statut travailleur étranger</h2>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>A-t-il/elle une permission de travail ?</label><br />
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="autorisation_travail_oui" name="travailleur_etranger_form[autorisation_travail]" value="1">
                    <label class="custom-control-label" for="autorisation_travail_oui">Oui</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="autorisation_travail_non" name="travailleur_etranger_form[autorisation_travail]" value="0">
                    <label class="custom-control-label" for="autorisation_travail_non">Non</label>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="num_carte_sejour">Numéro de carte de séjour</label>
                <input type="number" id="num_carte_sejour" class="form-control" name="travailleur_etranger_form[num_carte_sejour]" min="1000000000" max="9999999999">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="date_autorisarion_emabauche">Date d'autorisation d'embauche</label>
                <input type="date" id="date_autorisation_embauche" class="form-control" name="travailleur_etranger_form[date_autorisation_embauche]">
            </div>
            <div class="form-group col-md-6">
                <label for="date_limite_validite">Date limite de validité du séjour</label>
                <input type="date" id="date_limite_validite" class="form-control" name="travailleur_etranger_form[date_limite_validite]">
            </div>
        </div>