<?php

namespace Bavarianlabs\XMLHelper\Exception;


use Exception;

/**
 * Class EmptyDataCollectionException
 * @package Bavarianlabs\XMLHelper\Exception
 */
class EmptyDataCollectionException extends XMLHelperException
{
    /**
     * @param string $message
     * @param int $code
     * @param Exception|null $previous
     */
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct("Data collection received is empty", $code, $previous);
    }


    /**
     * @return string
     */
    public function __toString()
    {
        return "Data collection received is empty";
    }
}