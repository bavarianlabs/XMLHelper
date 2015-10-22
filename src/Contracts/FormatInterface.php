<?php

namespace Bavarianlabs\XMLHelper\Contracts;


/**
 * Interface FormatInterface
 * @package Bavarianlabs\XMLHelper\Contracts
 */
interface FormatInterface
{
    /**
     * Parse data to concrete implementation
     *
     * @param   mixed   $data
     * @return  mixed
     */
    public function parse($data);
}