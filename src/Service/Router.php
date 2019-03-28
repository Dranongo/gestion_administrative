<?php

namespace Service;

use Controller\AbstractController;

class Router
{
    /**
     * @return mixed
     */
    public static function dispatchRoute()
    {
        //self::checkIfLoggedIn();
        $request = Request::getInstance();
        $controllerParam = empty($request->getQuery('Controller'))
            ? AbstractController::DEFAULT_CONTROLLER
            : $request->getQuery('Controller');

        if (!is_null($controllerParam)) {
            $controllerClass = '\Controller\\' . ucfirst($controllerParam) . 'Controller';
            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();
                $variables = $controller->connect();
                return Template::getTemplateVariables($variables);
            }
        }
    }

    /**
     * Check if user is logged in and used Controller is the default Controller
     */
    protected static function checkIfLoggedIn(): void
    {
        $request = Request::getInstance();

        if (!$request->isLoggedIn() && $request->getQuery('Controller') !== AbstractController::DEFAULT_CONTROLLER) {
            self::redirect('/');
        }
    }

    /**
     * @param string $route
     */
    public static function redirect(string $route): void
    {
        header('Location: ' . $route);
    }
}