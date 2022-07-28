<?php

namespace Oakdigital\DawaPhp\Entities\Exceptions;

use Exception;
use Throwable;

class ParseException extends Exception
{

    public function __construct($message, $code = 0, Throwable $previous = null)
    {



        parent::__construct($message, $code, $previous);
    }
}
