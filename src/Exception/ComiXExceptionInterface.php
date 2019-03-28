<?php

namespace Exception;

interface ComiXExceptionInterface
{
    /**
     * This method is used to write logs with all the needed informations.
     *
     * @return string
     */
    public function getLoggerMessage(): string;
}