        <div class="form-group" id="documents">
            <label class="form-label" for="documents">Document et pièces à fournir</label>

            <div id="table_document" class="table-editable">
                <span class="table_add_document glyphicon glyphicon-plus"></span>
                <table class="table text-center">
                    <thead>	
                        <tr>
                            <th class="text-center">Document</th>
                            <th class="text-center">Nom du document</th>
                            <th class="text-center">Type de Document</th>
                        </tr>
                    </thead>
                    <tbody>					
                        <tr class="hide">
                            <td><input class="form-control" type="file" name="document"></td>
                            <td><input class="form-control"  type="text" name="document_form[nom]"></td>
                            <td>
                                <select class="typeAttachment custom-select" name="document_form[typeDocument]">
                                    <option value="">Type de Document</option>
                                    
                                </select>
                            </td>
                            <td><span class="removeLine glyphicon glyphicon-remove"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>