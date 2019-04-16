        <?php use Utils\FormHelper; ?>
        <h2>Contact d'urgence</h2>
        <div class="form-group" id="contactsUrgence">
            <span class="addLine glyphicon glyphicon-plus"></span>
            <div class="hide">
                <div class="form-group col-md-3">
                    <label>Nom *</label>
                    <input type="text" class="form-control" 
                        data-name="contact_urgence_form[%%d%%][nom]" value="">
                </div> 
                <div class="form-group col-md-3">
                    <label>Prénom *</label>
                    <input type="text" class="form-control" 
                        data-name="contact_urgence_form[%%d%%][prenom]" value="">
                </div>
                <div class="form-group col-md-3">
                    <label>Lien *</label>
                    <input type="text" class="form-control" 
                        data-name="contact_urgence_form[%%d%%][lien]" value="">
                </div>
                <div class="form-group col-md-3">
                    <label>Téléphone *</label>
                    <input type="text" class="form-control" 
                        data-name="contact_urgence_form[%%d%%][telephone]" value="">
                </div>
                <span class="removeLine glyphicon glyphicon-remove"></span>
            </div>
            <div class="form-row line">
                <div class="form-group col-md-3">
                    <label>Nom *</label>
                    <input type="text" 
                        class="form-control <?= FormHelper::editFieldErrors($formErrors, 'nom', 'contacts', '0') ?>" 
                        name="contact_urgence_form[0][nom]" value="">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'nom', 'contacts', '0') ?></span>
                </div> 
                <div class="form-group col-md-3">
                    <label>Prénom *</label>
                    <input type="text" 
                        class="form-control <?= FormHelper::editFieldErrors($formErrors, 'prenom', 'contacts', '0') ?>"
                        name="contact_urgence_form[0][prenom]" value="">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'prenom', 'contacts', '0') ?></span>
                </div>
                <div class="form-group col-md-3">
                    <label>Lien *</label>
                    <input type="text" 
                        class="form-control <?= FormHelper::editFieldErrors($formErrors, 'lien', 'contacts', '0') ?>"
                        name="contact_urgence_form[0][lien]" value="">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'lien', 'contacts', '0') ?></span>
                </div>
                <div class="form-group col-md-3">
                    <label>Téléphone *</label>
                    <input type="text"
                        class="form-control <?= FormHelper::editFieldErrors($formErrors, 'telephone', 'contacts', '0') ?>"
                        name="contact_urgence_form[0][telephone]" value="">
                    <span><?= FormHelper::setFeedbackInvalidity($formErrors, 'telephone', 'contacts', '0') ?></span>
                </div>
            </div>
        </div>