<?php

namespace Bavarianlabs\XMLHelper\Exception;


use Exception;

class NotImplementedMethodException extends Exception
{
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct("Method is not implemented yet", $code, $previous);
    }


}