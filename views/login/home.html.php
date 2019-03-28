<?php $form = $template->form ?>
<?php $formErrors = $template->formErrors ?>
<div class="col-sm-8 col-sm-offset-2">
    <h1><?= $template->title ?></h1>
    <fieldset>
        <legend>Connection</legend>
        <?php if (trim($template->errorMessage) !== ''): ?>
            <div class="alert alert-danger"><?= $template->errorMessage ?></div>
        <?php endif; ?>
        <form action="" method="post" class="form-horizontal">
            <div class="form-group <?= !is_null($formErrors) ? 'has-error' : '' ?>">
                <label for="email" class="col-sm-3 text-right">Email *</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="email" name="login_form[mail]"
                        value="<?= !is_null($form) ? $form['mail'] : '' ?>">
                </div>
            </div>
            <div class="form-group <?= !is_null($formErrors) ? 'has-error' : '' ?>">
                <label for="password" class="col-sm-3 text-right">Password *</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" id="password" name="login_form[password]">
                </div>
            </div>
            <button type="submit" class="pull-right btn btn-success">Connect</button>
        </form>
    </fieldset>
    <a href="/login/logon" class="btn btn-info">Sign up</a>
</div>