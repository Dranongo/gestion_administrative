<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title><?= isset($template->title) ? $template->title : 'Outil de gestion administrative' ?></title>
        <link rel="icon" href="<?= $template->getPicture('favicon.ico') ?>">
        <link rel="stylesheet" href="<?= $template->getCssFile('bootstrap.css') ?>">
        <link rel="stylesheet" href="<?= $template->getCssFile('font-awesome.min.css') ?>">
        <link rel="stylesheet" href="<?= $template->getCssFile('omicx.css') ?>">
        
        <?php if (isset($template->cssFiles)): ?>
            <?php foreach ($template->cssFiles as $cssFile): ?>
                <link rel="stylesheet" href="<?= $cssFile ?>">
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (isset($template->cssInline)): ?>
            <style>
                <?= $template->cssInline ?>
            </style>
        <?php endif; ?>
    </head>
    <body>
    <?php require_once 'menu.html.php' ?>
    <div class="container-fluid">
        <?= \Service\Template::getTemplate($template->template, $template) ?>
    </div>
    <?php require_once 'footer.html.php' ?>
    <script type="text/javascript" src="<?= $template->getJsFile('jquery-3.3.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?= $template->getJsFile('bootstrap.min.js') ?>"></script>
    <?php if (isset($template->jsFiles)): ?>
        <?php foreach ($template->jsFiles as $jsFile): ?>
            <script type="text/javascript" src="<?= $jsFile ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (isset($template->jsInline)): ?>
        <script type="text/javascript">
            <?= $template->jsInline ?>
        </script>
    <?php endif; ?>
    </body>
</html>