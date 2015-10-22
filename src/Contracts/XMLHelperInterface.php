<?php

namespace Bavarianlabs\XMLHelper\Contracts;


/**
 * Interface XMLHelperInterface
 * @package Bavarianlabs\XMLHelper\Contracts
 */
interface XMLHelperInterface
{

    /**
     * Parse data to some format
     *
     * @param   mixed   $data
     * @param   FormatInterface $format
     * @return  mixed
     */
    public function parse($data = null, FormatInterface $format);

    /**
     * Parse data to XML format
     *
     * @param $data
     * @return mixed XML Object
     */
    public function xml($data = null);

    /**
     * Parse data to JSON format
     *
     * @param $data
     * @return mixed
     */
    public function json($data = null);

    /**
     * Parse data to BSON format
     *
     * @param $data
     * @return mixed
     */
    public function bson($data = null);

    /**
     * Parse data to YAML format
     *
     * @param $data
     * @return mixed
     */
    public function yaml($data = null);

    /**
     * Parse data to array
     *
     * @param $data
     * @return array
     */
    public function toArray($data = null);

    /**
     * Insert any data collection to parse after
     *
     * @param $data
     */
    public function data($data);
}