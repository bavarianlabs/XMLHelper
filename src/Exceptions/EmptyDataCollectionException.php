<?php

namespace Bavarianlabs\XMLHelper\Exception;


use Exception;

class EmptyDataCollectionException extends XMLHelperException
{
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct("Data collection received is empty", $code, $previous);
    }


    public function __toString()
    {
        return "Data collection received is empty";
    }


}