        <div class="form-group" id="formations">
            <label class="form-label" for="formations">Formations et Expériences professionnelles</label>

            <div id="table_formation" class="table-editable">
                <span class="table_add_formation glyphicon glyphicon-plus"></span>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Niveau</th>
                            <th class="text-center">Organisme</th>
                            <th class="text-center">Lieu</th>
                            <th class="text-center">Début de la formation</th>
                            <th class="text-center">Fin de la formation</th>
                            <th class="text-center">Diplôme obtenu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hide">
                            <td><input class="form-control" type="text" name="formation_form[nom]"></td>
                            <td>
                                <select class="form-control" name="formation_form[niveau]">
                                    <option value="">Niveau</option>
                                    <?php foreach($formation->getNiveauxPossibles() as $value): ?> 
                                        <option value="<?= $value ?>"><?= $value ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td><input class="form-control" type="text" name="formation_form[organisme]"></td>
                            <td><input class="form-control" type="text" name="formation_form[lieu]"></td>
                            <td><input class="form-control" type="date" name="formation_form[date_debut]"></td>
                            <td><input class="form-control" type="date" name="formation_form[date_fin]"></td>
                            <td><input class="form-check-input" type="checkbox" value="1" name="formation_form[obtenu]"></td>
                            <td><span class="removeLine glyphicon glyphicon-remove"></span></td>
                        </tr>
                    </tbody>
                </table>                      							
            </div>
        </div>