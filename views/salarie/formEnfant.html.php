        <div class="form-group" id="enfants">
            <label class="form-label" for="enfants">Renseignement des enfants</label>

            <div id="table_enfant" class="table-editable">
                <span class="table-add-enfant glyphicon glyphicon-plus"></span>
                <table class="table text-center">
                    <thead>	
                        <tr>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Prénom</th>
                            <th class="text-center">Date de naissance</th>
                        </tr>
                    </thead>
                    <tbody>					
                        <tr class="hide">
                            <td><input class="form-control" type="text" name="enfant_form[nom]"></td>
                            <td><input class="form-control" type="text" name="enfant_form[prenom]"></td>
                            <td><input class="form-control" type="date" name="enfant_form[date_naissance]"></td>
                            <td><span class="removeLine glyphicon glyphicon-remove"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>