<?php

namespace Bavarianlabs\XMLHelper\Exception;


use Exception;

/**
 * Class NotImplementedMethodException
 * @package Bavarianlabs\XMLHelper\Exception
 */
class NotImplementedMethodException extends Exception
{
    /**
     * @param string $message
     * @param int $code
     * @param Exception|null $previous
     */
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct("Method is not implemented yet", $code, $previous);
    }


}