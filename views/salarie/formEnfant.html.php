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
                            <td><input class="lastName form-control" type="text" data-name="LastNameChild[%%d%%]"></td>
                            <td><input class="firstName form-control" type="text" data-name="FirstNameChild[%%d%%]"></td>
                            <td><input class="birthdate form-control" type="date" data-name="BirthdateChild[%%d%%]"></td>
                            <td><span class="table_remove_enfant glyphicon glyphicon-remove"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>