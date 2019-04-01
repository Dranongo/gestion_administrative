        <div class="form-group" id="contactsUrgence">
            <label class="form-label" for="contactsUrgence">Renseignement des contacts d'urgence</label>

            <div id="table_contact" class="table-editable">
                <span class="table_add_contact glyphicon glyphicon-plus"></span>
                <table class="table text-center">
                    <thead>	
                        <tr>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Prénom</th>
                            <th class="text-center">Lien</th>
                            <th class="text-center">Numéro de téléphone</th>
                        </tr>
                    </thead>
                    <tbody>					
                        <tr class="contact">
                            <td><input class="lastName form-control" type="text" data-name="LastNameContact[%%d%%]"></td>
                            <td><input class="firstName form-control" type="text" data-name="FirstNameContact[%%d%%]"></td>
                            <td><input class="relationship form-control" type="text" data-name="RelationshipContact[%%d%%]"></td>
                            <td><input class="phoneNumber form-control" type="number" data-name="PhoneNumberContact[%%d%%]"></td>
                        </tr>
                        <tr class="hide">
                            <td><input class="lastName form-control" type="text" data-name="LastNameContact[%%d%%]"></td>
                            <td><input class="firstName form-control" type="text" data-name="FirstNameContact[%%d%%]"></td>
                            <td><input class="relationship form-control" type="text" data-name="RelationshipContact[%%d%%]"></td>
                            <td><input class="phoneNumber form-control" type="number" data-name="PhoneNumberContact[%%d%%]"></td>
                            <td><span class="table_remove_contact glyphicon glyphicon-remove"></span></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>