<?php

namespace Controller;

use Exception\BadFunctionCallException;
use Exception\FileNotFoundException;
use Service\Request;
use Model\User;

abstract class AbstractController
{
    /**
     * @var string
     */
    const DEFAULT_CONTROLLER = 'salarie';

    /**
     * @var string
     */
    const DEFAULT_METHOD = 'create';

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
            $templateVariables = $this->$action($request);
            if (! array_key_exists('template', $templateVariables)) {
                $templateVariables['template'] = $this->getTemplateName();
            }
            return $templateVariables;
        } elseif (method_exists($this, $method)) {
            $errorMessage = "Method '$method' found in class '" . get_class($this) . "' but not callable.";
        } else {
            $errorMessage = "Method '$method' not found in class '" . get_class($this) . "'.";
        }

        throw new BadFunctionCallException($errorMessage);
    }

    /**
     * @param string $type
     * @return string
     * @throws \Exception
     */
    protected function getTemplateName(string $type = 'html'): string
    {
        $request = $this->getRequest();

        $file = __VIEWS_DIR__ . $request->getQuery('controller') . DIRECTORY_SEPARATOR
            . $request->getQuery('method') . '.' . $type . '.php';

        if (file_exists($file)) {
            return $file;
        }

        throw new FileNotFoundException("Template '$file' not found.");
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