<?php

namespace Oakdigital\DawaPhp\API;

class APIError
{
    private $errorCode;
    private $message;

    public function __construct($errorCode, $message = "")
    {
        $this->errorCode = $errorCode;
        $this->message = $message;
    }

    public function setErrorCode($code)
    {
        $this->errorCode = $code;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function setErrorMessage($message)
    {
        $this->message = $message;
    }

    public function getErrorMessage()
    {
        return $this->message;
    }

    public static function isError($object)
    {
        return $object instanceof APIError;
    }
}
