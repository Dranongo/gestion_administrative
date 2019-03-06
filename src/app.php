<?php

try {

    // Autoload
    spl_autoload_register(function ($className) {
        $fileName = __SRC_DIR__ . DIRECTORY_SEPARATOR . str_replace("\\", '/', $className) . ".php";
        if (file_exists($fileName)) {
            require_once $fileName;
            return class_exists($className);
        }
        return false;
    });

    // You have to init the session after the classes are loaded
    session_start();

    $template = \Utils\Route::dispatchRoute();
} catch (Exception $e) {
    $errorVariables = [
        'title' => 'Error ' . $e->getCode(),
        'template' => \Utils\Template::getErrorTemplateName(),
        'error' => $e->getMessage()
    ];
    $template = \Utils\Template::getTemplateVariables($errorVariables);
}

require_once __VIEWS_DIR__ . DIRECTORY_SEPARATOR . 'base.html.php';