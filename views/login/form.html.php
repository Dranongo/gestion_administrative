<?php $form = $template->form ?>
<?php $formErrors = $template->formErrors ?>
<fieldset class="col-xs-12 col-sm-6 col-sm-offset-3">
    <?php if (trim($template->successMessage) !== ''): ?>
        <div class="alert alert-success"><?= $template->successMessage ?></div>
    <?php endif; ?>
    <?php if (trim($template->errorMessage) !== ''): ?>
        <div class="alert alert-danger"><?= $template->errorMessage ?></div>
    <?php endif; ?>
    <form action="" method="post">
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['firstname'] : '' ?>">
            <label for="firstname">First name *</label>
            <input type="text" class="form-control" id="firstname" name="user_form[firstname]"
                   value="<?= !is_null($form) ? $form['firstname'] : '' ?>">
        </div>
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['lastname'] : '' ?>">
            <label for="lastname">Last name *</label>
            <input type="text" class="form-control" id="lastname" name="user_form[lastname]"
                value="<?= !is_null($form) ? $form['lastname'] : '' ?>">
        </div>
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['mail'] : '' ?>">
            <label for="mail">Email *</label>
            <input type="text" class="form-control" id="mail" name="user_form[mail]"
                   value="<?= !is_null($form) ? $form['mail'] : '' ?>">
        </div>
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['password'] : '' ?>">
            <label for="password">Password *</label>
            <input type="password" class="form-control" id="password" name="user_form[password]">
        </div>
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['confirm_password'] : '' ?>">
            <label for="confirm_password">Confirm Password *</label>
            <input type="password" class="form-control" id="confirm_password" name="user_form[confirm_password]">
        </div>
        <div class="form-group <?= !is_null($formErrors) ? $formErrors['description'] : '' ?>">
            <label for="description">Description *</label>
            <textarea type="text" class="form-control" id="description" name="user_form[description]"><?=
                !is_null($form) ? $form['description'] : ''
            ?></textarea>
        </div>
        <button type="submit" class="pull-right btn btn-success">Send</button>
    </form>
</fieldset>