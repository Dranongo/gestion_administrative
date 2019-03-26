<?php

namespace Service;


use Controller\AbstractController;
use Model\User;

class Request
{
    /**
     * @var Request
     */
    private static $_instance = null;
    /**
     * @var array
     */
    protected $query = [];

    /**
     * @var array
     */
    protected $request = [];

    /**
     * @var array
     */
    protected $server = [];

    /**
     * @var array
     */
    protected $session = [];

    /**
     * Request constructor.
     */
    private function __construct()
    {
        $this->createRequestFromSuperGlobals();
    }

    /**
     * @return Request
     */
    public static function getInstance(): Request
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Request();
        }

        return self::$_instance;
    }

    /**
     * Create parameters
     */
    protected function createRequestFromSuperGlobals()
    {
        $superGlobals = [
            'query' => $_GET,
            'request' => $_POST,
            'server' => $_SERVER,
            'session' => $_SESSION
        ];
        foreach ($superGlobals as $type => $superGlobal) {
            foreach ($superGlobal as $key => $value) {
                $this->$type[$key] = $value;
            }
        }

        if (empty($this->getQuery('method'))) {
            $this->query['method'] = AbstractController::DEFAULT_METHOD;
        }
        if (is_null($this->getQuery('controller'))) {
            $this->query['controller'] = AbstractController::DEFAULT_CONTROLLER;
        }
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->getServer('REQUEST_METHOD');
    }

    /**
     * @return bool
     */
    public function isPost(): bool
    {
        return $this->getMethod() === 'POST';
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getQuery(string $key)
    {
        return $this->getParameter('query', $key);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getRequest(string $key)
    {
        return $this->getParameter('request', $key);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getServer(string $key)
    {
        return $this->getParameter('server', $key);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getSession(string $key)
    {
        return $this->getParameter('session', $key);
    }

    /**
     * @param string $type
     * @param string $key
     * @return null
     */
    protected function getParameter(string $type, string $key)
    {
        if (in_array($type, $this->getParameterTypes())) {
            $parameter = $this->$type;
            return array_key_exists($key, $parameter) ? $parameter[$key] : null;
        }
        return null;
    }

    /**
     * @return array
     */
    protected function getParameterTypes(): array
    {
        return [
            'query', 'request', 'server', 'session'
        ];
    }

    /**
     * @param string $key
     * @param $var
     */
    public function addToSession(string $key, $var): void
    {
        $_SESSION[$key] = $var;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->getSession('user');
    }

    /**
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        $user = $this->getUser();

        return $user instanceof User;
    }

    /**
     * @return bool
     */
    public function destroySession(): bool
    {
        return session_destroy();
    }
}