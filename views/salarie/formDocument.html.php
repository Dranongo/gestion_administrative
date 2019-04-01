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
                            <td><input type="file" class="fileAttachment form-control" data-name="FileAttachment[%%d%%]"></td>
                            <td><input type="text" class="nameAttachment form-control" data-name="NameAttachment[%%d%%]"></td>
                            <td>
                                <select class="typeAttachment custom-select" data-name="TypeAttachment[%%d%%]">
                                    <option value="">Type de Document</option>
                                        
                                </select>
                            </td>
                            <td><span class="table_remove_document glyphicon glyphicon-remove"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>