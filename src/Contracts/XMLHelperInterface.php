<?php

namespace Bavarianlabs\XMLHelper\Contracts;


interface XMLHelperInterface
{

    /**
     * Parse data to some format
     *
     * @param   mixed   $data
     * @param   FormatInterface $format
     * @return  mixed
     */
    function parse($data, FormatInterface $format);

    /**
     * Parse data to XML format
     *
     * @param $data
     * @return mixed XML Object
     */
    function xml($data);

    /**
     * Parse data to JSON format
     *
     * @param $data
     * @return mixed
     */
    function json($data);

    /**
     * Parse data to BSON format
     *
     * @param $data
     * @return mixed
     */
    function bson($data);

    /**
     * Parse data to YAML format
     *
     * @param $data
     * @return mixed
     */
    function yaml($data);

    /**
     * Parse data to array
     *
     * @param $data
     * @return array
     */
    function toArray($data);

    /**
     * Receive data collection
     *
     * @param $data
     */
    function data($data);
}