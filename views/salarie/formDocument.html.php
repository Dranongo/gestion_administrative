        <h2>Document et pièces à fournir</h2>
        <div class="form-group" id="documents">
            <span class="addLine glyphicon glyphicon-plus"></span>
            <div class="hide">
                <div class="form-group col-md-4">
                    <label>Document</label>
                    <input type="file" class="form-control" 
                        name="document_form[%%d%%][document]" value="">
                </div> 
                <div class="form-group col-md-4">
                    <label>Nom du document</label>
                    <input type="text" class="form-control" 
                        name="document_form[%%d%%][nom]" value="">
                </div>
                <div class="form-group col-md-4">
                    <label>Type du document</label>
                    <select class="typeAttachment custom-select" name="document_form[typeDocument]">
                        <option value="">Type de Document</option>
                        <?php foreach($typesDocument as $typeDocument): ?> 
                            <option value="<?= $typeDocument->getId() ?>"><?= $typeDocument->getNom() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <span class="removeLine glyphicon glyphicon-remove"></span>
            </div>
        </div>