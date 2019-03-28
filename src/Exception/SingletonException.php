<?php

namespace Exception;

class SingletonException extends \LogicException implements ComiXExceptionInterface
{
    public function getLoggerMessage(): string
    {
        $message = $this->getMessage() . ' in ' . $this->getFile() . ' on line ' . $this->getLine();

        return $message;
    }
}