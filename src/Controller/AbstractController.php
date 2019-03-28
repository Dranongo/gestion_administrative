<?php

namespace Controller;


use Service\Request;
use Model\User;

abstract class AbstractController
{
    /**
     * @var string
     */
    const DEFAULT_CONTROLLER = 'login';

    /**
     * @var string
     */
    const DEFAULT_METHOD = 'home';

    /**
     * @return \Service\Request
     */
    public function getRequest(): Request
    {
        return Request::getInstance();
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function connect(): array
    {
        $request = $this->getRequest();

        $method = $request->getQuery('method');

        $action = $method . 'Action';

        if (method_exists($this, $action)) {
            return $this->$action($request);
        } elseif (method_exists($this, $method)) {
            $errorMessage = "Method '$method' found in class '" . get_class($this) . "' but not callable.";
        } else {
            $errorMessage = "Method '$method' not found in class '" . get_class($this) . "'.";
        }

        throw new \Exception($errorMessage);
    }

    /**
     * @param string $type
     * @return string
     * @throws \Exception
     */
    protected function getTemplateName(string $type = 'html'): string
    {
        $request = $this->getRequest();

        $file = __VIEWS_DIR__ . DIRECTORY_SEPARATOR . $request->getQuery('controller') . DIRECTORY_SEPARATOR
            . $request->getQuery('method') . '.' . $type . '.php';

        if (file_exists($file)) {
            return $file;
        }

        throw new \Exception("Template '$file' not found.");
    }

    /**
     * @return \Model\User|null
     */
    public function getUser(): ?User
    {
        $request = $this->getRequest();

        return $request->getSession('user');
    }
}