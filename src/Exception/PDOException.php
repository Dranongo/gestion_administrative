<?php

namespace Exception;

class PDOException extends \PDOException implements ComiXExceptionInterface
{
    public function getLoggerMessage(): string
    {
        $message = $this->getMessage() . ' in ' . $this->getFile() . ' on line ' . $this->getLine();

        return $message;
    }
}