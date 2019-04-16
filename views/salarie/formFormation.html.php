        <h2>Formations et expériences professionnelles</h2>
        <div class="form-group" id="formations">
            <span class="addLine glyphicon glyphicon-plus"></span>
            <div class="hide">
                <div class="form-group col-md-4">
                    <label>Nom</label>
                    <input type="text" class="form-control" 
                        data-name="formation_form[%%d%%][nom]" value="">
                </div>
                <div class="form-group col-md-4">
                    <label>Niveau de formation</label>
                    <select class="form-control" data-name="formation_form[%%d%%][niveau]">
                        <option value="">Veuillez sélectionner un niveau</option>
                        <?php foreach($formation->getNiveauxPossibles() as $value): ?> 
                            <option value="<?= $value ?>"><?= $value ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Organisme</label>
                    <input type="text" class="form-control" 
                        data-name="formation_form[%%d%%][organisme]" value="">
                </div>
                <div class="form-group col-md-4">
                    <label>Lieu</label>
                    <input type="text" class="form-control" 
                        data-name="formation_form[%%d%%][lieu]" value="">
                </div>
                <div class="form-group col-md-4">
                    <label>Début de la formation</label>
                    <input type="date" class="form-control" 
                        data-name="formation_form[%%d%%][date_debut]" value="">
                </div>
                <div class="form-group col-md-4">
                    <label>Fin de la formation</label>
                    <input type="date" class="form-control" 
                        data-name="formation_form[%%d%%][date_fin]" value="">
                </div>
                <div class="form-group col-md-4">
                    <label>Diplôme obtenu</label>
                    <input type="checkbox" class="form-check-input" 
                        data-name="formation_form[%%d%%][obtenu]" value="1">
                </div>
                <span class="removeLine glyphicon glyphicon-remove"></span>
            </div>
        </div>