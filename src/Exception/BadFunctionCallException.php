<?php

namespace Exception;

class BadFunctionCallException extends \BadFunctionCallException implements ComiXExceptionInterface
{
    public function getLoggerMessage(): string
    {
        $message = $this->getMessage() . ' in ' . $this->getFile() . ' on line ' . $this->getLine();

        return $message;
    }
}