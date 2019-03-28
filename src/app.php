<?php

define('__SRC_DIR__', __DIR__ . DIRECTORY_SEPARATOR);

define('__VAR_DIR__', __SRC_DIR__ . '..' . DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR);

define('__VIEWS_DIR__', __SRC_DIR__ . '..' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

define('__CONFIG_DIR__', __SRC_DIR__ . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR);

define('__PUBLIC_DIR__', __SRC_DIR__ . '..' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);

define('__ATTACHMENT_DIR__', __PUBLIC_DIR__ . 'pieces_jointes' . DIRECTORY_SEPARATOR);

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

    $robert = \Service\Logger::getInstance();
    //$simone = clone $robert;

    //$template = \Service\Router::dispatchRoute();
} catch (\Exception\ComiXExceptionInterface $e) {
    \Service\Logger::getInstance()->error($e->getLoggerMessage());
    /*$errorVariables = [
        'title' => 'Error ' . $e->getCode(),
        'template' => \Service\Template::getErrorTemplateName(),
        'error' => $e->getMessage()
    ];
    $template = \Service\Template::getTemplateVariables($errorVariables);*/
}

$formationDAO = \DAO\FormationDAO::getInstance();

\Service\Logger::getInstance()->dump('robert');

//require_once __VIEWS_DIR__ . 'base.html.php';

//echo'<pre>';
/*var_dump(\Model\Formation::getDAOInstance());
$formationDAO = \DAO\FormationDAO::getInstance();
var_dump($formationDAO->find(3, true));*/

//var_dump(\Model\TravailleurEtranger::getDAOInstance());
//$salarieDAO = \DAO\SalarieDAO::getInstance();
//var_dump($salarieDAO->findBy(['id' => [95, 96]], [], true));

//$categorieSocioProDAO = \DAO\TravailleurEtrangerDAO::getInstance();
//var_dump($categorieSocioProDAO->find(2));

/*var_dump($enfantDAO->findAll());

$criteria = array(
    "dateNaissance" => "1999-09-12 00:00:00");

$orderBy = array(
    "id" => "DESC");

var_dump($enfantDAO->findBy($criteria, $orderBy));*/


/*	class Mere {
        protected static $endroit = 'DTC';

        public static function JeSuisIci() {
            echo self::$endroit;
        }

        public static function JeSuisLa() {
            echo static::$endroit;
        }
    }

	class Fille extends Mere {
        protected static $endroit = 'CMB';
    }

Mere::JeSuisIci();
Mere::JeSuisLa();
Fille::JeSuisIci();
Fille::JeSuisLa();*/