<?php

namespace Bavarianlabs\XMLHelper\Contracts;


interface FormatInterface
{
    /**
     * Parse data to concrete implementation
     *
     * @param   mixed   $data
     * @return  mixed
     */
    function parse($data);
}