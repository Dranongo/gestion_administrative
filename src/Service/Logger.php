<?php

namespace Service;

class Logger
{
    /**
     * Message except in production environment
     */
    public const DEBUG = 100;

    /**
     * Variable dumped except in production environment
     */
    public const DUMP = 200;

    public const INFO = 300;

    public const NOTICE = 400;

    public const WARNING = 500;

    public const ERROR = 600;

    protected static $levels = [
        self::DEBUG     => 'DEBUG',
        self::DUMP      => 'DUMP',
        self::INFO      => 'INFO',
        self::NOTICE    => 'NOTICE',
        self::WARNING   => 'WARNING',
        self::ERROR     => 'ERROR',
    ];

    /**
     * @var Logger
     */
    protected static $_instance;

    /**
     * @var string
     */
    protected $environment;

    /**
     * @var string
     */
    protected $fileName;

    /**
     * Logger constructor.
     */
    private function __construct()
    {
        $config = require __CONFIG_DIR__ . 'config.php';
        if (array_key_exists('environment', $config)) {
            $this->environment = $config['environment'];
        }
    }

    /**
     * @return Logger
     */
    public static function getInstance(): Logger
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Logger();
        }

        return self::$_instance;
    }
}