<?php

namespace Exception;

class FileNotFoundException extends \RuntimeException implements ComiXExceptionInterface
{
    public function getLoggerMessage(): string
    {
        $message = $this->getMessage() . ' in ' . $this->getFile() . ' on line ' . $this->getLine();

        return $message;
    }
}