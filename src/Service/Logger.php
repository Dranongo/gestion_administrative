<?php

namespace Service;

use Utils\DateHelper;

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

    /**
     * Events, logs
     */
    public const INFO = 300;

    /**
     * Uncommon events
     */
    public const NOTICE = 400;

    /**
     * Runtime warnings
     */
    public const WARNING = 500;

    /**
     * Runtime errors
     */
    public const ERROR = 600;

    /**
     * Define all the logging levels.
     *
     * @var array int level as key, string as value
     */
    protected static $levels = [
        self::DEBUG     => 'DEBUG',
        self::DUMP      => 'DUMP',
        self::INFO      => 'INFO',
        self::NOTICE    => 'NOTICE',
        self::WARNING   => 'WARNING',
        self::ERROR     => 'ERROR',
    ];

    /**
     * Instance of the Logger.
     *
     * @var Logger
     */
    protected static $_instance;

    /**
     * Environment defined in the configuration file.
     *
     * @var string
     */
    protected $environment;

    /**
     * Name of the file in which the Logger will write the logging messages.
     *
     * @var string
     */
    protected $fileName = null;

    /**
     * Logger constructor.
     */
    private function __construct()
    {
        $config = require __CONFIG_DIR__ . 'config.php';
        if (array_key_exists('environment', $config)) {
            $this->environment = $config['environment'];
        }

        if (array_key_exists('logger', $config) && is_array($config['logger'])) {
            $configLogger = $config['logger'];
            if (array_key_exists('filePath', $configLogger) && array_key_exists('fileName', $configLogger)) {
                if (! is_dir($configLogger['filePath']) && ! mkdir($configLogger['filePath'], 0755)) {
                    return;
                }
                $fileName = $configLogger['filePath'] . $configLogger['fileName'];
                $this->fileName = $fileName;
            }
        }
    }

    /**
     * Clone method is not allowed
     * @throws \Exception\SingletonException
     */
    final private function __clone()
    {
        throw new \Exception\SingletonException('Clone method is not allowed');
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

    /**
     * @param string $message
     * @param bool $force
     * @return bool
     */
    public function debug(string $message, bool $force = false): bool
    {
        if ($this->environment !== 'production' || $force === true) {
            return $this->addLine(static::DEBUG, $message);
        }
        return false;
    }

    /**
     * @param $value
     * @param string $message
     * @param bool $force
     * @return bool
     */
    public function dump($value, string $message = '', bool $force = false): bool
    {
        if ($this->environment !== 'production' || $force === true) {
            $line = $message . print_r($value, true);
            return $this->addLine(static::DUMP, $line);
        }
        return false;
    }

    /**
     * @param string $message
     * @return bool
     */
    public function info(string $message): bool
    {
        return $this->addLine(static::INFO, $message);
    }

    /**
     * @param string $message
     * @return bool
     */
    public function notice(string $message): bool
    {
        return $this->addLine(static::NOTICE, $message);
    }

    /**
     * @param string $message
     * @return bool
     */
    public function warning(string $message): bool
    {
        return $this->addLine(static::WARNING, $message);
    }

    /**
     * @param string $message
     * @return bool
     */
    public function error(string $message): bool
    {
        return $this->addLine(static::ERROR, $message);
    }

    /**
     * @param int $level
     * @param string $message
     * @return bool
     * @throws \Exception
     */
    protected function addLine(int $level, string $message): bool
    {
        if ($this->fileName !== null && array_key_exists($level, self::$levels)) {
            $line = DateHelper::getInstance()->getCurrentDateAsString();
            $line .= ' : [' . self::$levels[$level] . '] ' . $message . "\r\n";
            return $this->writeLine($line);
        }
        return false;
    }

    /**
     * @param string $line
     * @return bool
     */
    protected function writeLine(string $line): bool
    {
        $file = fopen($this->fileName, 'a+');
        fwrite($file, $line);
        return fclose($file);
    }
}